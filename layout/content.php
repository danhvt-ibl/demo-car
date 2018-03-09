<?php
    $p =isset($_GET["p"])?$_GET["p"]:"";
    if($p=="san-pham"){
        include ("content/sanpham.php");
    }
    else if($p=="dong-xe"){
        include ("content/dongxe.php");
    }
    else if($p=="tin-tuc"){
        include ("content/tintuc.php");
    }
     else if($p=="tin-moi"){
        include ("content/tinmoi.php");
    }
    else if($p=="lien-he"){
        include ("content/lienhe.php");
    }
    else 
        include ("content/home.php");
?>