
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>KCITC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin </b>KCITC</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
              if($_SESSION['anh'] != ""){
                $anhdd = 'dist/img/'.$_SESSION['anh'];
                if (file_exists($anhdd)) {
                  $new_anhdd = 'dist/img/160x160'.$_SESSION['anh'];
                  $img_anhdd = new SimpleImage();
                  $img_anhdd->load($anhdd);
                  $img_anhdd->resizeToWidth(160);
                  $img_anhdd->save($new_anhdd);
                  echo '<img src="'.$anhdd.'" class="user-image" alt="User Image">';
                }
                else{
                  echo '<img src="'.$anhdd.'" class="user-image" alt="Link hỏng :(">';
                }
              }else{
                echo '<img src="" class="user-image">';
              }
            ?>
            
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php
                  if($_SESSION['anh'] != ""){
                    $anhdd = 'dist/img/'.$_SESSION['anh'];
                    if (file_exists($anhdd)) {
                      $new_anhdd = 'dist/img/160x160'.$_SESSION['anh'];
                      $img_anhdd = new SimpleImage();
                      $img_anhdd->load($anhdd);
                      $img_anhdd->resizeToWidth(160);
                      $img_anhdd->save($new_anhdd);
                      echo '<img src="'.$anhdd.'" class="img-circle" alt="User Image">';
                    }
                    else{
                      echo '<img src="'.$anhdd.'" class="img-circle" alt="Link hỏng :(">';
                    }
                  }else{
                    echo '<img src="" class="img-circle"">';
                  }
                ?>
                <p>
                  <?php echo $_SESSION['fullname'];
                  if($_SESSION['phanquyen'] == 'admin'){
                      echo '<small>Ban quản trị.</small>';
                  }else if($_SESSION['phanquyen'] == 'poster'){
                      echo '<small>Nhân viên post bài chính.</small>';
                  }else if($_SESSION['phanquyen'] == 'approver'){
                      echo '<small>Duyệt bài viết.</small>';
                  }
                  ?>
                  
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Thông tin tài khoản</a>
                </div>
                <div class="pull-right">
                  <a href="?logout=logout" class="btn btn-default btn-flat">Đăng xuất</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
          -->
        </ul>
      </div>
    </nav>