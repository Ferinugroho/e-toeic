<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
//definisi variabel
$tmp_file=$_FILES['file']['tmp_name']; //lokasi di komputer
$file=$_FILES['file']['name']; //Variabel nama yang diupload
$folder="upload/$file"; //folder tujuan upload

$upload=move_uploaded_file($tmp_file,$folder);
	
$sqlSave = "INSERT INTO file SET 
							id_file = '',
							file = '$file'";
$querySave = mysql_query($sqlSave);

}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
exit();
}
?>