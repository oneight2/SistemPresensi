<div class="ajax">
<?php 
	ini_set('date.timezone', 'Asia/Jakarta');
	$jamPresensi= query("SELECT * FROM jam_presensi ")[0];
	$jam = date('H:i:s');

 ?>
	<h2 class="text-center">Tempelkan Kartu Pegawai</h2>
	<div class="flex">
		<br>
		<img src="<?=BASE_URL.'img/tap.png'?>" alt="">
	</div>
	<?php if ($jam <= $jamPresensi['jam_masuk1'] || $jam <= $jamPresensi['jam_pulang1']): ?>	
	<input type="text" name="kode_rfid" autofocus="" class="center" autocomplete="off" id="absenMasuk" placeholder="masuk">
	<?php endif ?>
	<?php if ($jam >= $jamPresensi['jam_pulang1'] && $jam <= $jamPresensi['jam_pulang2']):  ?>
	<input type="text" name="kode_rfid" autofocus="" class="center" autocomplete="off" id="absenPulang" placeholder="pulang">
	<?php endif ?>
</div>