<?php 
	$db = mysqli_connect("localhost", "root", "","tat");
	mysqli_query($db,"SET NAMES utf8");
	if(mysqli_connect_error()){
		echo 'Không thể kết nối với database! :(( loi la: '.mysqli_connect_error();
		die();	
	}

 ?>
