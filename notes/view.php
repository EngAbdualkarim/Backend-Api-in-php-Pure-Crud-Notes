


<?php
header('Content-Type: application/json');
include '../connect.php';


$userid=htmlspecialchars(strip_tags($_POST['id']));


$stm=$conn->prepare("SELECT * FROM  notes WHERE `notes_user`=? ");
$stm->execute(array($userid));

$data=$stm->fetchAll(PDO::FETCH_ASSOC);

$count=$stm->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}
else{
    echo json_encode(array("status"=>"fail"));
}

?>