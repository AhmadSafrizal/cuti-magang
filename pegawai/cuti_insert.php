<?php
include("sess_check.php");

$npp	= $_POST['npp'];
$ajuan = date('Y-m-d');
$mulai	= $_POST['mulai'];
$akhir	= $_POST['akhir'];
$cuti_awal	= $_POST['cuti_awal'];
$cuti_akhir	= $_POST['cuti_akhir'];

$pengganti	= $_POST['pengganti'];
$kasi	= $_POST['kasi'];
$job_sekarang	= $_POST['sekarang'];
$job_kedepan	= $_POST['kedepan'];
$proyek	= $_POST['proyek'];

$start = new DateTime($mulai);
$finish = new DateTime($akhir);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur + 1;

$stt = "Menunggu Approval Kasi";

$id = date('dmYHis');

$pgw = "SELECT employee.* FROM employee WHERE npp='$npp'";
$qpgw = mysqli_query($conn, $pgw);
$ress = mysqli_fetch_array($qpgw);

$pengg = mysqli_query($conn, "SELECT employee.* FROM employee WHERE npp='$kasi'");
$p = mysqli_fetch_array($pengg);

$ganti = $p['email'];

$sql 	= "INSERT INTO cuti (no_cuti, npp, pengganti, tgl_pengajuan, tgl_awal, tgl_akhir,cuti_awal, cuti_akhir, durasi, stt_cuti, job_skrg, job_depan, proyek, kasi) VALUES ('$id','$npp', '$pengganti','$ajuan','$mulai','$akhir','$cuti_awal','$cuti_akhir','$durasi','$stt', '$job_sekarang', '$job_kedepan', '$proyek', '$kasi')";
$query 	= mysqli_query($conn, $sql);
if ($query) {
	echo "<script type='text/javascript'>
				alert('Pengajuan cuti berhasil!'); 
				document.location = 'cuti_waitapp.php'; 
				</script>";

	$from = "admin@wikarekonbatulicin.com";
	$to = $ganti;
	$subject = "Wika Rekon Batulicin";
	$message = "Ada permohonan cuti yang menunggu konfirmasi, mohon segera memberika tanggapan!";
	$headers = "From:" . $from;
	mail($to, $subject, $message, $headers);
} else {
	echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.');
				document.location = 'cuti_waitapp.php'; 
			</script>";
}
