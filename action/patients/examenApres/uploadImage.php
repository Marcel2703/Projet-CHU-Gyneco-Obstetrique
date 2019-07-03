<?php 
$allowedExts = array("gif","jpeg","jpg","png","JPG","JPEG");
$temp = explode(".",$_FILES['img']['name']);
$extension = end($temp);
if((($_FILES['img']['type']=="image/gif") ||
    ($_FILES['img']['type']=="image/jpeg") ||
    ($_FILES['img']['type']=="image/jpg") ||
    ($_FILES['img']['type']=="image/pjpeg") ||
    ($_FILES['img']['type']=="image/x-png") ||
    ($_FILES['img']['type']=="image/png"))
    && in_array($extension,$allowedExts)){
    if($_FILES['img']['error']> 0){
        echo "Return:".$_FILES['img']['error']."<br/>";
    }
    else{
        $target= "stockageImage/";
        move_uploaded_file($_FILES['img']['tmp_name'],$target.$_FILES['img']['name']);
        echo "http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examenApres/stockageImage/".$_FILES['img']['name'];
    }
}
else{
    echo "Non";
}