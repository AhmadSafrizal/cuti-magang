<?php
include("sess_check.php");

// query database mencari data pengguna
$sql = "SELECT employee.* FROM employee WHERE npp='" . $sess_pegawaiid . "'";
$ress = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($ress);

// deskripsi halaman
$pagedesc = "Pengaturan";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pengaturan Akun</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" action="akun_aksi.php" method="POST">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Profil</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">ID</label>
								<div class="col-sm-5">
									<input type="text" name="id" value="<?php echo $data['npp'] ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama</label>
								<div class="col-sm-5">
									<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_emp'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jenis Kelamin</label>
								<div class="col-sm-5">
									<select name="kelamin" id="kelamin" class="form-control" required>
										<?php
										if ($data['jk_emp'] == "Laki-Laki") {
										?>
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										<?php
										} else if ($data['jk_emp'] == "Perempuan") {
										?>
											<option value="Perempuan">Perempuan</option>
											<option value="Laki-Laki">Laki-Laki</option>
										<?php
										} else {
										?>
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Status Perkawinan</label>
								<div class="col-sm-5">
									<select name="status" id="status" class="form-control" required>
										<?php
										if ($data['status_nikah'] == "Kawin") {
										?>
											<option value="Kawin">Kawin</option>
											<option value="Belum Kawin">Belum Kawin</option>
										<?php
										} else if ($data['status_nikah'] == "Belum Kawin") {
										?>
											<option value="Belum Kawin">Belum Kawin</option>
											<option value="Kawin">Kawin</option>
										<?php
										} else {
										?>
											<option value="Kawin">Kawin</option>
											<option value="Belum Kawin">Belum Kawin</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">No Telepon</label>
								<div class="col-sm-5">
									<input type="text" name="telp" class="form-control" value="<?php echo $data['telp_emp'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Email</label>
								<div class="col-sm-5">
									<input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alamat</label>
								<div class="col-sm-5">
									<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat'] ?>" required>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" name="perbarui" class="btn btn-warning">Simpan Perubahan</button>
						</div>
					</div><!-- /.panel -->
				</form>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
include("layout_bottom.php");
?>