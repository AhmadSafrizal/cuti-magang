<?php
include("dist/config/koneksi_proyek.php");
include("sess_check.php");

if (isset($_GET['npp'])) {
	$sql = "SELECT employee.* FROM employee WHERE npp='" . $_GET['npp'] . "'";
	$ress = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($ress);
}
// deskripsi halaman
$pagedesc = "Data Karyawan";
$menuparent = "master";
include("layout_top.php");
?>
<script type="text/javascript">
	function checkNppAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_nppavailability.php",
			data: 'npp=' + $("#npp").val(),
			type: "POST",
			success: function(data) {
				$("#user-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}
</script>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Karyawan</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" action="karyawan_update.php" method="POST" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Edit Data</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">NPP</label>
								<div class="col-sm-4">
									<input type="text" name="npplama" class="form-control" placeholder="NPP" value="<?php echo $data['npp'] ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">NPP Baru (Abaikan jika tidak diubah)</label>
								<div class="col-sm-4">
									<input type="text" name="npp" onBlur="checkNppAvailability()" class="form-control" placeholder="NPP Baru (Abaikan Jika Tidak Ada Perubahan!)">
									<span id="user-availability-status" style="font-size:12px;"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama</label>
								<div class="col-sm-4">
									<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama_emp'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jenis Kelamin</label>
								<div class="col-sm-3">
									<select name="jk" id="jk" class="form-control">
										<option value="<?php echo $data['jk_emp'] ?>" selected><?php echo $data['jk_emp'] ?></option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Status Perkawinan</label>
								<div class="col-sm-3">
									<select name="nikah" id="nikah" class="form-control">
										<option value="<?php echo $data['status_nikah'] ?>" selected><?php echo $data['status_nikah'] ?></option>
										<option value="Kawin">Kawin</option>
										<option value="Belum-Kawin">Belum Kawin</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Telepon</label>
								<div class="col-sm-4">
									<input type="number" name="telp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['telp_emp'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Email</label>
								<div class="col-sm-4">
									<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $data['email'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Divisi</label>
								<div class="col-sm-4">
									<select name="divisi" id="divisi" class="form-control">
										<option value="<?php echo $data['divisi']; ?>" selected><?php echo $data['divisi'] ?></option>
										<option value="adkon">Adkon & Legal</option>
										<option value="engineering">Engineering</option>
										<option value="komersial">Komersial</option>
										<option value="keuangan">Keuangan</option>
										<option value="qc">QA/QC</option>
										<option value="she">SHE</option>
										<option value="produksi">Produksi</option>
										<option value="scm">SCM</option>
										<option value="masrisk">Masrisk</option>
										<option value="dokumentasi">Dokumentasi</option>
										<option value="km">Knowledge Manajemen</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jabatan</label>
								<div class="col-sm-3">
									<select name="jabatan" id="jabatan" class="form-control">
										<option value="<?php echo $data['jabatan'] ?>" selected><?php echo $data['jabatan'] ?></option>
										<option value="staff">Staff</option>
										<option value="kasi">Kasi</option>
										<option value="dmp">DMP</option>
										<option value="mp">MP</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alamat</label>
								<div class="col-sm-4">
									<textarea name="alamat" class="form-control" placeholder="Alamat" rows="3"><?php echo $data['alamat'] ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Aktif</label>
								<div class="col-sm-3">
									<select name="aktif" id="aktif" class="form-control">
										<option value="<?php echo $data['active']; ?>" selected><?php echo $data['active']; ?></option>
										<option value="Aktif">Aktif</option>
										<option value="Tidak Aktif">Tidak Aktif</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Password (Abaikan Jika Tidak Diubah)</label>
								<div class="col-sm-4">
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Proyek 1</label>
								<div class="col-sm-4">
									<select name="proyek1" id="proyek1" class="form-control">
										<option value="<?php echo $data['proyek1'] ?>"><?php echo $data['proyek1'] ?></option>
										<?php
										$proyek = mysqli_query($kon, "SELECT * FROM proyek WHERE status='Tampil' ORDER BY id ASC");
										while ($pro = mysqli_fetch_array($proyek)) {
										?>
											<option value="<?php echo strtolower($pro['lokasi']) ?>"><?php echo $pro['lokasi'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Proyek 2</label>
								<div class="col-sm-4">
									<select name="proyek2" id="proyek2" class="form-control">
										<option value="<?php echo $data['proyek2'] ?>"><?php echo $data['proyek2'] ?></option>
										<?php
										$proyek = mysqli_query($kon, "SELECT * FROM proyek WHERE status='Tampil' ORDER BY id ASC");
										while ($pro = mysqli_fetch_array($proyek)) {
										?>
											<option value="<?php echo strtolower($pro['lokasi']) ?>"><?php echo $pro['lokasi'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" name="perbarui" class="btn btn-success">Update</button>
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