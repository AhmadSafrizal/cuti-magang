<?php

include("sess_check.php");

$id = $_POST['id'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$status = $_POST['status'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

$mysql = "UPDATE employee SET nama_emp='$nama', jk_emp='$kelamin', status_nikah='$status', telp_emp='$telp', alamat='$alamat', email='$email' WHERE npp='$id'";
$ress = mysqli_query($conn, $mysql);
header("location: akun.php");
