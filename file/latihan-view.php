<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='user') {
?>
<div class="container">	
<fieldset>		
<?php
//panggil data
$sql="select * from materi where id_materi ='$_GET[id]'";
$proses=mysql_query($sql);
while($data=mysql_fetch_array($proses)){	
?>	
<div style="text-align:justify;"><?php echo $data['isi_materi']?></div>
<?php
}
?>
            
<table width="100%">
<?php
$i=0;
$sql_tbldata=("SELECT soal_materi.id_soal_materi as id_soal_materi,soal_materi.pertanyaan as pertanyaan,soal_materi.a as jawaban_a,
						soal_materi.b as jawaban_b,soal_materi.c as jawaban_c,soal_materi.d as jawaban_d,soal_materi.kunci_jawaban as kunci_jawaban,
							latihan_soal.jawaban as jawaban,latihan_soal.keterangan as keterangan
							from soal_materi,latihan_soal
									where latihan_soal.id_user='$_SESSION[user]' and latihan_soal.id_materi='$_GET[id]' and 
											soal_materi.id_soal_materi=latihan_soal.id_soal_materi");
$sql_tbldata1=("SELECT count(latihan_soal.id_soal_materi) as jum_s
								from soal_materi,latihan_soal
									where latihan_soal.id_user='$_SESSION[user]' and latihan_soal.id_materi='$_GET[id]' and 
											soal_materi.id_soal_materi=latihan_soal.id_soal_materi");

	$psn1=mysql_query($sql_tbldata1) or die (mysql_error());
	while($data1=mysql_fetch_object($psn1)){	
	$jum_s=$data1->jum_s;
	}
											
	$sql_tbldata .= " order by latihan_soal.id_latihan ASC";	
	$psn=mysql_query($sql_tbldata) or die (mysql_error());
	while($data=mysql_fetch_object($psn)){
$id_soal=$data->id_soal_materi;
$pertanyaan=nl2br($data->pertanyaan);
$a=$data->jawaban_a;
$b=$data->jawaban_b;
$c=$data->jawaban_c;
$d=$data->jawaban_d;
$e=$data->jawaban_e;
$kunci_jawaban=$data->kunci_jawaban;
$jawaban=$data->jawaban;
$keterangan=$data->keterangan;
if($keterangan=='Benar'){
$ket='1';
}else{
$ket='0';
}
$total[] = $ket;
$jum_benar = array_sum($total);
$jum_salah = $jum_s - $jum_benar;
$skor = ($jum_benar/$jum_s)*100;
$skor = number_format($skor,0,',','.');
?>
  <tr valign="top">
    <td colspan="4"><?php echo $data->pertanyaan; ?></td>
  </tr>
  <tr  valign="top">
    <td width="49%">
	<?php if($jawaban==$a){?>
	<img src="images/check.png" style="width:20px;height:20px;"><?}else{echo'<img src="images/radio.png" style="width:20px;height:20px;">';}?>(A)
		<?php echo $data->jawaban_a ?>
	</td>
    <td colspan="3">
	<?php if($jawaban==$c){?>
	<img src="images/check.png" style="width:20px;height:20px;"><?}else{echo'<img src="images/radio.png" style="width:20px;height:20px;">';}?>(C)
		<?php echo $data->jawaban_c ?>
	</td>
  </tr>
  <tr  valign="top">
    <td>
	<?php if($jawaban==$b){?>
	<img src="images/check.png" style="width:20px;height:20px;"><?}else{echo'<img src="images/radio.png" style="width:20px;height:20px;">';}?>(B)
		<?php echo $data->jawaban_b ?>	
	</td>
    <td colspan="2">
	<?php if($jawaban==$d){?>
	<img src="images/check.png" style="width:20px;height:20px;"><?}else{echo'<img src="images/radio.png" style="width:20px;height:20px;">';}?>(D)
		<?php echo $data->jawaban_d ?>
	</td>
	<td align="right">Answer : <?php echo $data->keterangan ?></td>
  </tr>
  
<?php
}
?>    
</table>
<marquee behavior="alternate" scrollamount="5"> <font name="Forte"><u><h2>Score : <?php echo $skor?></h2></u></font></marquee> 
 </div>
</fieldset> 
</div>
<?php 
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
}
?>