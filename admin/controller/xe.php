<?php
include "dbconfig.php";
     function getExtension($str)
    {
        $i = strrpos($str,".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i+1, $l);
        return $ext;
    }
    $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
    if(isset($_POST["themxe"])){
        
        $dongxe = $_POST["dongxe"];
        $name = mysqli_real_escape_string($connection, $_POST["name"]);
        $giaca = $_POST["giaca"];
        $path= "../../image/";
        
        $anhdaidien = $_FILES['anhdaidien']['name'];
        if($anhdaidien){
            $ext = getExtension($anhdaidien);
            $actual_image_name = time().$dongxe.".".$ext;
            
            $tmp = $_FILES['anhdaidien']['tmp_name'];
            if(move_uploaded_file($tmp, $path.$actual_image_name)){
                $path= "image/";
                $url =$path.$actual_image_name;
                mysqli_query($connection,"INSERT INTO sanpham(name, anhdaidien, dongxe, giaca) VALUES(N'$name','$url','$dongxe','$giaca')");
                echo "Thêm xe thành công";
                header ("location: ../index.php");
            }
        }
        
        
    }
    if(isset($_POST["suaxe"])){
        $name = mysqli_real_escape_string($connection, $_POST["name"]);
        $giaca = $_POST["giaca"];
        $path= "../../image/";
        $id =isset($_GET["id"])?$_GET["id"]:"";
        $anhdaidien = $_FILES['anhdaidien']['name'];
        if($anhdaidien){
            $ext = getExtension($anhdaidien);
            $actual_image_name = time().$dongxe.".".$ext;
            
            $tmp = $_FILES['anhdaidien']['tmp_name'];
            if(move_uploaded_file($tmp, $path.$actual_image_name)){
                $path= "image/";
                $url =$path.$actual_image_name;
                mysqli_query($connection,"UPDATE sanpham SET name = N'$name', anhdaidien= '$url', giaca='$giaca' WHERE id='$id'");
                echo "Thêm xe thành công";
                
            }
        }
        else 
           mysqli_query($connection,"UPDATE sanpham SET name = N'$name', giaca='$giaca' WHERE id='$id'");
        header ("location: ../index.php");
    }
    if(isset($_GET["xoaxe"])){
        $id= isset($_GET["id"])?$_GET["id"]:"";
        mysqli_query($connection,"DELETE FROM sanpham WHERE id='$id'");
        header ("location: ../index.php");
    }
?>