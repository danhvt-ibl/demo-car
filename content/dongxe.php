<?php
   include "dbconfig.php";
    $name =isset($_GET["name"])?$_GET["name"]:"";
?>
<div class="container">
    <div class="box-kythuat">
        <div class="page-header">
            <h2><?php echo strtoupper("Ford ". $_GET["name"]) ?></h2>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 ">
                <div class="row">
                    <?php
                    $list_dong_xe = mysqli_query($connection, "SELECT * FROM dongxe WHERE name='$name'");
                    $data = mysqli_fetch_array($list_dong_xe);
                    $image = explode("::", $data["image"]);
                    
                    for( $i=0;  $i<4; $i++){
                    ?>
                        <div class="col-sm-6 col-xs-6 ">
                             <a href="#" class="thumbnail">
                                <img src="https://<?php echo $hostname."/" ?><?php echo $image[$i] ?>" alt="Ford <?php echo  $data["name"] ?>" class="anhxeMini">
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                     <div class="col-xs-12 col-sm-12">
                        <div class="info_sale2">
                            <img src="https://<?php echo $hostname."/" ?>image/quyen.jpg" class="img-circle" alt="tư vấn mua xe Ford" width="204" height="204" title="Liên hệ chúng tôi" style="margin-bottom:20px"/> 
                            <p style="font-size:16px">
                                Mọi chi tiết xin Quý khách vui lòng liên hệ:<br>
                                Phòng Kinh Doanh Cần Thơ Ford
                            </p>
                            
                            <p><h3 style="color:#165ABE">NGUYỄN PHƯƠNG QUYÊN</h3>
                                <h3 style="color:red; font-weight:600">0907 122 033</h3>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-8 col-xs-12">
                <div class="col-sm-12 col-xs-12">
                     <a href="#" class="thumbnail">
                        <img src="https://<?php echo $hostname."/" ?><?php echo $image[0] ?>" alt="<?php echo  $data["name"] ?>" id="anhxeBig">
                    </a>
                </div>
               
                <div class="col-sm-12 col-xs-12">
                    <ul style="padding:20px 45px; font-size:15px; background:#F1F1F1">
                        <?php 
                        $thongso = explode("::", $data["thongso"]);
                        foreach ( $thongso as $row){
                            $detail = explode(":",  $row);
                            echo "<li><b>".$detail[0].":</b> ".$detail[1]."</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="col-sm-12 col-xs-12">
                <div class="title_index"><h3>CÁC DÒNG <?php echo $name ?></h3></div>
                <div class="row">
                    
                    <?php
                        $name =ucfirst($name);
                        $list_sp = mysqli_query($connection, "SELECT * FROM sanpham WHERE dongxe='$name'"); 
                        while($row = mysqli_fetch_array($list_sp)){
                           
                    ?>
                        
                      <div class="col-sm-6 col-md-3 item-detail">
                        <div class="thumbnail">
                          <img src="https://<?php echo $hostname."/" ?><?php echo $row["anhdaidien"] ?>" alt="xe ford <?php echo $row["name"] ?>">
                          <div class="caption">
                            <h4><?php echo $row["name"] ?></h4>
                            <div class="giaca"><?php echo number_format($row["giaca"]) ?> VND</div>
                            
                          </div>
                        </div>
                      </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
