<?php

		// Create connection
		$conn = mysqli_connect("localhost", "root", "","tat");
		mysqli_query($conn,"SET NAMES utf8");

		// Check connection
		if ($conn->connect_error) {
		    //die("Connection failed: " . );
		?>
		    <script>
		    	console.log("Connection failed: ".$conn->connect_error);
		    </script>
		<?php
		}	
?>