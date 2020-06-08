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
	$presensi = query("SELECT * FROM presensi WHERE nip = '$pegawai[nip]' ORDER BY tanggal DESC LIMIT 1");
	
 ?>

<?php foreach ($presensi as $row): ?>
	
	<?php if ($tanggalTap == $row['tanggal']): ?>

	<h1 class="text-center mb-0">Hi, <?= $pegawai['nama_pgw'] ?></h1>
		<h1 class="text-center mt-1" style="color: Red;">Anda sudah melakukan presensi!</h1>
	<?php endif ?>
<?php endforeach ?>	
<!--  -->


	<?php if ($jamTap < $jamPresensi['jam_masuk1']): ?>
		<h1 class="text-center mt-1" style="color: red;">Presensi belum dimulai!</h1>
	<?php endif ?>
	
<!-- mun tabel kosong -->
<?php if ($presensi == NULL): ?>
	<?php if ($jamTap > $jamPresensi['jam_masuk2'] && $jamTap < $jamPresensi['jam_pulang1']): ?>
			<h1 class="text-center mb-0">Hi, <?= $pegawai['nama_pgw'] ?></h1>
			<h1 class="text-center mt-1" style="color: Orange;">Anda terlambat masuk kerja</h1>
			<?php 
			$nip = $pegawai['nip'];
			$keterangan = 'Telat';
			$query = "INSERT INTO presensi
				VALUES
				('','$nip','$tanggalTap', '$jamTap', '', '$keterangan')";
			mysqli_query($koneksi, $query);
		    return mysqli_affected_rows($koneksi);
			 ?>
			
		<?php endif ?>

	<!-- hadir -->
		<?php if ($jamTap >= $jamPresensi['jam_masuk1']&& $jamTap <= $jamPresensi['jam_masuk2']): ?>
			<h1 class="text-center mb-0">Hi, <?= $pegawai['nama_pgw'] ?></h1>
			<h1 class="text-center mt-1" style="color: green;">Presensi berhasil! </h1>

			<?php 
			$nip = $pegawai['nip'];
			$keterangan = 'Hadir';
			$query = "INSERT INTO presensi
				VALUES
				('','$nip','$tanggalTap', '$jamTap', '', '$keterangan')";
			mysqli_query($koneksi, $query);
		    return mysqli_affected_rows($koneksi);
			 exit;
			 ?>
		<?php endif ?>
<?php endif ?>





<?php foreach ($presensi as $row): ?>
	<?php if ($tanggalTap != $row['tanggal']): ?>
		<!-- telat -->
		<?php if ($jamTap > $jamPresensi['jam_masuk2'] && $jamTap < $jamPresensi['jam_pulang1']): ?>
			<h1 class="text-center mb-0">Hi, <?= $pegawai['nama_pgw'] ?></h1>
			<h1 class="text-center mt-1" style="color: Orange;">Anda terlambat masuk kerja</h1>
			<?php 
			$nip = $pegawai['nip'];
			$keterangan = 'Telat';
			$query = "INSERT INTO presensi
				VALUES
				('','$nip','$tanggalTap', '$jamTap', '', '$keterangan')";
			mysqli_query($koneksi, $query);
		    return mysqli_affected_rows($koneksi);
			 ?>
			
		<?php endif ?>

	<!-- hadir -->
		<?php if ($jamTap >= $jamPresensi['jam_masuk1']&& $jamTap <= $jamPresensi['jam_masuk2']): ?>
			<h1 class="text-center mb-0">Hi, <?= $pegawai['nama_pgw'] ?></h1>
			<h1 class="text-center mt-1" style="color: green;">Presensi berhasil! </h1>

			<?php 
			$nip = $pegawai['nip'];
			$keterangan = 'Hadir';
			$query = "INSERT INTO presensi
				VALUES
				('','$nip','$tanggalTap', '$jamTap', '', '$keterangan')";
			mysqli_query($koneksi, $query);
		    return mysqli_affected_rows($koneksi);
			 exit;
			 ?>
		<?php endif ?>
	<?php endif ?>
<?php endforeach ?>



