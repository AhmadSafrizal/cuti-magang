<?php
//error_reporting(0);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "database_proyek";

$kon = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Tidak dapat terhubung ke database: " . mysqli_error());
