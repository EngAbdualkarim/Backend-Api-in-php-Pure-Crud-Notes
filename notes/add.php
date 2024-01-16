

<?php

include '../connect.php';
include "../functionupload.php";



$title=htmlspecialchars(strip_tags($_POST['title']));
$content=htmlspecialchars(strip_tags($_POST['content']));
$userid=htmlspecialchars(strip_tags($_POST['id']));
$imagename=imageUpload("file");

if($imagename!="fail"){

    $stm=$conn->prepare("INSERT INTO notes(notes_title,	notes_content,notes_user,notes_image) VALUES(?,?,?,?)");
    $stm->execute(array($title,$content,$userid,$imagename));
    
    
    $count=$stm->rowCount();
    
    if($count>0){
        echo json_encode(array("status"=>"success"));
    }
    else{
        echo json_encode(array("status"=>"fail"));
    }
}
else{
    echo json_encode(array("status"=>"fail"));
}


?>