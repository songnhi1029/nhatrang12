<?php
session_start();
require('config.php');
?>
<?php
//Kiem tra da co sesion dang nhap hay chua
  if(isset($_SESSION['username'])){
  //neu chua dang nhap
    header("location: index.php");
  }else{
  }
?>
<?php
//kiem tra login
if(isset($_POST["submitLogin"])){
  $user = $_POST['form-username'];
  $pwd  = md5($_POST['form-password']);
  $sqlUser = "SELECT *
              FROM `user`
              WHERE `username` = '$user' AND `password` = '$pwd'";
  $dataUser = $conn->query($sqlUser);

  if ($dataUser->num_rows > 0) {
    $rows=$dataUser->fetch_row();

    $queryPQ = "SELECT * FROM phanquyen WHERE `id` = '$rows[11]'";
    $resultPQ = $conn->query($queryPQ);
    if($resultPQ->num_rows > 0) {
      while ($pq=$resultPQ->fetch_row()){
        $_SESSION['phanquyen'] = $pq[1];
        setcookie('phanquyen', '$pq[1]', time() + 30);
      }
    }else{}

    $_SESSION['username'] = $user;
    $_SESSION['fullname'] = $rows[4];
    $_SESSION['iduser'] = $rows[0];
    $_SESSION['anh'] = $rows[3];
    setcookie('username', '$user', time() + 30);
    header("location: index.php");
  }else{
    //dang nhap that bai
    echo "<script>
        window.alert('The password that you have entered is incorrect.');
      </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login|KCITC</title>

        <!-- CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        
		<link rel="stylesheet" href="bootstrap/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>KCITC</strong><br/>
                            Trung tâm Công nghệ thông tin và Truyền thông Khánh Hòa</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Đăng nhập</h3>
                            		<p>Nhập tên và mật khẩu của bạn:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="POST" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Tên đăng nhập</label>
			                        	<input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Mật khẩu</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" name="submitLogin" class="btn">Đăng nhập!</button>
			                    </form>
                                <p><a href="#">Quên mật khẩu</a></p>
		                    </div>
                        </div>
                    </div>
            </div>
            
        </div>

    </body>

</html>