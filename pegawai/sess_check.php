<?php
// memulai session
session_start();
// membaca nilai variabel session 
$chk_sess = $_SESSION['pegawai'];
// memanggil file koneksi
include("dist/config/koneksi.php");
include("dist/config/library.php");
// mengambil data pengguna dari tabel pengguna
$sql_sess = "SELECT employee.* FROM employee WHERE npp='" . $chk_sess . "'";
$ress_sess = mysqli_query($conn, $sql_sess);
$row_sess = mysqli_fetch_array($ress_sess);
// menyimpan id_pengguna yang sedang login
$sess_pegawaiid = $row_sess['npp'];
$sess_pegawainame = $row_sess['nama_emp'];
$sess_pegawaidiv = $row_sess['divisi'];
$sess_proyek1 = $row_sess['proyek1'];
$sess_proyek2 = $row_sess['proyek2'];
// mengarahkan ke halaman login.php apabila session belum terdaftar
if (!isset($chk_sess)) {
	header("location: ../login.php?login=false");
}
