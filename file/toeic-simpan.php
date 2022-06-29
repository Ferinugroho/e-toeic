<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
$jenis_toeic = $_POST['jenis_toeic'];
$pertanyaan = mysql_real_escape_string($_POST['pertanyaan']);
$jawaban_a = mysql_real_escape_string($_POST['a']);
$jawaban_b = mysql_real_escape_string($_POST['b']);
$jawaban_c = mysql_real_escape_string($_POST['c']);
$jawaban_d = mysql_real_escape_string($_POST['d']);
$kunci_jawaban = mysql_real_escape_string($_POST['kunci_jawaban']);

if(empty($jenis_toeic)):
	echo "<script>alert('Toeic Type can not empty.');location.href='main.php?p=toeic-tambah';</script>";
elseif(empty($pertanyaan)):
	echo "<script>alert('uestion can not empty.');location.href='main.php?p=toeic-tambah';</script>";
elseif(empty($jawaban_a)):
	echo "<script>alert('Answer A can not empty.');location.href='main.php?p=toeic-tambah';</script>";
elseif(empty($jawaban_b)):
	echo "<script>alert('Answer B can not empty.');location.href='main.php?p=toeic-tambah';</script>";
elseif(empty($jawaban_c)):
	echo "<script>alert('Answer C can not empty.');location.href='main.php?p=toeic-tambah';</script>";
elseif(empty($jawaban_d)):
	echo "<script>alert('Answer D can not empty.');location.href='main.php?p=toeic-tambah';</script>";
elseif(empty($kunci_jawaban)):
	echo "<script>alert('Answer Key Not Empty.');location.href='main.php?p=toeic-tambah';</script>";
	else:
	
$sqlSave = "INSERT INTO toeic SET 
							id_toeic = '',
							jenis_toeic = '$jenis_toeic',
							pertanyaan = '$pertanyaan',
							a = '$jawaban_a',
							b = '$jawaban_b',
							c = '$jawaban_c',
							d = '$jawaban_d',
							kunci_jawaban = '$kunci_jawaban'";
$querySave = mysql_query($sqlSave);
if($querySave):
	echo "<script>alert('Data Changes saved successfully.');location.href='main.php?p=toeic-tambah';</script>";
	exit();
else:
	echo "<script>alert('Data Changes failed to save.');history.go(-1);</script>";
	exit();
endif;
exit();
endif;	
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
exit();
}
?>