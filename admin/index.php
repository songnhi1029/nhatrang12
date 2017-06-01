<?php
session_start();
require('config.php');
require('resize_img.php');
require('function_ckeditor.php');
?>
<?php
  if(isset($_GET['logout']) && $_GET['logout']=="logout"){
    session_destroy();
    header("location:/admin/login.php");
  }
  ?>
<?php
//Kiem tra da co sesion dang nhap hay chua
  if(!isset($_SESSION['username'])){
  //neu chua dang nhap
    header("location: /admin/login.php");
  }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('./pages/header.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <?php include('./pages/main_header.php');?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <?php include('./pages/main_sidebar.php');?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
      if(isset($_GET['view']) && $_GET['view']!=""){
        $v=$_GET['view'];
        switch ($v) {
          case 'view':
            include('./pages/post/chi-tiet-bai-viet.php');
            break;
          case 'editors':
            include('./pages/post/editors.php');
            break;
          case 'approve':
            include('./pages/post/list-duyet-bai.php');
            break;
          case 'edit':
            include('./pages/post/sua-bai-viet.php');
            break;
          case 'editheader':
            include('./pages/setting_header/editheader.php');
            break;
          case 'editmenu':
            include('./pages/setting_header/editmenu.php');
            break;
        }
      }else{
        //neu k co $view
    ?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Chào mừng đến với trang quản trị KCITC<br/>
          <small>Trung tâm Công nghệ và Truyền thông Khánh Hòa</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
          <li class="active">Bài viết</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
              
            <!-- /.box -->
          </div>
          <!-- /.col-->
        </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
      <?php
        }
      ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php include('./pages/footer.php');?>
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
</body>
</html>
<?php
}
?>