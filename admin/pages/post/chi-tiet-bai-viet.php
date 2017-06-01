
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Chi tiết bài viết
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Quản lý bài viết</a></li>
        <li><a href="#">Bài viết</a></li>
        <li class="active">Bài viết</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
             <?php
             if(isset($_GET['id']) && $_GET['id'] != ""){
                $id = $_GET['id'];                
                $sql1 = " SELECT *
                          FROM tintuc
                          WHERE id = $id";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    while($rows=$result1->fetch_row()){
              echo '<div class="box-body no-padding">
              <div class="content">
                <!-- Third Container (Grid) -->
                <div class="container-fluid bg-3">    
                  <h1 class="margin">'.$rows[2].'</h1>
                  <p>Tác giả: <strong>';
                  $q = $conn->query("SELECT `hoten` FROM `user` WHERE `id` = '$rows[7]'");
                  while ($hg = mysqli_fetch_assoc($q)): echo $hg['hoten'];
                  endwhile;
                  echo '</strong> | <i>'.$rows[5].'</i></p>
                  <br>
                  <div class="row">
                    '.$rows[4].'
                  </div>
                </div>


              </div>
              <!-- /.content -->
              <hr/>
              <div class="col-md-12">
                
                  <div class="header">
                      <h3 class="text text-primary">Nhận xét</h3>
                      <hr/>
                    </div>
                  <div class="detailBox jumbotron">
                    <form class="form-inline" style="margin-right: 5px;" role="form">
                          <div class="form-group">
                              <input class="form-control" type="text" placeholder="Ý kiến của bạn..." />
                          </div>
                          <div class="form-group">
                              <button class="btn btn-primary">Gửi</button>
                          </div>
                      </form>
                    <div class="actionBox" style="margin-left: 5px">
                                <div class="commenterImage">
                                  <a>';
                  if($_SESSION['anh'] != ""){
                    $anhdd = 'dist/img/'.$_SESSION['anh'];
                    if (file_exists($anhdd)) {
                      $new_anhdd = 'dist/img/160x160'.$_SESSION['anh'];
                      $img_anhdd = new SimpleImage();
                      $img_anhdd->load($anhdd);
                      $img_anhdd->resizeToWidth(160);
                      $img_anhdd->save($new_anhdd);
                      echo '<img src="'.$anhdd.'" class="img-circle" alt="User Image" style="height: 50px; width: 50px;">';
                    }
                    else{
                      echo '<img src="'.$anhdd.'" class="img-circle" alt="Link hỏng :(" style="height: 50px; width: 50px;">';
                    }
                  }else{
                    echo '<img src="" class="img-circle" style="height: 50px; width: 50px;"> ';
                  }
                echo $_SESSION['username'].'</a>';
                echo '
                                </div>
                                <div class="commentText">
                                    <p class="">Bài viết hay....</p> <span class="date sub-text"><i>6/5/2017</i></span>

                                </div>
                        
                    </div>
                </div>
                
                
              </div>
              <!-- /.col -->
          </div>
          <!-- /.box-body -->';

                    }
                  }
                }

             ?>
            
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  


