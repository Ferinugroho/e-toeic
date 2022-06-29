<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='admin') {
$id_materi = $_POST['id_materi'];
$jenis_pertanyaan = $_POST['jenis_pertanyaan'];
$pertanyaan = mysql_real_escape_string($_POST['pertanyaan']);
$jawaban_a = mysql_real_escape_string($_POST['a']);
$jawaban_b = mysql_real_escape_string($_POST['b']);
$jawaban_c = mysql_real_escape_string($_POST['c']);
$jawaban_d = mysql_real_escape_string($_POST['d']);
$kunci_jawaban = mysql_real_escape_string($_POST['kunci_jawaban']);

if(empty($jenis_pertanyaan)):
	echo "<script>alert('Question Type Not Allowed.');location.href='main.php?p=soal-materi-tambah&id=$id_materi';</script>";
elseif(empty($pertanyaan)):
	echo "<script>alert('Question Not Allowed.');location.href='main.php?p=soal-materi-tambah&id=$id_materi';</script>";
elseif(empty($jawaban_a)):
	echo "<script>alert('Answer A Can not Empty.');location.href='main.php?p=soal-materi-tambah&id=$id_materi';</script>";
elseif(empty($jawaban_b)):
	echo "<script>alert('Answer B Can not Empty.');location.href='main.php?p=soal-materi-tambah&id=$id_materi';</script>";
elseif(empty($jawaban_c)):
	echo "<script>alert('Answer C Can not Empty.');location.href='main.php?p=soal-materi-tambah&id=$id_materi';</script>";
elseif(empty($jawaban_d)):
	echo "<script>alert('Answer D Can not Empty.');location.href='main.php?p=soal-materi-tambah&id=$id_materi';</script>";
elseif(empty($kunci_jawaban)):
	echo "<script>alert('Answer Key Not Allowed.');location.href='main.php?p=soal-materi-tambah&id=$id_materi';</script>";
	else:
	
$sqlSave = "INSERT INTO soal_materi SET 
							id_soal_materi = '',
							id_materi = '$id_materi',
							jenis_pertanyaan = '$jenis_pertanyaan',
							pertanyaan = '$pertanyaan',
							a = '$jawaban_a',
							b = '$jawaban_b',
							c = '$jawaban_c',
							d = '$jawaban_d',
							kunci_jawaban = '$kunci_jawaban'";
$querySave = mysql_query($sqlSave);
if($querySave):
	echo "<script>alert('Data successfully saved.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
	exit();
else:
	echo "<script>alert('Data not successfully saved..');history.go(-1);</script>";
	exit();
endif;
exit();
endif;	
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
exit();
}
?>