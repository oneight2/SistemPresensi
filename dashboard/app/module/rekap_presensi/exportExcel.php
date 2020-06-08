<?php 
session_start();
  include_once"../../function/function.php";
  if ($_SESSION['status'] == 'admin') {
	$presensi = query("SELECT * FROM presensi INNER JOIN pegawai ON  presensi.nip = pegawai.nip");
  }elseif ($_SESSION['status'] == 'pegawai') {
  	$presensi = query("SELECT * FROM presensi INNER JOIN pegawai ON  presensi.nip = pegawai.nip WHERE pegawai.nip = $_SESSION[id_user]");
  }
  header("Content-type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=Data_Presensi".date('d-m-Y').".xls");
  header("Pragma: no-cache");
  header("Expires:0");
  $no = 1;

 ?>

 <table class="table table-flush" border="1"  width="100%" cellspacing="0" style="text-align: center" id="datatable-basic">
				<thead class="thead-light">
					<tr>
						<th scope="col">No</th>
						<th scope="col">NIP</th>
						<th scope="col">Nama</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Presensi Masuk</th>
						<th scope="col">Presensi Pulang</th>
						<th scope="col">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach ($presensi as $row): ?>
					<tr>
						<td><?= $no++?></td>
						<td><?= $row['nip'] ?></td>
						<td><?= $row['nama_pgw'] ?></td>
						<td><?= $row['tanggal'] ?></td>
						<td><?= $row['jam_masuk'] ?></td>
						<td><?= $row['jam_pulang'] ?></td>
						<td>
							<?php
							if ($row['keterangan'] == 'Hadir') {
								echo "<b class='text-green'>".$row['keterangan']."</b>";
							}elseif($row['keterangan'] == 'Telat'){
								echo "<b class='text-orange'>".$row['keterangan']."</b>";
							}elseif($row['keterangan'] == 'Sakit'){
								echo "<b class='text-yellow'>".$row['keterangan']."</b>";
							}elseif($row['keterangan'] == 'Izin'){
								echo "<b class='text-blue'>".$row['keterangan']."</b>";
							}elseif($row['keterangan'] == 'Mangkir'){
								echo "<b class='text-red'>".$row['keterangan']."</b>";
							}
							?>
							
						</td>
						
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>