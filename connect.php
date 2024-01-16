
<?php

include "functionupload.php";

$dsn="mysql:host=localhost:3307;dbname=noteapp;";
$user="root";
$password="";


$option=array(
PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"//FOR ARABIC LANGUAGE
);


try{

    $conn=new PDO($dsn,$user,$password,$option);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

header("Access-Control-Allow-Origin: *");    
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
checkAuthenticate();

}catch(PDOException $error){
echo 'error is '.$error->getMessage();
}





?>