<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='user') {
$id_user=$_SESSION['user'];
$id_materi=$_POST['id_materi'];

$id_s= $_POST['id_soal_materi'];
    $jum_s= count($id_s);
    for ($i=0;$i<$jum_s;$i++){
    $jawaban1=$_POST['jawaban'][$i];
    $kunci_jawaban1=$_POST['kunci_jawaban'][$i];

if($jawaban1==$kunci_jawaban1){
$ket='1';
}else{
$ket='0';
}	
$total[] = $ket;
$jum_benar = array_sum($total);
$jum_salah = $jum_s - $jum_benar;
$syarat = ($jum_benar/$jum_s)*100;
$syarat = number_format($syarat,0,',','.');
}	
    for ($x=0;$x<$jum_s;$x++){
	
	$id_soal_materi=$_POST['id_soal_materi'][$x];
    $jawaban=$_POST['jawaban'][$x];
    $kunci_jawaban=$_POST['kunci_jawaban'][$x];

if($jawaban==$kunci_jawaban){
$keterangan[$x]='Benar';
}else{
$keterangan[$x]='Salah';
}

if($syarat<=69):
	echo "<script>alert('Your Correct : $jum_benar and incorrect : $jum_salah from $jum_s exercise');</script>";
	echo "<script>alert('Sorry Your Data Not Save. Please try again!');location.href='main.php?p=latihan-show&id=$id_materi';</script>";
else:
	
$sqlSave = "INSERT INTO latihan_soal SET 
							id_latihan = '',
							id_user = '$id_user',
							id_materi = '$id_materi',
							id_soal_materi = '$id_soal_materi',
							jawaban = '$jawaban',
							keterangan = '$keterangan[$x]',
							status = 'Complete'";

$querySave = mysql_query($sqlSave);

endif;
}
if($syarat == '100'){
$badge='gold.png';
}elseif($syarat < '100' and $syarat == '90'){
$badge='silver.png';
}elseif($syarat < '90' and $syarat == '80'){
$badge='bronze.png';
}elseif($syarat < '80' and $syarat == '70'){
$badge='star.png';
}elseif($syarat < '70' and $syarat == '60'){
$badge='rosetteblue.png';
}elseif($syarat < '60' and $syarat == '50'){
$badge='flower.png';
}else{
$badge='shield.png';
}
//panggil data
$sql="select * from leaderboard where id_user ='$id_user'";
$proses=mysql_query($sql);
$data=mysql_fetch_array($proses);
	$kode = mysql_num_rows($proses);
	if ($kode==''){	
$sqlSave = "INSERT INTO leaderboard SET 
							id_leaderboard = '',
							id_user = '$id_user',
							tipe_test = '$id_materi',
							skor = '$syarat',
							badge = '$badge'";

$querySave = mysql_query($sqlSave);
} else { 
$sqlSave = "UPDATE leaderboard SET 
							tipe_test = '$id_materi',
							skor = '$syarat',
							badge = '$badge' where id_user='$id_user'";

$querySave = mysql_query($sqlSave);
}
if($querySave):
	echo "<script>alert('Your correct  $jum_benar and incorrect  $jum_salah from total $jum_s Exercise. The value you earn is $syarat');</script>";
	echo "<script>alert('Congratulations Your data was successfully saved');location.href='main.php?p=latihan-view&id=$id_materi';</script>";
	exit();
else:
	echo "<script>alert('Data failed to save.');location.href='main.php?p=latihan-show&id=$id_materi';</script>";
	exit();
endif;	
}else{
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
exit();
}
?>