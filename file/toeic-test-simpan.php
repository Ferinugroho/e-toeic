<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='user') {
$id_user=$_SESSION['user'];
$id_materi=$_POST['id_materi'];

$id_s= $_POST['id_toeic'];
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
$syarat = $jum_benar*4.95;
$syarat = number_format($syarat,0,',','.');
}	
    for ($x=0;$x<$jum_s;$x++){
	
	$id_toeic=$_POST['id_toeic'][$x];
    $jawaban=$_POST['jawaban'][$x];
    $kunci_jawaban=$_POST['kunci_jawaban'][$x];

if($jawaban==$kunci_jawaban){
$keterangan[$x]='Benar';
}else{
$keterangan[$x]='Salah';
}

if($syarat<=0):
	echo "<script>alert('Your correct : $jum_benar and incorrect : $jum_salah from $jum_s Exercise');</script>";
	echo "<script>alert('Sorry Your Data Not We Save. Please do the exercise again!');location.href='main.php?p=toeic-set';</script>";
else:
	
$sqlSave = "INSERT INTO test_toeic SET 
							id_test_toeic = '',
							id_user = '$id_user',
							id_toeic = '$id_toeic',
							jawaban = '$jawaban',
							keterangan = '$keterangan[$x]',
							status = 'Complete'";

$querySave = mysql_query($sqlSave);

endif;
}
if($syarat >= '900'){
$badge='badge.png';
}elseif($syarat < '900' and $syarat >= '800'){
$badge='rosetteblue.png';
}elseif($syarat < '800' and $syarat >= '700'){
$badge='rosettegreen.png';
}else{
$badge='rosettered.png';
}

$sqlSave = "UPDATE leaderboard SET 
							tipe_test = 'toeic',
							skor = '$syarat',
							badge = '$badge' where id_user='$id_user'";

$querySave = mysql_query($sqlSave);

if($querySave):
	echo "<script>alert('Your correct  $jum_benar and incorrect  $jum_salah from total $jum_s Exercise. The value you earn is $syarat');</script>";
	echo "<script>alert('Congratulations Your data was successfully saved');location.href='main.php?p=leaderboard';</script>";
	exit();
else:
	echo "<script>alert('Data failed to save.');location.href='main.php?p=toeic-set';</script>";
	exit();
endif;	
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
exit();
}
?>