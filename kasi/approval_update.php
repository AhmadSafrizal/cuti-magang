<?php
include("sess_check.php");

$no = $_POST['no'];
$aksi = $_POST['aksi'];
$dmp = $_POST['dmp'];
$reject = $_POST['reject'];
$stt = "";

$pgw = "SELECT * FROM cuti WHERE no_cuti='$no'";
$qpgw = mysqli_query($conn, $pgw);
$ress = mysqli_fetch_array($qpgw);

$npp = $ress['npp'];

$peng = mysqli_query($conn, "SELECT employee.* FROM employee WHERE npp='$npp'");
$p = mysqli_fetch_array($peng);
$pengirim = $p['email'];

$de = mysqli_query($conn, "SELECT employee.* FROM employee WHERE npp='$dmp'");
$d = mysqli_fetch_array($de);
$spv = $d['email'];

if ($aksi == "2") {
	$stt = "Rejected";
	$sql = "UPDATE cuti SET stt_cuti='" . $stt . "', ket_reject='" . $reject . "' WHERE no_cuti='" . $no . "'";
	$ress = mysqli_query($conn, $sql);

	$from = "admin@wikarekonbatulicin.com";
	$to = $pengirim;
	$subject = "Wika Rekon Batulicin";
	$message = "Maaf permintaan cuti anda ditolak!";
	$headers = "From:" . $from;
	mail($to, $subject, $message, $headers);

	header("location: approval_cuti.php?act=update&msg=success");
} else if ($aksi == "1") {
	$stt = "Menunggu Approval DMP";
	$num = 1;
	$sql = "UPDATE cuti SET stt_cuti='" . $stt . "', dmp='" . $dmp . "', lead_app='" . $num . "' WHERE no_cuti='" . $no . "'";
	$ress = mysqli_query($conn, $sql);

	$from = "admin@wikarekonbatulicin.com";
	$to = $spv;
	$subject = "Wika Rekon Batulicin";
	$message = "Ada permohonan cuti yang menunggu konfirmasi, mohon segera memberika tanggapan!";
	$headers = "From:" . $from;
	mail($to, $subject, $message, $headers);

	header("location: approval_cuti.php?act=update&msg=success");
} else {
	header("location: approval_cuti.php?act=gagal&msg=gagal");
}
