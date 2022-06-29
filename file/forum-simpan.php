<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin' || $_SESSION['level']=='user') {

date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$jamsekarang = date("h:i:s");

$username = $_POST['username'];
$chat = $_POST['chat'];

$sql="select * from chat where tanggal='$tglsekarang' and username='$username' and chat='$chat'";
$proses=mysql_query($sql);
$data=mysql_fetch_array($proses);
	$kode = mysql_num_rows($proses);
	if ($kode < '1'){	
	
$sqlSave = "INSERT INTO chat SET 
							id_chat = '',
							username = '$username',
							tanggal = '$tglsekarang',
							jam = '$jamsekarang',
							chat = '$chat'";
$querySave = mysql_query($sqlSave);
if($querySave):
	echo "<script>alert('Message successfully sent.');location.href='main.php?p=forum';</script>";
	exit();
else:
	echo "<script>alert('Message failed to ship.');history.go(-1);</script>";
	exit();
endif;	
} else { 
echo "<script>alert('Spam is forbidden !!!');location.href='menu.php?p=home';</script>";
	exit();
}
}else{
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
exit();
}
?>