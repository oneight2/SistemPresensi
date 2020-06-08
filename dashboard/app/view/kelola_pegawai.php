<?php
	if(!isset($_SESSION['status'])){
header("Location: ".BASE_URL."login");
exit;
}
	include_once'app/module/kelola_pegawai/list.php';
	include_once'app/module/kelola_pegawai/action.php';
?>
<div class="main-content">
	<div class="header bg-primary pb-6">
		<div class="container-fluid">
			<div class="header-body">
				<div class="row align-items-center pt-6 pb-3">
					<div class="col-lg-6 col-7">
						<button class="btn btn-default" data-toggle="modal" data-target="#TambahPegawai">Tambah Pegawai</button>
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
						<h3 class="mb-0">Kelola Data Pegawai</h3>
						<p class="text-sm mb-0">
							Halaman ini mengatur data pegawai.
						</p>
					</div>
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
										<a href="<?= BASE_URL.'editPegawai/'.$row['nip'] ?>" class="btn btn-sm btn-primary" ><i class="fas fa-edit"></i></a>
										<a href="<?= BASE_URL.'kelola_pegawai/'.$row['nip'] ?>" onclick=" return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" ><i class="fas fa-trash"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<!-- modal tambah pegawai -->
<div class="modal fade" id="TambahPegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<input class="form-control" type="text" name="nama" id="nama" required="">
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
								<input class="form-control" required="" type="date" name="tgl_lahir" id="tgl_lahir">
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
									<option value="Analis">Analist</option>
									<option value="Programmer">Programmer</option>
									<option value="Administrasi">Administrasi</option>
									<option value="Marketing">Marketing</option>

								</select>
							</div>
							<div class="form-group">
								<label for="email" class="form-control-label">Email</label>
								<input class="form-control" type="text" name="email" id="email" required="">
							</div>
							<div class="form-group">
								<label for="no_telp" class="form-control-label">No Telepon</label>
								<input class="form-control" type="number" name="no_telp" id="no_telp">
							</div>
							<div class="form-group">
								<label for="kd_rfid" class="form-control-label">Tap RFID</label>
								<input class="form-control" type="password" name="kd_rfid" id="kd_rfid" required="">
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