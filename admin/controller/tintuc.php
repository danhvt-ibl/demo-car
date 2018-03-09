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
    if(isset($_POST["themtin"])){
        
        $title = mysqli_real_escape_string($connection, $_POST["title"]);
        $content = $_POST["content"];
        $path= "../../image/";
        
        $anhdaidien = $_FILES['anhdaidien']['name'];
        if($anhdaidien){
            $ext = getExtension($anhdaidien);
            $actual_image_name = time().".".$ext;
            
            $tmp = $_FILES['anhdaidien']['tmp_name'];
            if(move_uploaded_file($tmp, $path.$actual_image_name)){
                $path= "image/";
                $url =$path.$actual_image_name;
                $date =date("Y-m-d");
                mysqli_query($connection,"INSERT INTO tintuc(title, image, content, date) VALUES(N'$title','$url',N'$content','$date')");
                echo "Thêm tin tức thành công";
                header ("location: ../index.php");
            }
        }
        
        
    }
    if(isset($_POST["suatin"])){
        $title = mysqli_real_escape_string($connection, $_POST["title"]);
        $content = $_POST["content"];
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
                mysqli_query($connection,"UPDATE tintuc SET title = N'$title', image= '$url', content='$content' WHERE id='$id'");
                echo "Sửa thông tin thành công";
                
            }
        }
        else 
           mysqli_query($connection,"UPDATE tintuc SET title = N'$title', content='$content' WHERE id='$id'");
            header ("location: ../index.php");
    }
    if(isset($_GET["xoatin"])){
        $id= isset($_GET["id"])?$_GET["id"]:"";
        mysqli_query($connection,"DELETE FROM tintuc WHERE id='$id'");
        header ("location: ../index.php");
    }
    if(isset($_GET["antin"])){
        $id= isset($_GET["id"])?$_GET["id"]:"";
        mysqli_query($connection,"UPDATE tintuc SET visible = '1' WHERE id='$id'");
        header ("location: ../index.php");
    }
    
?>