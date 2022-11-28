<?php $pagedesc = "Login"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistem Informasi Pengajuan Cuti Online - <?php echo $pagedesc ?></title>

	<link href="libs/images/wrk-logo.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

	<style>
        @media screen and (max-width: 600px) {
            #page-wrapper {
                margin: 0 10px;
            }
        }
    </style>

</head>

<body style="background:url('foto/logo/bg.jpg'); background-size: cover;background-repeat: no-repeat; height: 100vh;">

	<section id="main-wrapper" style="margin-top: 120px">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4"><?php include("layout_alert.php"); ?></div>
			</div><!-- /.row -->
			<div class="row">
				<div id="page-wrapper" class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4" style="background-color: #ffffff; border-radius: 3px; webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05); box-shadow: 0 1px 1px rgba(0,0,0,.05)">
					<div class="row">
						<div class="col-lg-12">
							<br />
							<center><img src="libs/images/wrk.png" width="270" height="80"></center>
							<h4 class="text-center">Sistem Informasi Pengajuan Cuti</h4>
						</div>
					</div><!-- /.row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<form action="login_auth.php" method="post">
										<div class="form-group">
											<input type="text" class="form-control" name="username" placeholder="Id anda..." required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" name="password" placeholder="Password" required>
										</div>
										<div class="form-group">
											<select class="form-control" name="akses" required>
												<option value="">======= Login Sebagai =======</option>
												<option value="admin">Administrator/HRD</option>
												<option value="kasi">Kasi</option>
												<option value="mp">Manajer Proyek</option>
												<option value="dmp">Deputi Manajer Proyek</option>
												<option value="pegawai">Staff</option>
											</select>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-success btn-block" name="login" value="Masuk">
										</div>
									</form>
									<center>
									    <a href="../index.php" style="color: blue;">Kembali</a>
									</center>
								</div>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>