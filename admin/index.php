<?php 
    session_start();
    if(!isset($_SESSION["admin"])){
        header ("location: login.php");
    }
    include "controller/dbconfig.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Xe ford Cần Thơ</title>
       
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
         <link rel="stylesheet" href="dist/css/style.css" rel="stylesheet"/>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
          <h3>XE FORD CẦN THƠ -DASHBOARD</h3>
          <h4>Admin: <?php echo $_SESSION["name_user"] ?> <a href="controller/logout.php" class="btn btn-default">Đăng xuất</a></h4>
          <ul class="nav nav-tabs">
            <li class="active"> <a href="#home" data-toggle="tab">Sản phẩm </a>  </li>
            <li><a href="#menu1" data-toggle="tab">Tin tức</a></li>
          </ul>
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              <h3>Thêm xe</h3>
              <form class="form-horizontal" role="form" action="controller/xe.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="dongxe">Dòng xe:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="dongxe"  name="dongxe">
                            <option value="" selected>---Chọn dòng xe--</option>
                            <option value="Fiesta">Fiesta</option>
                            <option value="Focus">Focus</option>
                            <option value="Ecosport">Ecosport</option>
                            <option value="Transit">Transit</option>
                            <option value="Everest">Everest</option>
                            <option value="Ranger">Ranger</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Tên xe:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Điền tên xe" name="name">
                      <span id="helpBlock" class="help-block">Ví dụ: 1.5L Trend MT</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Giá cả:</label>
                    <div class="col-sm-10"> 
                      <input type="text" class="form-control" id="giaca" placeholder="Giá cả xe" name="giaca">
                      <span id="helpBlock" class="help-block">Ví dụ: 606,000,000</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Ảnh đại diện:</label>
                    <div class="col-sm-10"> 
                      <input type="file" class="form-control" id="anhdaidien" name="anhdaidien">
                      
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" name="themxe">Submit</button>
                    </div>
                  </div>
                </form>
                <h3>Danh sách xe Ford</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên xe</th>
                      <th>Dòng xe</th>
                      <th>Giá cả</th>
                      <th>Ảnh xe</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $list_xe_query = mysqli_query($connection, "SELECT * FROM sanpham ORDER BY id DESC");
                      $i= 1;
                      while($row = mysqli_fetch_array($list_xe_query)){
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row["name"] ?></td>
                      <td><?php echo $row["dongxe"] ?></td>
                      <td><?php echo number_format($row["giaca"]) ?></td>
                      <td><img src="../<?php echo $row["anhdaidien"] ?>" alt="Giá xe Ford <?php echo $row["dongxe"] ?>" width="70"></td>
                      <td>
                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="controller/xe.php?xoaxe=true&id=<?php echo $row["id"] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    <!-- Modal -->
                  <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                  
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Sửa thông tin</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" role="form" action="controller/xe.php?id=<?php echo $row["id"] ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label class="control-label " for="email">Tên xe:</label>
                              
                              <input type="text" class="form-control" placeholder="Điền tên xe" name="name" value="<?php echo $row["name"] ?>">
                              
                            </div>
                            <div class="form-group">
                              <label class="control-label " >Giá cả:</label>
                               
                              <input type="text" class="form-control"  placeholder="Giá cả xe" name="giaca" value="<?php echo $row["giaca"] ?>">
                               
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="pwd">Ảnh đại diện:</label>
                                <input type="file" class="form-control"  name="anhdaidien">
                            </div>
                            <div class="form-group"> 
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success" name="suaxe">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                    <?php
                        $i =$i+1;
                      }
                    ?>
                    
                  </tbody>
                </table>
                
            </div>
            <div id="menu1" class="tab-pane fade">
              <h3>Tin tức mới nhất</h3>
              <form class="form-horizontal" role="form" action="controller/tintuc.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="title">Tiêu đề:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="title" placeholder="Điền tên tiều đề" name="title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="content">Nội dung:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Ảnh đại diện:</label>
                    <div class="col-sm-10"> 
                      <input type="file" class="form-control" id="anhdaidien" name="anhdaidien">
                      
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" name="themtin">Submit</button>
                    </div>
                  </div>
                </form>
                <h3>Danh sách xe Ford</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tiêu đề</th>
                      <th>Nội dung</th>
                      <th>Giá cả</th>
                      <th>Ảnh xe</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $list_tin_query = mysqli_query($connection, "SELECT * FROM tintuc WHERE visible ='0' ORDER BY date DESC");
                      $i= 1;
                      while($row = mysqli_fetch_array($list_tin_query)){
                    ?>
                    <style>
                      .tintuc_row {
                          height:60px !important;
                          overflow:auto;
                      }
                    </style>
                    <tr class="tintuc_row">
                      <td><?php echo $i ?></td>
                      <td><?php echo $row["title"] ?></td>
                      <td><?php echo $row["content"] ?></td>
                      <td><?php echo $row["date"] ?></td>
                      <td><img src="../<?php echo $row["image"] ?>" alt="mua xe hơi uy tín" width="70"></td>
                      <td>
                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="controller/tintuc.php?antin=true&id=<?php echo $row["id"] ?>" class="btn btn-info"><span class="glyphicon glyphicon-eye-close" title="Ẩn tin"></span></a>
                        <a href="controller/tintuc.php?xoatin=true&id=<?php echo $row["id"] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    <!-- Modal -->
                  <div id="myModal1" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                  
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Sửa thông tin</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" role="form" action="controller/tintuc.php?id=<?php echo $row["id"] ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label class="control-label " for="title">Tiêu đề:</label>
                              
                              <input type="text" class="form-control" placeholder="Điền tiêu đề" name="title" value="<?php echo $row["title"] ?>">
                              
                            </div>
                            <div class="form-group">
                              <label class="control-label " >Nội dung: </label>
                               
                              <textarea rows="8" class="form-control"  placeholder="Nội dung" name="content"><?php echo $row["content"] ?></textarea>
                               
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="pwd">Ảnh đại diện:</label>
                                <input type="file" class="form-control"  name="anhdaidien">
                            </div>
                            <div class="form-group"> 
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success" name="suatin">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                    <?php
                        $i =$i+1;
                      }
                    ?>
                    
                  </tbody>
                </table>
            </div>
          </div>
        </div>
    </body>
</html>    