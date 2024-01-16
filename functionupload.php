<?php

define("MB",1048576); 

function imageUpload($imageRequest){
    global $messageError;
    $imagenmae=rand(1000,10000). $_FILES[$imageRequest]['name'];
    $imagetmp=$_FILES[$imageRequest]['tmp_name'];
    $imagesize=$_FILES[$imageRequest]['size'];
    $allowExt=array("jpg","png","gif","pdf","mp3");
    $strToArray=explode(".",$imagenmae);
    $ext=end($strToArray);
    $ext=strtolower($ext);
    if(!empty($imagenmae)&& !in_array($ext,$allowExt)){
$messageError[]="ext";
    }
    if($imagesize>MB*2){
        $messageError[]="size";
    }
if(empty($messageError)){
    move_uploaded_file($imagetmp,"../upload/".$imagenmae);
    return $imagenmae;
}
else{
return "fail";
}
}

function deleteImageFile($dir,$imagenam){
    if(file_exists($dir."/".$imagenam)){
        unlink($dir."/".$imagenam);
    }
}



//fun 
function checkAuthenticate(){
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {

        if ($_SERVER['PHP_AUTH_USER'] != "abdualkarim" ||  $_SERVER['PHP_AUTH_PW'] != "abdul12345"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }
}









