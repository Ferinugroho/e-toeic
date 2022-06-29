<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
$id_materi = $_POST['id_materi'];
$isi_materi = mysql_real_escape_string($_POST['isi_materi']);

if(empty($isi_materi)):
	echo "<script>alert('Content Content Not Empty.');location.href='main.php?p=materi-tambah&id=&id_materi';</script>";
	else:
	
$sqlSave = "UPDATE materi SET 
							isi_materi = '$isi_materi' where id_materi='$id_materi'";
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
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
exit();
}
?>