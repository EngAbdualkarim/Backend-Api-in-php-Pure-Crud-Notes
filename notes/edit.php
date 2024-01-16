

<?php
header('Content-Type: application/json');
include '../connect.php';


$notes_id=htmlspecialchars(strip_tags($_POST['id']));
$title=htmlspecialchars(strip_tags($_POST['title']));
$content=htmlspecialchars(strip_tags($_POST['content']));
$imagename=htmlspecialchars(strip_tags($_POST['imagename']));

if(isset($_FILES['file'])){
    deleteImageFile("../upload",$imagename);
    $imagename=imageUpload("file");
  

}


$stm=$conn->prepare("UPDATE `notes` SET `notes_title`=?,`notes_content`=?,`notes_image`=? WHERE notes_id=?");

$stm->execute(array($title,$content,$imagename,$notes_id));


$count=$stm->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}
else{
    echo json_encode(array("status"=>"fail"));
}

?>