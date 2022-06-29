<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
$sql_hapus=mysql_query("delete from soal_materi where id_soal_materi='$_GET[id2]' ");
if($sql_hapus):
		echo "<script>alert('Data Successfully deleted');location.href='main.php?p=materi-show&id=$_GET[id1]';</script>";
	else:
		echo "<script>alert('Data Failed deleted!');history.go(-1);';</script>";
	endif;
}else{
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
}
?>