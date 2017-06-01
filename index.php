<?php 

    require "core/init.php";

    $linkimage= "admin/dist/img/images-post/";

	$p ="";

	if (isset($_GET['idLT'])) {
		$idLT = $_GET['idLT'];
	}else{
		$idLT = "";
	}

	$idtintuc ="";
    if (isset($_GET['idtintuc'])) {
        $idtintuc = $_GET['idtintuc'];
    }
	
    include "includes/head.php";
    include "includes/menu.php";
    
    if(isset($_GET['p'])){
    	
    	$p = $_GET['p'];

	    switch ($p) {

	    	case 'tintuc':
	    		include "includes/content/news.php";
	    		include "includes/rightbar.php";
	    		break;

	    	case 'loaitin':
	    		if($idLT != ""){
                    include "includes/content/typeofnews.php";
                }else{
                }
	    		break;
	    	
	    	case 'quanba':
	    		include "includes/content/advertise.php";
	    		include "includes/rightbar.php";
	    		break;

	    	default:
	    		include "includes/content/main.php";
	   		 	include "includes/rightbar.php";
	    }
	    	
	   

	 }else{
	 	include "includes/content/main.php";
	    include "includes/rightbar.php";
	 } 
	 ?>
	 <!-- BACK TO TOP -->
        <img id="totop" style="width: 45px; 
	height: 45px; 
	z-index: 10000000; 
	cursor: pointer; 
	border-radius: 50%; 
	right: 5%; 
	bottom: 10%; 
	border: 4px solid #3F7F00;
	background-color: #3F7F00; 
	position: fixed;
	display: none;
	opacity: 0.3;" src="images/totop.png" alt="Back To Top">
        <script type="text/javascript">
            if ($(window).scrollTop() > 200) {
                $('#totop').fadeIn();
            }else {
                $('#totop').fadeOut();
            }
            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    $('#totop').fadeIn();
                } else {
                    $('#totop').fadeOut();
                }
            });
            $( document ).ready(function() {
                $('#totop').click(function(event){
                    $("html, body").animate({scrollTop:0}, "slow");
                });
            });
        </script>
        <!-- /BACK TO TOP -->
    <?php
    include "includes/footer.php";

 ?>