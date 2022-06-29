<?php
//memulai sesi
session_start();
$sesi = $_SESSION['sesiuser'];
//cek apakah veriabel sesi yang sudah dibuat ada atau tidak.
//jika ada biarkan masuk ke halaman main.php
//jika tidak kembalikan ke halmana index.php atau login
if(empty($sesi)):
	echo "<script>alert('Anda tidak memiliki sesi.');location.href='index.php';</script>";
	exit();
endif;

?>