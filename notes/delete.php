
<?php
header('Content-Type: application/json');
include '../connect.php';
include "../functionupload.php";


$noteid=htmlspecialchars(strip_tags($_POST['id']));
$imagename=htmlspecialchars(strip_tags($_POST['imagename']));


$stm=$conn->prepare("DELETE FROM notes WHERE notes_id=?");
$stm->execute(array($noteid));


$count=$stm->rowCount();

if($count>0){
    deleteImageFile("../upload",$imagename);
    echo json_encode(array("status"=>"success"));
}
else{
    echo json_encode(array("status"=>"fail"));
}

?>