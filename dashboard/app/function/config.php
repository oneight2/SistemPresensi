<?php
	define("BASE_URL", "http://localhost/presensi/dashboard/");
	
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "presensi";

	$koneksi = mysqli_connect($server,$username,$password,$database) or die("koneksi ke database gagal");

	