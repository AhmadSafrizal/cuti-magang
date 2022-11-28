<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Buat Pengajuan";
$menuparent = "cuti";
include("layout_top.php");
$now = date('Y-m-d');
$npp = $sess_leaderid;
$divisi = $sess_divisi;
$proyek = $_POST['proyek'];
?>
<script type="text/javascript">
	function valid() {
		if (document.cuti.akhir.value < document.cuti.mulai.value) {
			alert("Tanggal akhir harus lebih besar dari tanggal mulai cuti!");
			return false;
		}

		if (document.cuti.mulai.value < document.cuti.now.value) {
			alert("Tanggal mulai cuti tidak valid!");
			return false;
		}

		return true;
	}
</script>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pengajuan Cuti</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" name="cuti" action="cuti_insert.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Form Pengajuan Cuti</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">Proyek</label>
								<div class="col-sm-5">
									<input type="text" name="proyek" class="form-control" value="<?php echo $proyek ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Mulai Cuti</label>
								<div class="col-sm-5">
									<input type="date" name="mulai" class="form-control" required>
									<input type="hidden" name="now" class="form-control" value="<?php echo $now; ?>" required>
									<input type="hidden" name="npp" class="form-control" value="<?php echo $npp; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Akhir Cuti</label>
								<div class="col-sm-5">
									<input type="date" name="akhir" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Cuti Awal (Sebelumnya)</label>
								<div class="col-sm-5">
									<input type="date" name="cuti_awal" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Cuti Akhir (Sebelumnya)</label>
								<div class="col-sm-5">
									<input type="date" name="cuti_akhir" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Pengganti</label>
								<div class="col-sm-5">
									<?php
									$mySqli = "SELECT employee.* FROM employee WHERE (hak_akses='dmp' AND active='Aktif' AND proyek1='$proyek') OR (proyek2='$proyek' AND hak_akses='dmp' AND active='Aktif') ORDER BY nama_emp";
									$myQuery = mysqli_query($conn, $mySqli);
									// $dataDMP = $result['npp'];
									while ($dmpData = mysqli_fetch_array($myQuery)) {
									?>
										<input type="hidden" name="dmp" class="form-control" value="<?php echo $dmpData['npp']; ?>" required>
									<?php } ?>
									<select name="pengganti" id="pengganti" class="form-control" required>
										<option value="" selected>======== Pilih Pengganti ========</option>
										<?php
										$mySql = "SELECT employee.* FROM employee WHERE (hak_akses='pegawai' AND active='Aktif' AND proyek1='$proyek') OR (proyek2='$proyek' AND hak_akses='pegawai' AND active='Aktif') ORDER BY nama_emp";
										$myQry = mysqli_query($conn, $mySql);
										$dataPegawai = $result['npp'];
										while ($pegawaiData = mysqli_fetch_array($myQry)) {
											if ($pegawaiData['npp'] == $dataPegawai) {
												$cek = " selected";
											} else {
												$cek = "";
											}
											echo "<option value='$pegawaiData[npp]' $cek>" . $pegawaiData['nama_emp'] . "</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Pekerjaan Sekarang</label>
								<div class="col-sm-5">
									<textarea name="sekarang" class="form-control" placeholder="Pekerjaan Sekarang..." rows="3"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Pekerjaan Kedepan</label>
								<div class="col-sm-5">
									<textarea name="kedepan" class="form-control" placeholder="Pekerjaan Kedepan..." rows="3"></textarea>
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
<script src="libs/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		tinymce.init({

			selector: "textarea",

			plugins: [

				"advlist autolink lists link image charmap print preview anchor",

				"searchreplace visualblocks code fullscreen",

				"insertdatetime media table contextmenu paste"

			],

			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

		});
	})
</script>

<!-- bottom of file -->
<?php
include("layout_bottom.php");
?>