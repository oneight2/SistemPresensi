<?php

if (!isset($_SESSION['status'])) {
	header("Location: " . BASE_URL . "login");
	exit;
}
$no = 1;
$tanggal = date('Y-m-d');
if ($_SESSION['status'] == 'pegawai') {
$pegawai = query("SELECT * FROM pegawai WHERE nip = $_SESSION[id_user]")[0];
$presensi = query("SELECT * FROM presensi INNER JOIN pegawai ON  presensi.nip = pegawai.nip WHERE tanggal = '$tanggal' AND presensi.nip = '$_SESSION[id_user]'");
}
if ($_SESSION['status'] == 'admin') {
$admin = query("SELECT * FROM admin WHERE id = $_SESSION[id_user]")[0];
$presensi = query("SELECT * FROM presensi INNER JOIN pegawai ON  presensi.nip = pegawai.nip WHERE tanggal = '$tanggal' ");
}

?>


	<!-- Header -->
	<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(http://localhost/kp/dashboard/assets/img/brand/blue.png); background-size: cover; background-position: center top;">
		<!-- Mask -->
		<span class="mask bg-gradient-default opacity-8"></span>
		<!-- Header container -->
		<div class="container-fluid d-flex align-items-center">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h1 class="display-2 text-white">
					Hello, <?= $_SESSION['nama_user'] ?>
					</h1>
					<p class="text-white mt-0 mb-5">Selamat datang di Sistem Presensi PT. Inovindo Digital Media. <br> Sukses Berkah Berlimpah!</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Page content -->
	<div class="container-fluid mt--7">
		<div class="row">
			<!-- role pegawai -->
			<?php if ($_SESSION['status'] == 'pegawai'): ?>
			<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
				<div class="card card-profile shadow">
					<div class="row justify-content-center">
						<div class="col-lg-3 order-lg-2">
							<div class="card-profile-image">
								<a href="#">
									<?php if ($pegawai['foto'] == NULL): ?>
									<img src="<?= BASE_URL.'/assets/img/profil/user_icon.png' ?>" class="rounded-circle">
									<?php endif ?>
									<?php if ($pegawai['foto'] != NULL): ?>
									<img src="<?= BASE_URL.'/assets/img/profil/'.$pegawai['foto'] ?>" class="rounded-circle">
									<?php endif ?>
								</a>
							</div>
						</div>
					</div>
					<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
						<div class="d-flex justify-content-between">
							<button class="btn btn-sm btn-info mr-4" data-toggle="modal" data-target="#ubahFoto">ubah foto</button>
						</div>
					</div>
					<div class="card-body pt-0 pt-md-4">
						
						<div class="text-center pt-5">
							<h3>
							<?= $pegawai['nama_pgw'] ?><span class="font-weight-light"></span>
							</h3>
							<div class="h5 font-weight-300">
								<i class="ni location_pin mr-2"></i><?= $pegawai['alamat_pgw'] ?>
							</div>
							<div class="h5 mt-4">
								<i class="ni business_briefcase-24 mr-2"></i><?= $pegawai['jabatan'] ?>
							</div>
							<div>
								<i class="ni education_hat mr-2"></i>PT. Inovido Digital Media
							</div>
							<hr class="my-4" />
							<p><b>Email :</b> <?= $pegawai['email'] ?></p>
							<a href="<?= BASE_URL.'editPegawai/'.$pegawai['nip'] ?>">Edit Profil</a>
						</div>
					</div>
				</div>
			</div>
			<?php endif ?>
			<!-- role admin -->
			<?php if ($_SESSION['status'] == 'admin'): ?>
			<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
				<div class="card card-profile shadow">
					<div class="row justify-content-center">
						<div class="col-lg-3 order-lg-2">
							<div class="card-profile-image">
								<a href="#">
									<?php if ($admin['foto'] == NULL): ?>
									<img src="<?= BASE_URL.'/assets/img/profil/user_icon.png' ?>" class="rounded-circle">
									<?php endif ?>
									<?php if ($admin['foto'] != NULL): ?>
									<img src="<?= BASE_URL.'/assets/img/profil/'.$admin['foto'] ?>" class="rounded-circle">
									<?php endif ?>
								</a>
							</div>
						</div>
					</div>
					<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
						<div class="d-flex justify-content-between">
							<a href="#" class="btn btn-sm btn-info mr-4">Ubah Foto</a>
						</div>
					</div>
					<div class="card-body pt-0 pt-md-4">
						
						<div class="text-center pt-5">
							<h3>
							<?= $admin['nama_admin'] ?><span class="font-weight-light"></span>
							</h3>
							
							<div>
								<i class="ni education_hat mr-2"></i>PT. Inovido Digital Media
							</div>
							<hr class="my-4" />
							<a href="<?= BASE_URL.'editPegawai/'.$admin['id'] ?>">Edit Profil</a>
						</div>
					</div>
				</div>
			</div>
			<?php endif ?>
			<div class="col-xl-8 order-xl-1">
				<div class="card bg-secondary shadow">
					<div class="card-header bg-white border-0">
						<div class="row align-items-center">
							<div class="col-8">
								<h3 class="mb-0">Presensi Hari ini</h3>
							</div>
						</div>
					</div>
					<div class="card-body">
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
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<!-- modal -->
<div class="modal fade" id="ubahFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form action="" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="nama" class="form-control-label">Nama</label>
								<input class="form-control" type="text" name="nama" id="nama">
							</div>
							<div class="form-group">
								<label for="nip" class="form-control-label">NIP</label>
								<input class="form-control" type="number" name="nip" id="nip">
							</div>
							<div class="form-group">
								<label for="jenkel" class="form-control-label">Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin">
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
								<input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir">
							</div>
							<div class="form-group">
								<label for="alamat" class="form-control-label">Alamat</label>
								<textarea class="form-control" type="text" name="alamat" id="alamat"></textarea>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="jabatan" class="form-control-label">Jabatan</label>
								<select class="form-control" name="jabatan">
									<option value="Project Manajer">Project Manajer</option>
									<option value="Analist">Analist</option>
									<option value="programmer">Programmer</option>
									<option value="Administrasi">Administrasi</option>
									<option value="Marketing">Marketing</option>

								</select>
							</div>
							<div class="form-group">
								<label for="email" class="form-control-label">Email</label>
								<input class="form-control" type="text" name="email" id="email">
							</div>
							<div class="form-group">
								<label for="no_telp" class="form-control-label">No Telepon</label>
								<input class="form-control" type="number" name="no_telp" id="no_telp">
							</div>
							<div class="form-group">
								<label for="kd_rfid" class="form-control-label">Tap RFID</label>
								<input class="form-control" type="password" name="kd_rfid" id="kd_rfid">
							</div>
						</div>
					</div>
					
					
					
				</div>
				<div class="modal-footer">
					<button type="submit" name="tambahPegawai" class="btn btn-primary" >Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>