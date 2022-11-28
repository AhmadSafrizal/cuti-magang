<?php
include("sess_check.php");

$id = $sess_pegawaiid;
$npp = $_POST['npp'];
$nama = $_POST['nama'];
$divisi = $_POST['divisi'];
$jabatan = $_POST['jabatan'];
$proyek1 = $_POST['proyek1'];
$proyek2 = $_POST['proyek2'];
$aktif = "Aktif";

$pass = md5($npp);

$sqlcek = "SELECT employee.* FROM employee WHERE npp='$npp'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if ($rowscek < 1) {
	if ($jabatan == "staff") {
		$sql = "INSERT INTO employee(npp,nama_emp,divisi,jabatan,hak_akses,password,active,proyek1,proyek2) VALUES('$npp','$nama','$divisi','$jabatan','pegawai','$pass','$aktif','$proyek1','$proyek2')";
		$ress = mysqli_query($conn, $sql);
	} else if ($jabatan == "kasi") {
		$sql = "INSERT INTO employee(npp,nama_emp,divisi,jabatan,hak_akses,password,active,proyek1,proyek2) VALUES('$npp','$nama','$divisi','$jabatan','kasi','$pass','$aktif','$proyek1','$proyek2')";
		$ress = mysqli_query($conn, $sql);
	} else if ($jabatan == "dmp") {
		$sql = "INSERT INTO employee(npp,nama_emp,divisi,jabatan,hak_akses,password,active,proyek1,proyek2) VALUES('$npp','$nama','$divisi','$jabatan','dmp','$pass','$aktif','$proyek1','$proyek2')";
		$ress = mysqli_query($conn, $sql);
	} else if ($jabatan == "mp") {
		$sql = "INSERT INTO employee(npp,nama_emp,divisi,jabatan,hak_akses,password,active,proyek1,proyek2) VALUES('$npp','$nama','$divisi','$jabatan','mp','$pass','$aktif','$proyek1','$proyek2')";
		$ress = mysqli_query($conn, $sql);
	} else {
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'karyawan_tambah.php'; </script>";
	}


	if ($ress) {
		echo "<script>alert('Tambah Karyawan Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'karyawan.php'; </script>";
	} else {
		echo ("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'karyawan_tambah.php'; </script>";
	}
} else {
	header("location: karyawan_tambah.php?act=add&msg=double");
}
