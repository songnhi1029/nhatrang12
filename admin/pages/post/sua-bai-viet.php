
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Duyệt bài viết
      </h1>
      <small>Sửa bài viết</small>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-dashboard"></i> Menu chính</a></li>
        <li><a href="">Bài viết</a></li>
        <li class="active">Duyệt bài viết</li>
        <li class="active">Sửa bài viết</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
          <?php
            if(isset($_GET['id']) && $_GET['id'] != ""){
              $id = $_GET['id'];
              $sql1 = " SELECT *
                        FROM tintuc
                        WHERE id = $id";
              $result1 = $conn->query($sql1);

              if ($result1->num_rows > 0) {
                while($rows=$result1->fetch_row()){
                  if($rows[8] != ""){
                    global $img_upload;
                    $img_upload = "images-post/".$rows[1];
                  }
          echo '
            <form method="post" enctype="multipart/form-data">
              <div class="box-header">
                <i><h4 class="text text-info">Sửa nội dung cho bài viết</h4></i>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="submit" name="btn-luu" class="btn btn-info" title="Lưu"><span class="glyphicon glyphicon-floppy-disk"></span> Lưu</button>
                  <button type="reset" class="btn btn-danger" title="Hủy"><span class="glyphicon glyphicon-remove"></span> Hủy</button>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body pad">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tiêu đề</label>
                      <input type="text" name="tieu-de" style="font-weight: bold;" class="form-control" value="'.$rows[2].'" required placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label>Loại tin</label>
                      <select name="loai-tin" class="form-control select2" style="width: 100%;">';

                        //connect into config.php
                        $query11 = "SELECT *
                                    FROM loaitin WHERE capcha != 0 OR capcha=888";
                        $result11 = $conn->query($query11);
                        if($result11->num_rows > 0) {
                          while ($type=$result11->fetch_row()){
                            if($type[0] != $rows[6]){
                              echo '<option value="'.$type[0].'">'.$type[1]. '</option>';
                            }else{
                              echo '<option selected="true" value="'.$type[0].'">'.$type[1]. '</option>';
                            }
                           }
                        }else {
                          echo "Error ".$conn->error;
                        }
                echo '
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tóm tắt</label>
                      <textarea rows="3" style="font-style: italic; color: blue" name="tom-tat" class="form-control" placeholder="Enter ...">'.$rows[3].'</textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Keyword</label>
                      <input name="key" type="text" class="form-control" value="'.$rows[8].'" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <input ';
                      if ($_SESSION['phanquyen'] != 'approver'){echo 'disabled="disabled"';}else{};
                      echo 'name="trang-thai" type="checkbox"'; 
                      if($rows[9] != 0){
                        echo 'checked="true"';
                      }else{

                      }
                      echo '> Duyệt để đăng<br/>
                      <input ';
                      if ($_SESSION['phanquyen'] != 'approver'){echo 'disabled="disabled"';}else{};
                      echo 'type="checkbox" name="noi-bat" ';
                      if($rows[10] != 0){
                        echo 'checked="true"';
                      }else{

                      }
                      echo '> Nổi bật<br/>
                      <input ';
                      if ($_SESSION['phanquyen'] != 'approver'){echo 'disabled="disabled"';}else{};
                      echo'type="checkbox" name="thong-bao"';
                      if($rows[12] != 0){
                        echo 'checked="true"';
                      }else{

                      }
                      echo '>Thông báo
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Ảnh chính</label>
                      <div id="kv-avatar-errors-2" class="center-block" ></div>
                        <div  class="col-md-9 kv-avatar center-block">
                          <input id="avatar-2" name="anh-chinh" type="file" class="file-loading">
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <label>Nội dung</label>
                    ';
                    ?>
                    <?=ckeditor("noi-dung","$rows[4]", "", "en", "", "1000");
                    echo ';
                  </div>
                </div>
              </div>
            </form>';
                }
              }
            }
          ?>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
<script src="plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>  
<script src="plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>  
<script src="plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="plugins/fileinput/js/fileinput.min.js"></script>
<script type="text/javascript">
    var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
      'onclick="alert(\'Call your custom code here.\')">' +
      '<i class="glyphicon glyphicon-tag"></i>' +
      '</button>'; 
  $("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="dist/img/anh-chinh.png" alt="Ảnh chính" style="width:100%"><h6 class="text-muted">Click chọn ảnh</h6>',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
  });
</script>

<?php
//Sua bai
if(isset($_POST['btn-luu'])){
    $tieude   = $_POST["tieu-de"];
    $tomtat   = $_POST["tom-tat"];
    $nd       = $_POST["noi-dung"];
    $loaitin  = $_POST['loai-tin'];
    
    $key   = $_POST['key'];
    if(isset($_POST["trang-thai"])){
      $trangthai= 1;  
    }else{
      $trangthai= 0;
    }
    if(isset($_POST["noi-bat"])){
      $noibat   = 1;
    }else{
      $noibat= 0;
    }
    if(isset($_POST["thong-bao"])){
      $thongbao   = 1;
    }else{
      $thongbao= 0;
    }
    
    
    // Nếu người dùng có chọn file để upload
    if (isset($_FILES['anh-chinh']))
    {
        // Nếu file upload không bị lỗi,
        // Tức là thuộc tính error > 0
       // $image=$_FILES['anh-chinh']['name'];
        if ($_FILES['anh-chinh']['error'] > 0)
        {
            
        }
        else{
            // Upload file
            $name = 'dist/img/images-post/'.$_FILES['anh-chinh']['name'];
            $img = new SimpleImage();
            $img->load($_FILES['anh-chinh']['tmp_name']);
            $img->resizeToWidth(500);
            $img->save($name);
            $image = $_FILES['anh-chinh']['name'];
            //echo 'File Uploaded';
        }
    }
    else{
        //echo 'Bạn chưa chọn file upload';
      $image="";
    }

    $query2 = " UPDATE `tintuc`
                SET `anh`= '$image', `tieudetin` = '$tieude', `tomtattin`= '$tomtat', `noidung` = '$nd', `idloaitin`='$loaitin', `keyword`='$key', `duyet`='$trangthai', `noibat`='noibat', `thongbao` = '$thongbao'
                WHERE id = $id";
    //echo $query2;
    if (mysqli_query($conn, $query2)) {
        echo "<script>alert('Sửa thành công!');</script>";
    }
    else{
      echo "Error updating record: " . $query2. ", ".mysqli_error($conn);
    }
    
}
?>
