<?php
if(isset($_GET['lenh'], $_GET['id']) && $_GET['id'] != ""){
  $l  = $_GET['lenh'];
  $id = $_GET['id'];
  
  switch ($l) {
    case 'xoa':
      $sqlDel =  "DELETE 
                  FROM tintuc
                  WHERE id = '$id'";
      if($conn->query($sqlDel)){
        echo "<script> alert('Xóa thành công!');</script>";
      }else{ 
        echo "<script> alert('Không xóa được!');</script>";
      }
      break;
    case 'dang':
      $sqlUp =  "UPDATE tintuc
                  SET `duyet`='1'
                  WHERE id = '$id'";
      if($conn->query($sqlUp)){
        echo "<script> alert('Đã đăng!');</script>";
      }else{ 
        echo "<script> alert('Không đăng được!');</script>";
      }
      break;
    case 'x-dang':
      $sqlxUp =  "UPDATE tintuc
                  SET `duyet`='0'
                  WHERE id = '$id'";
      if($conn->query($sqlxUp)){
        echo "<script> alert('Đã hủy đăng!');</script>";
      }else{ 
        echo "<script> alert('Không hủy đăng được!');</script>";
      }
      break;
    case 'noibat':
      $sqlTop =  "UPDATE tintuc
                  SET `noibat`='1'
                  WHERE id = '$id'";
      if($conn->query($sqlTop)){
        echo "<script> alert('Đã nổi bật!');</script>";
      }else{ 
        echo "<script> alert('Không nổi bật được!');</script>";
      }
      break;
    case 'x-noibat':
      $sqlxTop =  "UPDATE tintuc
                  SET `noibat`='0'
                  WHERE id = '$id'";
      if($conn->query($sqlxTop)){
        echo "<script> alert('Đã hủy nổi bật!');</script>";
      }else{ 
        echo "<script> alert('Không hủy nổi bật được!');</script>";
      }
      break;
    case 'thongbao':
      $sqlNote =  "UPDATE tintuc
                  SET `thongbao`='1'
                  WHERE id = '$id'";
      if($conn->query($sqlNote)){
        echo "<script> alert('Đã là thông báo!');</script>";
      }else{ 
        echo "<script> alert('Không là thông báo được!');</script>";
      }
      break;
    case 'x-thongbao':
      $sqlxNote =  "UPDATE tintuc
                  SET `thongbao`='0'
                  WHERE id = '$id'";
      if($conn->query($sqlxNote)){
        echo "<script> alert('Đã hủy là thông báo!');</script>";
      }else{ 
        echo "<script> alert('Không hủy là thông báo được!');</script>";
      }
      break;
  }
}
?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Duyệt bài viết
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-dashboard"></i> Menu chính</a></li>
        <li><a href="">Bài viết</a></li>
        <li class="active">Duyệt bài viết</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Xem</th>
                  <th>Ảnh</th>
                  <th>Tiêu đề</th>
                  <?php
                    if ($_SESSION['phanquyen'] == 'approver'){
                      echo '
                      <th>Tác giả</th>
                      <th>Duyệt</th>
                      <th>Nổi bật</th>
                      <th>Thông báo</th>';
                    }else{}
                  ?>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($_SESSION['phanquyen'] != 'approver'){
                  $sql1 = " SELECT *
                            FROM `tintuc`
                            WHERE `duyet` = 0 AND iduser = '".$_SESSION['iduser']."'
                            ORDER BY `ngaydangtin` DESC";
                }else{
                  $sql1 = " SELECT *
                            FROM `tintuc`
                            ORDER BY `ngaydangtin` DESC";
                }
                    $result1 = $conn->query($sql1);

                    if ($result1->num_rows > 0) {
                      $stt=1;
                      while($rows=$result1->fetch_row()){
                        $alt="";
                        $new_name = "";
                        if($rows[1] != ""){
                          $name = './dist/img/images-post/'.$rows[1];
                          if (file_exists($name)) {
                            $new_name = './dist/img/images-post/100x100'.$rows[1];
                            $img = new SimpleImage();
                            $img->load($name);
                            $img->resizeToWidth(100);
                            $img->save($new_name);
                            //$alt = $rows[8];
                          }
                          else{
                            $alt="Link hỏng :(";
                          }
                        }else{
                        }
                        echo '<tr>
                          <td><a href="?view=view&id='.$rows[0].'">'.$stt.' <i class="fa fa-mail-forward"></i></a></td>
                          <td> <img src="'.$new_name.'" alt="'.$alt.'" class="img-responsive"> </td>
                          <td>
                              '.$rows[2].'
                          </td>';

                        if ($_SESSION['phanquyen'] == 'approver'){
                            $sqltagia ="SELECT * FROM `user` WHERE `id` = $rows[7]";
                            $tentacgia = $conn->query($sqltagia);
                            if ($tentacgia->num_rows > 0) {
                              while($kqttgia=$tentacgia->fetch_row()){
                                echo '<td>'.$kqttgia[1].'</td>';
                              }
                            }
                            if($rows[9]==1){//đã đăng
                              echo '
                              <td>
                                <a href="?view=approve&lenh=x-dang&id='.$rows[0].'"><label class="label label-warning">Trả lại</label></a>
                              </td>';
                            }else if($rows[9] == 0){
                              echo '
                              <td>
                                <a href="?view=approve&lenh=dang&id='.$rows[0].'"><label class="label label-success">Đăng</label></a>
                              </td>';
                            }

                            if($rows[10] == 1){//đã nổi bật
                              echo '
                              <td>
                                <a href="?view=approve&lenh=x-noibat&id='.$rows[0].'" class="text text-primary"><i class="fa fa-check" aria-hidden="true"></i></a>
                              </td>';  
                            }else if($rows[10] == 0){
                              echo '
                              <td>
                                <a href="?view=approve&lenh=noibat&id='.$rows[0].'" class="text text-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                              </td>';
                            }
                            if($rows[12] == 1){//đã thông báo
                              echo '
                              <td>
                                <a href="?view=approve&lenh=x-thongbao&id='.$rows[0].'" class="text text-primary"><i class="fa fa-check" aria-hidden="true"></i></a>
                              </td>';  
                            }else if($rows[12] == 0){
                              echo '
                              <td>
                                <a href="?view=approve&lenh=thongbao&id='.$rows[0].'" class="text text-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                              </td>';
                            }
                        }else{}
                        echo '
                          <td>
                            <a href="?view=edit&id='.$rows[0].'"><label class="label label-info">Sửa</label></a>
                            <a href="?view=approve&lenh=xoa&id='.$rows[0].'"><label class="label label-danger">Xóa</label></a>
                          </td>
                        </tr>';
                        $stt++;
                      }
                    }else{
                      //echo "Error: ".$conn->error();
                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->