 <?php
$mysql_user="root";
$mysql_password="";
$mysql_database="e_toeic";
$mysql_host="localhost";
$koneksi_db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database, $koneksi_db);  
error_reporting(E_STRICT  | ~E_NOTICE);
define( 'VALIDASI', 1 );
?>