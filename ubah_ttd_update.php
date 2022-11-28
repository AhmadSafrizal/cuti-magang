<?php
include("sess_check.php");

$rand = rand(100000, 999999);

$npp = $_POST['npp'];
$foto = substr($_FILES["foto"]["name"], -5);
$newfoto = "ttd" . $rand . $npp . $foto;
$ft = mysqli_query($conn, "SELECT employee.* FROM employee WHERE npp='$npp'");
$l = mysqli_fetch_assoc($ft);
$fotolama = $l['ttd'];

$sql = "UPDATE employee SET ttd='" . $newfoto . "' WHERE npp='" . $npp . "'";
$ress = mysqli_query($conn, $sql);

if ($fotolama == null) {
	if ($ress) {
		move_uploaded_file($_FILES["foto"]["tmp_name"], "foto/ttd/" . $newfoto);
		echo "<script>alert('Ubah Tanda Tangan Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'ubah_ttd.php'; </script>";
	} else {
		echo ("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'ubah_ttd.php'; </script>";
	}
} else {
	if ($ress) {
		unlink("../foto/ttd/" . $fotolama);
		move_uploaded_file($_FILES["foto"]["tmp_name"], "foto/ttd/" . $newfoto);
		echo "<script>alert('Ubah Tanda Tangan Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'ubah_ttd.php'; </script>";
	} else {
		echo ("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'ubah_ttd.php'; </script>";
	}
}
