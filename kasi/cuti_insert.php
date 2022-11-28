<?php
include("sess_check.php");

$npp	= $_POST['npp'];
$ajuan = date('Y-m-d');
$mulai	= $_POST['mulai'];
$akhir	= $_POST['akhir'];
$cuti_awal	= $_POST['cuti_awal'];
$cuti_akhir	= $_POST['cuti_akhir'];
$pengganti	= $_POST['pengganti'];
$dmp	= $_POST['dmp'];
$job_sekarang	= $_POST['sekarang'];
$job_kedepan	= $_POST['kedepan'];
$proyek	= $_POST['proyek'];

$start = new DateTime($mulai);
$finish = new DateTime($akhir);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur + 1;

$stt = "Menunggu Approval DMP";

$id = date('dmYHis');

$pgw = "SELECT employee.* FROM employee WHERE npp='$npp'";
$qpgw = mysqli_query($conn, $pgw);
$ress = mysqli_fetch_array($qpgw);

$de = "SELECT employee.* FROM employee WHERE npp='$dmp'";
$d = mysqli_query($conn, $de);
$dmp = mysqli_fetch_array($d);

$dmp_mail = $dmp['email'];

$sql 	= "INSERT INTO cuti (no_cuti, npp, pengganti, tgl_pengajuan, tgl_awal, tgl_akhir,cuti_awal, cuti_akhir, durasi, stt_cuti, job_skrg, job_depan, proyek, dmp) VALUES ('$id','$npp', '$pengganti','$ajuan','$mulai','$akhir','$cuti_awal','$cuti_akhir','$durasi','$stt', '$job_sekarang', '$job_kedepan', '$proyek', '$dmp')";
$query 	= mysqli_query($conn, $sql);
if ($query) {

	$from = "admin@wikarekonbatulicin.com";
	$to = $dmp_mail;
	$subject = "Wika Rekon Batulicin";
	$message = "Ada permohonan cuti yang menunggu konfirmasi, mohon segera memberika tanggapan!";
	$headers = "From:" . $from;
	mail($to, $subject, $message, $headers);

	echo "<script type='text/javascript'>
				alert('Pengajuan cuti berhasil!'); 
				document.location = 'cuti_waitapp.php'; 
				</script>";
} else {
	echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.');
				document.location = 'cuti_waitapp.php';
			</script>";
}
