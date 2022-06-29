<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='admin') {
$id_materi = $_POST['id_materi'];
$id_soal_materi = $_POST['id_soal_materi'];
$jenis_pertanyaan = $_POST['jenis_pertanyaan'];
$pertanyaan = mysql_real_escape_string($_POST['pertanyaan']);
$jawaban_a = mysql_real_escape_string($_POST['a']);
$jawaban_b = mysql_real_escape_string($_POST['b']);
$jawaban_c = mysql_real_escape_string($_POST['c']);
$jawaban_d = mysql_real_escape_string($_POST['d']);
$kunci_jawaban = $_POST['kunci_jawaban'];

if(empty($jenis_pertanyaan)):
	echo "<script>alert('Question Type Not Allowed.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
elseif(empty($pertanyaan)):
	echo "<script>alert('Question Not Allowed.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
elseif(empty($jawaban_a)):
	echo "<script>alert('Question Not Allowed.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
elseif(empty($jawaban_b)):
	echo "<script>alert('Question Not Allowed.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
elseif(empty($jawaban_c)):
	echo "<script>alert('Question Not Allowed.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
elseif(empty($jawaban_d)):
	echo "<script>alert('Question Not Allowed.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
elseif(empty($kunci_jawaban)):
	echo "<script>alert('Question Not Allowed.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
	else:
	
$sqlSave = "UPDATE soal_materi SET 
							jenis_pertanyaan = '$jenis_pertanyaan',
							pertanyaan = '$pertanyaan',
							a = '$jawaban_a',
							b = '$jawaban_b',
							c = '$jawaban_c',
							d = '$jawaban_d',
							kunci_jawaban = '$kunci_jawaban' where id_soal_materi='$id_soal_materi'";
$querySave = mysql_query($sqlSave);
if($querySave):
	echo "<script>alert('Data Changes saved successfully.');location.href='main.php?p=materi-show&id=$id_materi';</script>";
	exit();
else:
	echo "<script>alert('Data Changes failed to save.');history.go(-1);</script>";
	exit();
endif;
exit();
endif;	
}else{
echo '<script language="javascript">alert("Can not access data.. !!"); document.location="index.php";</script>';
exit();
}
?>