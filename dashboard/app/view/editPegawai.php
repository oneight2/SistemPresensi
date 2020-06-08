<?php
	if(!isset($_SESSION['status'])){
header("Location: ".BASE_URL."login");
exit;
}
	include_once'app/module/kelola_pegawai/list.php';
	include_once'app/module/kelola_pegawai/actionEdit.php';
	$view_pegawai = query("SELECT * FROM pegawai WHERE nip=$url[1]")[0];
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
						<h3 class="mb-0">Edit Data <?= $view_pegawai['nama_pgw'] ?> </h3>
						<p class="text-sm mb-0">
							Edit data yang tidak sesuai.
						</p>
					</div>
					<?php if (isset($_SESSION['status'])): ?>
					<?php if ($_SESSION['status'] == 'admin'): ?>
					<form action="" method="post">
						<div class="row px-3">
							<div class="col">
								<div class="form-group">
									<label for="nama" class="form-control-label">Nama</label>
									<input class="form-control" type="text" name="nama" id="nama" value="<?= $view_pegawai['nama_pgw'] ?>">
								</div>
								<div class="form-group">
									<label for="nip" class="form-control-label">NIP</label>
									<input class="form-control" type="number" name="nip" id="nip" value="<?= $view_pegawai['nip'] ?>">
								</div>
								<div class="form-group">
									<label for="jenkel" class="form-control-label">Jenis Kelamin</label>
									<select class="form-control" name="jenis_kelamin" >
										<option value="laki-laki">Laki-laki</option>
										<option value="perempuan">Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
									<input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $view_pegawai['tanggal_lahir'] ?>">
								</div>
								<div class="form-group">
									<label for="alamat" class="form-control-label">Alamat</label>
									<textarea class="form-control" type="text" name="alamat" id="alamat">
									<?= $view_pegawai['alamat_pgw'] ?>
									</textarea>
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
								</div>								<div class="form-group">
								<label for="email" class="form-control-label">Email</label>
								<input class="form-control" type="text" name="email" id="email" value="<?= $view_pegawai['email'] ?>">
							</div>
							<div class="form-group">
								<label for="no_telp" class="form-control-label">No Telepon</label>
								<input class="form-control" type="number" name="no_telp" id="no_telp" value="<?= $view_pegawai['no_telp'] ?>">
							</div>
							<div class="form-group">
								<label for="kd_rfid" class="form-control-label">Tap RFID</label>
								<input class="form-control" type="password" name="kd_rfid" id="kd_rfid" value="<?= $view_pegawai['rfid'] ?>">
							</div>
							<button class="btn btn-danger mb-3" name="resetPassword" type="submit" onclick="confirm('Reset Password?')">Reset Password</button>
							<button class="btn btn-info mb-3" name="editPegawai" type="submit">Simpan Perubahan</button>
						</div>
					</div>
				</form>
				<?php endif ?>
				<!-- role pegawai -->
				<?php if ($_SESSION['status'] == 'pegawai'): ?>
				<form action="" method="post">
					<div class="row px-3">
						<div class="col">
							<div class="form-group">
								<label for="nama" class="form-control-label">Nama</label>
								<input class="form-control" type="text" name="nama" id="nama" value="<?= $view_pegawai['nama_pgw'] ?>">
							</div>
							<div class="form-group">
								<label for="nip" class="form-control-label">NIP</label>
								<input class="form-control" type="number" name="nip" id="nip" value="<?= $view_pegawai['nip'] ?>">
							</div>
							<div class="form-group">
								<label for="jenkel" class="form-control-label">Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin" >
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
								<input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $view_pegawai['tanggal_lahir'] ?>">
							</div>
							<div class="form-group">
								<label for="alamat" class="form-control-label">Alamat</label>
								<textarea class="form-control" type="text" name="alamat" id="alamat">
								<?= $view_pegawai['alamat_pgw'] ?>
								</textarea>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="email" class="form-control-label">Email</label>
								<input class="form-control" type="text" name="email" id="email" value="<?= $view_pegawai['email'] ?>">
							</div>
							<div class="form-group">
								<label for="no_telp" class="form-control-label">No Telepon</label>
								<input class="form-control" type="number" name="no_telp" id="no_telp" value="<?= $view_pegawai['no_telp'] ?>">
							</div>
							<div class="form-group">
								<label for="password" class="form-control-label">Password</label>
								<input class="form-control" type="password" name="password" id="password" value="<?= $view_pegawai['password'] ?>">
							</div>
							<button class="btn btn-info mb-3" name="editPegawaiSendiri" type="submit">Simpan Perubahan</button>
						</div>
					</div>
				</form>
				<?php endif ?>
				<?php endif ?>
				
			</div>
		</div>
	</div>
</div>
</div>