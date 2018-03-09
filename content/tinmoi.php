<?php 
    include "dbconfig.php";
    $id= isset($_GET["id"])?$_GET["id"]:"";
    $tin = mysqli_query($connection, "SELECT * FROM tintuc  WHERE id='$id'");
    $tin_1 = mysqli_fetch_array($tin); 
?>
<div class="container">
    <div class="box_tin">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <div class="page-header">
                    <h3 style="color:#0D3EAA; font-weight:600"><?php  echo $tin_1["title"] ?></h3>
                </div>
                <p style="text-align:center;">
                    <img src="https://<?php echo $hostname."/" ?><?php echo $tin_1["image"] ?>" alt="xe Ford giá rẻ" >
                    <p style="margin:20px auto; text-align:justify; width:100%;">
                        <?php echo $tin_1["content"] ?>
                    </p>
                    <div class="pull-right"><?php echo $tin_1["date"] ?></div>
                </p>
            </div>
        </div>    
    </div>
</div>