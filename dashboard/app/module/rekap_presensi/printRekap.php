<?php ob_start(); ?>
<?php 
session_start();
include_once"../../function/function.php";
	$presensi = query("SELECT * FROM presensi INNER JOIN pegawai ON  presensi.nip = pegawai.nip");
 ?>
<html>
	<head>
		<link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../assets/css/argon.min9f1e.css">
	</head>
	<body>
		<div class="table-responsive py-4">
			<table class="table table-flush" id="datatable-basic">
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
		</div>
		
	</body>
</html>
<?php
$html = ob_get_clean();
use Dompdf\Dompdf;
require_once '../../../assets/dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('F4');
$dompdf->render();
$dompdf->stream();
?>