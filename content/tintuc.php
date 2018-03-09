<?php 
    include "dbconfig.php";
    
    
?>
<div class="container">
    
    <div class="row">
        <div class="page-header">
                <h3>TIN TỨC MỚI NHẤT</h3>
            </div>
        <?php 
            $list_tin =mysqli_query($connection, "SELECT * FROM tintuc  ORDER BY date DESC");
            while ($row = mysqli_fetch_array( $list_tin)){
        ?>
        <div class="col-sm-offset-2 col-sm-10 item-tin">
            <div class="row">
                <div class="col-sm-2 col-xs-6">
                    <img src="https://<?php echo $hostname."/" ?><?php echo $row["image"] ?>" alt="xe Ford cần thơ" title="<?php echo $row["title"] ?>" />
                </div>
                <div class="col-sm-10 col-xs-12">
                    <a href="https://<?php echo $hostname."/" ?>tin-moi/<?php echo $row["id"] ?>"><h5 style="color:#0B50AC"><b><?php echo $row["title"] ?></b></h5></a>
                    <p><?php echo $row["date"] ?></p>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
