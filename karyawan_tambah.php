<?php
include("dist/config/koneksi_proyek.php");
include("sess_check.php");

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
				<form class="form-horizontal" action="karyawan_insert.php" method="POST" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Tambah Data</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">NPP</label>
								<div class="col-sm-4">
									<input type="text" name="npp" onBlur="checkNppAvailability()" class="form-control" placeholder="NPP" required>
									<span id="user-availability-status" style="font-size:12px;"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Nama</label>
								<div class="col-sm-4">
									<input type="text" name="nama" class="form-control" placeholder="Nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Divisi</label>
								<div class="col-sm-4">
									<select name="divisi" id="divisi" class="form-control">
										<option value="" selected>--- Pilih Divisi ---</option>
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
										<option value="km">Knoeledge Manajemen</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jabatan</label>
								<div class="col-sm-4">
									<select name="jabatan" id="jabatan" class="form-control" required>
										<option value="" selected>--- Pilih Jabatan ---</option>
										<option value="staff">Staff</option>
										<option value="kasi">Kasi</option>
										<option value="dmp">DMP</option>
										<option value="mp">MP</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Proyek 1</label>
								<div class="col-sm-4">
									<select name="proyek1" id="proyek1" class="form-control" required>
										<option value="">--- Pilih Proyek ---</option>
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
										<option value="">--- Pilih Proyek ---</option>
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
							<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
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