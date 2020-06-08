 <script>
		window.setTimeout(function() {
    	 document.location.href='';
		}, 2000);
</script>
<?php 
	include_once("../../function/function.php");
	ini_set('date.timezone', 'Asia/Jakarta');
	$rfid = $_GET['kode_rfid'];
	$jamTap = date('H:i:s');
	$tanggalTap = date('Y-m-d');
	$pegawai= query("SELECT * FROM pegawai WHERE rfid = '$rfid'")[0];
	$jamPresensi= query("SELECT * FROM jam_presensi ")[0];
	$presensi = query("SELECT * FROM presensi WHERE nip = '$pegawai[nip]'");
 ?>

 
<?php foreach ($presensi as $row): ?>
	<?php if ($tanggalTap == $row['tanggal']): ?>
		<?php if ($jamTap >= $jamPresensi['jam_pulang1'] && $jamTap <= $jamPresensi['jam_pulang2']): ?>
		<h1 class="text-center mb-0">Hi, <?= $pegawai['nama_pgw'] ?></h1>
		<h1 class="text-center mt-1" style="color: green;">Presensi Pulang berhasil! </h1>
		<?php 
		$nip = $pegawai['nip'];
		$query = "UPDATE presensi 
			SET
			jam_pulang = '$jamTap' WHERE nip = '$nip'";
		mysqli_query($koneksi, $query);
	    return mysqli_affected_rows($koneksi);
		 ?>
		
	<?php endif ?>
	<?php endif ?>
<?php endforeach ?>