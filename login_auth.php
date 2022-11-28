<?php
// memulai session
session_start();
// memanggil file koneksi
include("dist/config/koneksi.php");

// mengecek apakah tombol login sudah di tekan atau belum
if (isset($_POST['login'])) {
	// mengecek apakah username dan password sudah di isi atau belum
	if (empty($_POST['username']) || empty($_POST['password'])) {
		// mengarahkan ke halaman login.php
		header("location: login.php?err=empty");
	} else {
		// membaca nilai variabel username dan password
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$akses = $_POST['akses'];
		// mencegah sql injection
		$username = htmlentities(trim(strip_tags($username)));
		$password = htmlentities(trim(strip_tags($password)));
		// memeriksa username di tabel admin

		if ($akses == "admin") {
			$aks = "admin";
			$sql = "SELECT employee.* FROM employee WHERE hak_akses='" . $aks . "' AND npp='" . $username . "' AND password='" . $password . "'";
			$ress = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($ress);
			$dataku = mysqli_fetch_array($ress);
			// mendaftarkan session jika username di temukan
			if ($rows == 1) {
				// membuat variabel session
				$_SESSION['admin'] = strtolower($dataku['npp']);
				// mengarahkan ke halaman indeks.php
				header("location: index.php?login=success");
			} else {
				header("location: login.php?err=not_found");
			}
		} else if ($akses == "kasi") {
			$aks = "kasi";
			$sql = "SELECT employee.* FROM employee WHERE hak_akses='" . $aks . "' AND npp='" . $username . "' AND password='" . $password . "'";
			$ress = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($ress);
			$dataku = mysqli_fetch_array($ress);
			// mendaftarkan session jika username di temukan
			if ($rows == 1) {
				// membuat variabel session
				$_SESSION['kasi'] = strtolower($dataku['npp']);
				// mengarahkan ke halaman indeks.php
				header("location: kasi/index.php?login=success");
			} else {
				header("location: login.php?err=not_found");
			}
		} else if ($akses == "mp") {
			$aks = "mp";
			$sql = "SELECT employee.* FROM employee WHERE hak_akses='" . $aks . "' AND npp='" . $username . "' AND password='" . $password . "'";
			$ress = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($ress);
			$dataku = mysqli_fetch_array($ress);
			// mendaftarkan session jika username di temukan
			if ($rows == 1) {
				// membuat variabel session
				$_SESSION['mp'] = strtolower($dataku['npp']);
				// mengarahkan ke halaman indeks.php
				header("location: mp/index.php?login=success");
			} else {
				header("location: login.php?err=not_found");
			}
		} else if ($akses == "pegawai") {
			$aks = "pegawai";
			$sql = "SELECT employee.* FROM employee WHERE hak_akses='" . $aks . "' AND npp='" . $username . "' AND password='" . $password . "'";
			$ress = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($ress);
			$dataku = mysqli_fetch_array($ress);
			// mendaftarkan session jika username di temukan
			if ($rows == 1) {
				// membuat variabel session
				$_SESSION['pegawai'] = strtolower($dataku['npp']);
				// mengarahkan ke halaman indeks.php
				header("location: pegawai/index.php?login=success");
			} else {
				header("location: login.php?err=not_found");
			}
		} else {
			$aks = "dmp";
			$sql = "SELECT employee.* FROM employee WHERE hak_akses='" . $aks . "' AND npp='" . $username . "' AND password='" . $password . "'";
			$ress = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($ress);
			$dataku = mysqli_fetch_array($ress);
			// mendaftarkan session jika username di temukan
			if ($rows == 1) {
				// membuat variabel session
				$_SESSION['dmp'] = strtolower($dataku['npp']);
				// mengarahkan ke halaman indeks.php
				header("location: dmp/index.php?login=success");
			} else {
				header("location: login.php?err=not_found");
			}
		}
	}
}
