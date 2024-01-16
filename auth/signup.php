
<?php
header('Content-Type: application/json');
include '../connect.php';


$username=htmlspecialchars(strip_tags($_POST['username']));
$email=htmlspecialchars(strip_tags($_POST['email']));
$password=htmlspecialchars(strip_tags($_POST['password']));

$stm=$conn->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
$stm->execute(array($username,$email,$password));


$count=$stm->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}
else{
    echo json_encode(array("status"=>"fail"));
}

?>