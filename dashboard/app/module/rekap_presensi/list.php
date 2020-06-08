<?php 
	$nip = $_SESSION['id_user'];
	$presensi = query("SELECT * FROM presensi INNER JOIN pegawai ON  presensi.nip = pegawai.nip");
	$presensi_pegawai = query("SELECT * FROM presensi INNER JOIN pegawai ON  presensi.nip = pegawai.nip WHERE presensi.nip = '$nip'");
 ?>