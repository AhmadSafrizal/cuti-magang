<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$npplama = $_POST['npplama'];
	$npp = $_POST['npp'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$nikah = $_POST['nikah'];
	$telp = $_POST['telp'];
	$email = $_POST['email'];
	$divisi = $_POST['divisi'];
	$jabatan = $_POST['jabatan'];
	$alamat = $_POST['alamat'];
	$aktif = $_POST['aktif'];
	$proyek1 = $_POST['proyek1'];
	$proyek2 = $_POST['proyek2'];

	$password = $_POST['password'];
	$pass = md5($password);

	if ($jabatan == "staff") {
		$akses = "pegawai";
	} else if ($jabatan == "kasi") {
		$akses = "kasi";
	} else if ($jabatan == "dmp") {
		$akses = "dmp";
	} else {
		$akses = "mp";
	}

	if ($npp != "") {
		$sqlcek = "SELECT employee.* FROM employee WHERE npp='$npp'";
		$res = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($res);
		if ($rows < 1) {
			if ($password != "") {
				$sql = "UPDATE employee SET npp='" . $npp . "', nama_emp='" . $nama . "', jk_emp='" . $jk . "', status_nikah='" . $nikah . "', telp_emp='" . $telp . "', email='" . $email . "', divisi='" . $divisi . "', jabatan='" . $jabatan . "', alamat='" . $alamat . "', hak_akses='" . $akses . "', password='" . $pass . "', active='" . $aktif . "', proyek1='" . $proyek1 . "', proyek2='" . $proyek2 . "' WHERE npp='" . $npplama . "'";
				$ress = mysqli_query($conn, $sql);
				header("location: karyawan.php?act=update&msg=success");
			} else {
				$sql = "UPDATE employee SET npp='" . $npp . "', nama_emp='" . $nama . "', jk_emp='" . $jk . "', status_nikah='" . $nikah . "', telp_emp='" . $telp . "', email='" . $email . "', divisi='" . $divisi . "', jabatan='" . $jabatan . "', alamat='" . $alamat . "', hak_akses='" . $akses . "', active='" . $aktif . "', proyek1='" . $proyek1 . "', proyek2='" . $proyek2 . "' WHERE npp='" . $npplama . "'";
				$ress = mysqli_query($conn, $sql);
				header("location: karyawan.php?act=update&msg=success");
			}
		} else {
			header("location: karyawan_edit.php?npp=$npplama&act=add&msg=double");
		}
	} else {
		if ($password != "") {
			$sql = "UPDATE employee SET nama_emp='" . $nama . "', jk_emp='" . $jk . "', status_nikah='" . $nikah . "', telp_emp='" . $telp . "', email='" . $email . "', divisi='" . $divisi . "', jabatan='" . $jabatan . "', alamat='" . $alamat . "', hak_akses='" . $akses . "', password='" . $pass . "', active='" . $aktif . "', proyek1='" . $proyek1 . "', proyek2='" . $proyek2 . "' WHERE npp='" . $npplama . "'";
			$ress = mysqli_query($conn, $sql);
			header("location: karyawan.php?act=update&msg=success");
		} else {
			$sql = "UPDATE employee SET nama_emp='" . $nama . "', jk_emp='" . $jk . "', status_nikah='" . $nikah . "', telp_emp='" . $telp . "', email='" . $email . "', divisi='" . $divisi . "', jabatan='" . $jabatan . "', alamat='" . $alamat . "', hak_akses='" . $akses . "', active='" . $aktif . "', proyek1='" . $proyek1 . "', proyek2='" . $proyek2 . "' WHERE npp='" . $npplama . "'";
			$ress = mysqli_query($conn, $sql);
			header("location: karyawan.php?act=update&msg=success");
		}
	}
}
