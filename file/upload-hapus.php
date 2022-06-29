<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
$sql_hapus=mysql_query("delete from file where id_file='$_GET[id]' ");
if($sql_hapus):
		echo "<script>alert('File Berhasil dihapus');location.href='main.php?p=upload-view';</script>";
	else:
		echo "<script>alert('File Gagal dihapus!');history.go(-1);';</script>";
	endif;
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
}
?>