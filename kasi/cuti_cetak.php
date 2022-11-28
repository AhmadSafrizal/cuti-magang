<?php
include("sess_check.php");
include("dist/config/koneksi_proyek.php");

include("dist/function/format_tanggal.php");
// include("dist/function/format_rupiah.php");
$no 	 = $_GET['no'];
$sql = "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.npp=employee.npp AND cuti.no_cuti ='$no'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
// deskripsi halaman
// $pagedesc = "Cetak Form Cuti";
// $pagetitle = str_replace(" ", "_", $pagedesc)

$p = $result['proyek'];
$a = $result['pengganti'];
$b = $result['mp'];
$c = $result['hrd'];
$d = $result['dmp'];

$peng = mysqli_query($conn, "SELECT employee.* FROM employee WHERE employee.npp='$a'");
$pengganti = mysqli_fetch_array($peng);

$m = mysqli_query($conn, "SELECT employee.* FROM employee WHERE employee.npp='$b'");
$mp = mysqli_fetch_array($m);

$de = mysqli_query($conn, "SELECT employee.* FROM employee WHERE employee.npp='$d'");
$dmp = mysqli_fetch_array($de);

$hr = mysqli_query($conn, "SELECT employee.* FROM employee WHERE employee.npp='$c'");
$hrd = mysqli_fetch_array($hr);

$pro = mysqli_query($kon, "SELECT proyek.* FROM proyek WHERE proyek.lokasi='$p'");
$proyek = mysqli_fetch_array($pro);;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="G.A.D">

	<!-- <title><?php echo $pagetitle ?></title> -->

	<link href="libs/images/wrk-logo.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

	<style>
		body strong {
			font-size: 0.9em;
		}
	</style>

</head>

