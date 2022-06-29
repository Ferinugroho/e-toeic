<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
$sql_hapus=mysql_query("delete from toeic where id_toeic='$_GET[id]' ");
if($sql_hapus):
		echo "<script>alert('Data Successfully deleted');location.href='main.php?p=toeic';</script>";
	else:
		echo "<script>alert('Data Failed deleted!');history.go(-1);';</script>";
	endif;
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
}
?>