<?php
	if(!isset($_SESSION['status'])){
header("Location: ".BASE_URL."login");
exit;
}
	include_once'app/module/setting_presensi/list.php';
	include_once'app/module/setting_presensi/action.php';
?>
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
						<h3 class="mb-0">Setting Presensi</h3>
						<p class="text-sm mb-0">
							Halaman ini digunakan untuk mengatur presensi jam masuk dan jam pulang pegawai. <br>
							Apabila ingin merubah jam presensi ubah dalam form input dan klik tombol simpan.
						</p>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="jamMasuk" class="form-control-label">Presensi Jam Masuk</label>
										<div class="row">
											<div class="col">
												<input class="form-control" type="time" name="jamMasuk1" id="jamMasuk" value="<?= $view_jam['jam_masuk1'] ?>">
											</div>
											<div class="col">
												<input class="form-control" type="time" name="jamMasuk2" id="jamMasuk" value="<?= $view_jam['jam_masuk2'] ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="jamPulang" class="form-control-label">Presensi Jam Pulang</label>
										<div class="row">
											<div class="col">
												<input class="form-control" type="time" name="jamPulang1" id="jamPulang"value="<?= $view_jam['jam_pulang1'] ?>">
											</div>
											<div class="col">
												<input class="form-control" type="time" name="jamPulang2" id="jamPulang" value="<?= $view_jam['jam_pulang2'] ?>">
											</div>
										</div>
									</div>
									<button class="btn btn-warning mt-2 " style="float: right" onclick="confirm('Ubah jam presensi?')" name="editJam" >Simpan Jam Presensi</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header">
					<h3 class="mb-0">Setting Keterangan Presensi</h3>
					<p class="text-sm mb-0">
						Halaman ini digunakan untuk mengatur keterangan izin, sakit, mangkir presensi pegawai.
					</p>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="table-responsive py-4">
							<table class="table table-flush" id="datatable-basic">
								<thead class="thead-light">
									<tr>
										<th scope="col">NIP</th>
										<th scope="col">Nama</th>
										<th scope="col">Alamat</th>
										<th scope="col">Email</th>
										<th scope="col">No. Telepon</th>
										<th scope="col">Jabatan</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									
									<?php foreach ($pegawai as $row): ?>
									<tr>
										<td><?= $row['nip'] ?></td>
										<td><?= $row['nama_pgw'] ?></td>
										<td><?= $row['alamat_pgw'] ?></td>
										<td><?= $row['email'] ?></td>
										<td><?= $row['no_telp'] ?></td>
										<td><?= $row['jabatan'] ?></td>
										<td>
											
											<a href="<?= BASE_URL.'editPresensi/'.$row['nip'] ?>" class="btn btn-sm btn-primary" ><i class="fas fa-edit"></i></a>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
		
	</div>
</div>
