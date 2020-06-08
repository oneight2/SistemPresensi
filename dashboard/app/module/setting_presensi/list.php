<?php 
	$no = 1;
	$tanggal = date('Y-m-d');
	$view_jam = query("SELECT * FROM jam_presensi")[0];
	$pegawai = query("SELECT * FROM pegawai ");

 ?>