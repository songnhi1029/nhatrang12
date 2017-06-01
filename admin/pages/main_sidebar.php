
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
            if($_SESSION['anh'] != ""){
              $anhdd = '/admin/dist/img/'.$_SESSION['anh'];
              if (file_exists($anhdd)) {
                $new_anhdd = '/admin/dist/img/160x160'.$_SESSION['anh'];
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
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU CHÍNH</li>
        <?php
          //new khong la admin
          if ($_SESSION['phanquyen'] != 'admin'){
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Bài viết</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="?view=editors"><i class="fa fa-circle-o"></i> Tạo mới bài viết</a></li>
                <li><a href="?view=approve"><i class="fa fa-circle-o"></i> Duyệt bài viết</a></li>
              </ul>
            </li>';
          }else{}
          //neu la admin
          if ($_SESSION['phanquyen'] == 'admin'){
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-eye" aria-hidden="true"></i> <span>Cài đặt Banner</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="?view=editheader"><i class="fa fa-circle-o"></i> Header</a></li>
                <li><a href="?view=editmenu"><i class="fa fa-circle-o"></i> Menu</a></li>
                <li><a href="?view=editquangcao"><i class="fa fa-circle-o"></i> Quảng cáo</a></li>
              </ul>
            </li>';
          }else{}

        ?>
        <li class="header">TÀI KHOẢN CỦA TÔI</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user" aria-hidden="true"></i><span><?php echo $_SESSION['username']?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Tài khoản</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Thông báo</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Tin nhắn</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  