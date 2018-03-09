<?php 
    $hostname = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Xe ford Cần Thơ</title>
       
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
         <link rel="stylesheet" href="https://<?php echo $hostname."/" ?>dist/css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="full">
            <?php
                
                include "layout/header.php";
                
                include "layout/content.php";
                include "layout/footer.php";
            ?>
        </div>
        <script type="text/javascript" src="https://<?php echo $hostname."/" ?>dist/js/jquery.js"></script>
        <script type="text/javascript" src="https://<?php echo $hostname."/" ?>dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://<?php echo $hostname."/" ?>dist/js/script.js"></script>    
       
    </body>
</html>