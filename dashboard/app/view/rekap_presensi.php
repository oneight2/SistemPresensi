<?php
$no=1;
	if(!isset($_SESSION['status'])){
header("Location: ".BASE_URL."login");
exit;
}
	include_once'app/module/rekap_presensi/list.php';
	include_once'app/module/rekap_presensi/action.php';
?>
<?php if (isset($_SESSION['status'])): ?>
	

<div class="main-content">
	<div class="header bg-primary pb-6">
		<div class="container-fluid">
			<div class="header-body">
				<div class="row align-items-center pt-6 pb-3">
					<div class="col-lg-6 col-7">
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid mt--6">
		<!-- Table -->
		<div class="row">
			<div class="col">
				<div class="card">
					<!-- Card header -->
					<div class="card-header">
						<h3 class="mb-0">Rekap Presensi</h3>
						<p class="text-sm mb-0">
							Halaman ini digunakan untuk melihat rekapan presensi pegawai. <br>
						</p>
					</div>
					<div class="card-body">
						<a class="btn btn-success" href="app/module/rekap_presensi/exportExcel.php">Export EXCEL</a>
						<a class="btn btn-warning" href="<?= BASE_URL.'app/module/rekap_presensi/printRekap.php' ?>">Export PDF</a>
						<?php if ($_SESSION['status'] == 'admin'): ?>
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
						<?php endif ?>
						<!-- tabel role pegawai -->
						<?php if ($_SESSION['status'] == 'pegawai'): ?>
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
									
									<?php foreach ($presensi_pegawai as $row): ?>
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
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<?php endif ?>