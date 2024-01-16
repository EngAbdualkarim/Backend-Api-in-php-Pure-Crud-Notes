

<?php
header('Content-Type: application/json');
include '../connect.php';


$email=htmlspecialchars(strip_tags($_POST['email']));
$password=htmlspecialchars(strip_tags($_POST['password']));

$stm=$conn->prepare("SELECT * FROM  users WHERE `password`=?  AND `email`=? ");
$stm->execute(array($password,$email));

$data=$stm->fetch(PDO::FETCH_ASSOC);

$count=$stm->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}
else{
    echo json_encode(array("status"=>"fail"));
}

?>