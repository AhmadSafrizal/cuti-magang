<?php
include("sess_check.php");

$no = $_POST['no'];
$hak = $_POST['hak'];
$aksi = $_POST['aksi'];
$hrd = $_POST['hrd'];
$mp = $_POST['mp'];
$reject = $_POST['reject'];
$stt = "";
$null = 0;

$pgw = "SELECT * FROM cuti WHERE no_cuti='$no'";
$qpgw = mysqli_query($conn, $pgw);
$ress = mysqli_fetch_array($qpgw);

$npp = $ress['npp'];

$peng = mysqli_query($conn, "SELECT employee.* FROM employee WHERE npp='$npp'");
$p = mysqli_fetch_array($peng);
$pengirim = $p['email'];

$hr = mysqli_query($conn, "SELECT employee.* FROM employee WHERE npp='$hrd'");
$d = mysqli_fetch_array($hr);
$admin = $d['email'];

$manager = mysqli_query($conn, "SELECT employee.* FROM employee WHERE npp='$mp'");
$m = mysqli_fetch_array($manager);
$mng = $m['email'];

if ($hak == "pegawai") {
	if ($aksi == "2") {
		$stt = "Rejected";
		$sql = "UPDATE cuti SET stt_cuti='" . $stt . "', lead_app='" . $null . "', ket_reject='" . $reject . "' WHERE no_cuti='" . $no . "'";
		$ress = mysqli_query($conn, $sql);

		$from = "admin@wikarekonbatulicin.com";
		$to = $pengirim;
		$subject = "Wika Rekon Batulicin";
		$message = "Maaf permintaan cuti anda ditolak!";
		$headers = "From:" . $from;
		mail($to, $subject, $message, $headers);

		header("location: approval_cuti.php?act=update&msg=success");
	} else if ($aksi == "1") {
		$stt = "Menunggu Approval HRD";
		$num = 1;
		$sql = "UPDATE cuti SET stt_cuti='" . $stt . "', hrd='" . $hrd . "', spv_app='" . $num . "' WHERE no_cuti='" . $no . "'";
		$ress = mysqli_query($conn, $sql);

		$from = "admin@wikarekonbatulicin.com";
		$to = $admin;
		$subject = "Wika Rekon Batulicin";
		$message = "Ada permohonan cuti yang menunggu konfirmasi, mohon segera memberika tanggapan!";
		$headers = "From:" . $from;
		mail($to, $subject, $message, $headers);

		header("location: approval_cuti.php?act=update&msg=success");
	} else {
		header("location: approval_cuti.php?act=gagal&msg=gagal");
	}
} else {
	if ($aksi == "2") {
		$stt = "Rejected";
		$sql = "UPDATE cuti SET stt_cuti='" . $stt . "', lead_app='" . $null . "', ket_reject='" . $reject . "' WHERE no_cuti='" . $no . "'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_cuti.php?act=update&msg=success");
	} else if ($aksi == "1") {
		$stt = "Menunggu Approval MP";
		$num = 1;
		$sql = "UPDATE cuti SET stt_cuti='" . $stt . "', mp='" . $mp . "', spv_app='" . $num . "' WHERE no_cuti='" . $no . "'";
		$ress = mysqli_query($conn, $sql);

		$from = "admin@wikarekonbatulicin.com";
		$to = $mng;
		$subject = "Wika Rekon Batulicin";
		$message = "Ada permohonan cuti yang menunggu konfirmasi, mohon segera memberika tanggapan!";
		$headers = "From:" . $from;
		mail($to, $subject, $message, $headers);

		header("location: approval_cuti.php?act=update&msg=success");
	} else {
		header("location: approval_cuti.php?act=gagal&msg=gagal");
	}
}