<body>
	<section id="header-kop" style="top: 0;">
		<div class="container-fluid">
			<table style="border:none; margin-left:40px;">
				<tbody>
					<tr>
						<td class="text-left" width="20%">
							<img src="../foto/logo/logo.png" alt="logo" width="170" />
						</td>
						<td class="text-left" width="5%">
							<p style="border:1px solid black;">&nbsp;LVL : <b>Kasi <b></p>
						</td>
					</tr>
				</tbody>
			</table>
			<table style="border:none; margin-left:40px;">
				<tbody>
					<tr>
						<td width="20px">
							Sub <br>
							Project<br>
							Location<br>
						</td>
						<td>
							: B21010 <br>
							: <?php echo $proyek['keterangan'] ?><br>
							: Batulicin Kalimantan Selatan<br>
						</td>

					</tr>
				</tbody>
			</table>

		</div>
	</section>
	<br />
	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center" style="font-size: 1.2em;"><b>PERMOHONAN KUNJUNGAN KELUARGA KARYAWAN</b></h4>
			<br />
			<table style="border:none; margin-left:40px;">
				<h3>
					<tbody>
						<tr>
							<td width="300px">Dengan Hormat,</td>
						</tr>
						<tr>
							<td width="300px">yang bertanda tangan dibawah ini</td>
						</tr>
						<tr>
							<td width="300px">Nama</td>
							<td>:<?php echo $result['nama_emp'] ?></td>
						</tr>
						<tr>
							<td width="300px">Nomor Induk Pegawai</td>
							<td>:<?php echo $result['npp'] ?></td>
						</tr>
						<tr>
							<td width="300px">Jabatan</td>
							<td>:<?php echo ucfirst($result['jabatan']); ?></td>
						</tr>
						<tr>
							<td width="300px">Unit Kerja</td>
							<td>:<?php echo ucfirst($result['divisi']); ?></td>
						</tr>
						<tr>
							<td width="300px">Status Kawin*</td>
							<td>:<?php echo $result['status_nikah']; ?></td>
						</tr>
						<tr>
							<td>Kunjungan Keluarga Sebelumnya,</td>
						</tr>
						<tr>
							<td width="300px">Dari Tanggal</td>
							<td>:<?php echo IndonesiaTgl($result['cuti_awal']); ?></td>
						</tr>
						<tr>
							<td width="300px">Sampai Tanggal</td>
							<td>:<?php echo IndonesiaTgl($result['cuti_akhir']); ?></td>
						</tr>
					</tbody>
				</h3>
			</table>
			<p style="margin-left: 40px;">Dengan ini mengajukan permohonan kunjungan keluarga selama <strong>:<?php echo $result['durasi']; ?> Hari</strong></p>

			<table style="border:none; margin-left:40px;">
				<h3>
					<tbody>
						<tr>
							<td width="300px">Dari Tanggal</td>
							<td>:<?php echo IndonesiaTgl($result['tgl_awal']); ?></td>
						</tr>
						<tr>
							<td width="300px">Sampai Tanggal</td>
							<td>:<?php echo IndonesiaTgl($result['tgl_akhir']); ?></td>
						</tr>
						<tr>
							<td>dan/atau Permohonan ijin khusus**</td>
						</tr>
						<tr>
							<td width="300px">Selama</td>
							<td>: - </td>
						</tr>
						<tr>
							<td>Selama berkunjung apabila ada sesuatu yang bersifat darurat bisa menghubungi sbb:</td>
						</tr>
						<tr>
							<td width="300px">Alamat Rumah</td>
							<td>:<?php echo $result['alamat']; ?></td>
						</tr>
						<tr>
							<td width="300px">Nomor Telepon</td>
							<td>:<?php echo $result['telp_emp']; ?></td>
						</tr>
						<tr>
							<td>dan juga selama kunjungan berjalan, pekerjaan yang di tinggalkan akan di serah terima kan kepada</td>
						</tr>
						<tr>
							<td>Bapak/Ibu</td>
							<td>:<?php echo $result['pengganti']; ?></td>
						</tr>
					</tbody>
				</h3>
			</table>
			<table style="border:none; margin-left:40px;">
				<h3>
					<tbody>
						<tr>
							<td>dengan point sbb:</td>
						</tr>
						<tr>
							<td width="270px">A. Pekerjaan Yang Sedang Berlangsung</td>
							<td>B. Pekerjaan Untuk ke depannya</td>
						</tr>
						<tr>
							<td class="text-justify" width="270px"><?php echo $result['job_skrg']; ?></td>
							<td class="text-justify"><?php echo $result['job_depan']; ?></td>
						</tr>
					</tbody>
				</h3>
			</table>
			<p style="margin-left: 40px;">Demikian surat permohonan kunjungan Sdr <strong><?php echo $result['nama_emp'] ?> </strong>untuk dapat dipergunakan sebagai mana mestinya</p>
			<h4>
				<table style="margin-right: 90px;" class="pull-right">
					<h4>
						<tbody>
							<tr style="font-size: 1em;">
								<td>
									<strong>Tanggal Permohonan</strong>
								</td>
							</tr>
							<tr>
								<td>
									<strong>Batulicin, <?php echo IndonesiaTgl($result['tgl_pengajuan']); ?> </strong>
								</td>
							</tr>
						</tbody>
					</h4>
				</table>
				<br>
				<br>
				<br>
				<table style="margin-left:40px;">
					<h4>
						<tbody>
							<tr>
								<td width="418px">
									<strong>Penerima Pekerjaan Sementara,</strong>
								</td>
								<td>
									<strong>Pemohon,</strong>
								</td>
							</tr>
						</tbody>
					</h4>
				</table>

				<table style="margin-left:40px;">
					<h4>
						<tbody>
							<tr>
								<td width="418px">
									<img src="../foto/ttd/<?php echo $pengganti['ttd'] ?>" alt="ttd" style="height: 40px; z-index:99; position: absolute; top: 790px;">
									<br>
									<u><?php echo $pengganti['nama_emp']; ?></u>
								</td>
								<td>
									<img src="../foto/ttd/<?php echo $result['ttd'] ?>" alt="ttd" style="height: 40px; z-index:99; position: absolute; top: 790px;">
									<br>
									<u><?php echo $result['nama_emp'] ?></u>
								</td>
							</tr>
						</tbody>
					</h4>
				</table>
				<br>
				<table style="margin-left: 40px;">
					<h4>
						<tbody>
							<tr>
								<td width="230px">
									<strong>Menyetujui,</strong>
								</td>
								<td>
									<strong>Mengetahui,</strong>
								</td>
								<td  width="230px">
									<strong>Di Periksa oleh,</strong>
								</td>
							</tr>
						</tbody>
					</h4>
				</table>
				<br
				<table style="margin-left: 40px;">
					<h4>
						<tbody>
							<tr>
								<td width="230px">
									<img src="../foto/ttd/<?php echo $mp['ttd'] ?>" alt="ttd" style="height: 40px; z-index:99; position: absolute; top: 900px;">
									<br>
									<u><?php echo $mp['nama_emp'] ?></u>
								</td>
								<td width="230px">
									<img src="../foto/ttd/<?php echo $dmp['ttd'] ?>" alt="ttd" style="height: 40px; z-index:99; position: absolute; top: 900px;">
									<br>
									<u><?php echo $dmp['nama_emp'] ?></u>
								</td>
								<td>
									<img src="../foto/ttd/<?php echo $hrd['ttd'] ?>" alt="ttd" style="height: 40px; z-index:99; position: absolute; top: 900px;">
									<br>
									<u><?php echo $hrd['nama_emp'] ?></u>
								</td>
							</tr>
							<tr>
								<td width="230px">
									Manajer Proyek
								</td>
								<td width="230px">
									Deputi Manajer Proyek
								</td>
								<td>
									Kasie Keuangan
								</td>
							</tr>
						</tbody>
					</h4>
				</table>

			</h4>
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>

</html>