<?php
include("sess_check.php");

$no = $_GET['no'];

$del = "DELETE FROM cuti WHERE no_cuti='$no'";
$query 	= mysqli_query($conn, $del);

if ($query) {
	echo "<script type='text/javascript'>
				alert('Data berhasil dihapus!'); 
				document.location = 'cuti_waitapp.php'; 
                </script>";
} else {
	echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.'); 
                document.location = 'cuti_waitapp.php'; 
			</script>";
}
