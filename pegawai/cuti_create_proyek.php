<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Buat Pengajuan";
$menuparent = "cuti";
include("layout_top.php");
$now = date('Y-m-d');
$npp = $sess_pegawaiid;
$divisi = $sess_pegawaidiv;
$proyek1 = $sess_proyek1;
$proyek2 = $sess_proyek2;
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
				<form class="form-horizontal" name="cuti" action="cuti_create.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Form Pengajuan Cuti</h3>
						</div>
						<br>
						<div class="form-group">
							<label class="control-label col-sm-3">Proyek</label>
							<div class="col-sm-5">
								<select name="proyek" id="proyek" class="form-control" required>
									<option value="" selected>======== Pilih Proyek ========</option>
									<option value="<?php echo $proyek1 ?>"><?php echo $proyek1 ?></option>
									<option value="<?php echo $proyek2 ?>"><?php echo $proyek2 ?></option>
								</select>
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