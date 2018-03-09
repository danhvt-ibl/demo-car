
    <!--<div class="box-search">-->
    <!--    <h3>TÌM KIẾM</h3>-->
    <!--    <form class="form-inline" role="form">-->
    <!--      <div class="form-group">-->
    <!--        <label for="email">Email address:</label>-->
    <!--        <input type="email" class="form-control" id="email">-->
    <!--      </div>-->
    <!--      <div class="form-group">-->
    <!--        <label for="pwd">Password:</label>-->
    <!--        <input type="password" class="form-control" id="pwd">-->
    <!--      </div>-->
    <!--      <div class="checkbox">-->
    <!--        <label><input type="checkbox"> Remember me</label>-->
    <!--      </div>-->
    <!--      <button type="submit" class="btn btn-default">Submit</button>-->
    <!--    </form>-->
    <!--</div>-->
   <?php
   include "dbconfig.php";
       include "layout/carousel.php"; ?>
    <div class="box-san-pham">
        <div class="container">
            <div class="title_index"><h3>DÒNG XE MỚI NHẤT </h3></div>
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 dong_xe_wrap">
                    <div class="thumbnail">
                        <img src="https://<?php echo $hostname."/" ?>image/fiesta_front.jpg" alt="Ford Fiesta" class="image_front">
                        <img src="https://<?php echo $hostname."/" ?>image/fiesta_back.jpg" alt="Ford Fiesta" class="image_back">
                        <div class="caption">
                            <h3 style="font-weight:600">FORD FIESTA</h3>
                            <p>
                                <a href="https://<?php echo $hostname."/" ?>dong-xe/fiesta" class="btn btn-primary" role="button">Xem chi tiết</a> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6 dong_xe_wrap">
                    <div class="thumbnail">
                        <img src="https://<?php echo $hostname."/" ?>image/focus_front.jpg" alt="Ford Focus" class="image_front">
                        <img src="https://<?php echo $hostname."/" ?>image/focus_back.jpg" alt="Ford Focus" class="image_back">
                        <div class="caption">
                            <h3 style="font-weight:600">FORD FOCUS</h3>
                            <p><a href="https://<?php echo $hostname."/" ?>dong-xe/focus" class="btn btn-primary" role="button">Xem chi tiết</a> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6 dong_xe_wrap">
                    <div class="thumbnail">
                        <img src="https://<?php echo $hostname."/" ?>image/everest_front.jpg" alt="Ford Everest" class="image_front">
                        <img src="https://<?php echo $hostname."/" ?>image/everest_back.jpg" alt="Ford Everest" class="image_back">
                        <div class="caption">
                            <h3 style="font-weight:600">FORD EVEREST</h3>
                            <p><a href="https://<?php echo $hostname."/" ?>dong-xe/everest" class="btn btn-primary" role="button">Xem chi tiết</a> </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-xs-12 col-sm-6 dong_xe_wrap">
                    <div class="thumbnail">
                        <img src="https://<?php echo $hostname."/" ?>image/ranger_front.jpg" alt="Ford Ranger" class="image_front">
                        <img src="https://<?php echo $hostname."/" ?>image/ranger_back.jpg" alt="Ford Ranger" class="image_back">
                        <div class="caption">
                            <h3 style="font-weight:600">FORD RANGER</h3>
                            <p><a href="https://<?php echo $hostname."/" ?>dong-xe/ranger" class="btn btn-primary" role="button">Xem chi tiết</a> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6 dong_xe_wrap">
                    <div class="thumbnail">
                        <img src="https://<?php echo $hostname."/" ?>image/ecosport_front.jpg" alt="Ford Ecosport" class="image_front">
                        <img src="https://<?php echo $hostname."/" ?>image/ecosport_back.png" alt="Ford Ecosport" class="image_back">
                        <div class="caption">
                            <h3 style="font-weight:600">FORD ECOSPORT</h3>
                            <p><a href="https://<?php echo $hostname."/" ?>dong-xe/ecosport" class="btn btn-primary" role="button">Xem chi tiết</a> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6 dong_xe_wrap">
                    <div class="thumbnail">
                        <img src="https://<?php echo $hostname."/" ?>image/transit_front.jpg" alt="Ford Transit" class="image_front">
                        <img src="https://<?php echo $hostname."/" ?>image/transit_back.jpg" alt="Ford Transit" class="image_back">
                        <div class="caption">
                            <h3 style="font-weight:600">FORD TRANSIT</h3>
                            <p><a href="https://<?php echo $hostname."/" ?>dong-xe/transit" class="btn btn-primary" role="button">Xem chi tiết</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="box-tin-tuc">
        <div class="container">
            <div class="title_index"><h3>TIN TỨC VÀ LIÊN HỆ</h3></div>
            <div class="row">
                <div class="col-sm-6" style="margin-top:20px">
                    <div class="row">
                     <?php 
                        $list_tin =mysqli_query($connection, "SELECT * FROM tintuc  ORDER BY date DESC LIMIT 3");
                        while ($row = mysqli_fetch_array( $list_tin)){
                    ?>
                        <div class="col-sm-11 item-tin-tuc">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <img src="https://<?php echo $hostname."/" ?><?php echo $row["image"] ?>" alt="xe Ford cần thơ" title="<?php echo $row["title"] ?>"  width="120" height="100"/>
                                </div>
                                <div class="col-sm-9 col-xs-6">
                                    <a href="https://<?php echo $hostname."/" ?>tin-moi/<?php echo $row["id"] ?>"><h5 style="color:#0B50AC"><b><?php echo $row["title"] ?></b></h5></a>
                                    <p><?php echo $row["date"] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    
                    </div>
                     <a href="?p=tin-tuc" class="btn btn-primary">Xem tất cả tin tức</a>
                </div>
                <div class="col-sm-6">
                    <div class="page-header" style="margin-top:10px">
                        <h3><b>CHÍNH SÁCH CỦA CÔNG TY</b></h3>
                    </div>
                     <ul class="list-chinh-sach">
                          <li>Hỗ trợ thủ tục tài chính qua ngân hàng lên đến <b>70% </b> giá trị xe</li>
                          <li>Chương trình thu mua xe cũ đổi xe mới với giá cao</li>
                          <li>Dịch vụ sửa chữa lưu động	</li>
                          <li>Nhiều quà tặng có giá trị khác</li>

                    </ul>
                    <div class="info_sale">
                        <p style="font-size:17px">
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
    </div>

