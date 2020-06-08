<?php
    include_once("../function/config.php");
	session_start();
	
	session_destroy();
	
	header("location: ".BASE_URL);

?>