<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='user') {
$thn=$_POST['tahun'];
$bln=$_POST['bulan'];
$tgl=$_POST['tanggal'];
$jam=$_POST['jam'];
$menit=$_POST['menit'];
$detik=$_POST['detik'];
session_start();
$_SESSION['tahun']=$thn;
$_SESSION['bulan']=$bln;
$_SESSION['tanggal']=$tgl;
$_SESSION['jam']=$jam;
$_SESSION['menit']=$menit;
$_SESSION['detik']=$detik;
?>
<script>
Hitung();
function Hitung(){
tahun = <?php echo json_encode($_SESSION['tahun'])?>;
bulan = <?php echo json_encode($_SESSION['bulan'])?>;
tanggal = <?php echo json_encode($_SESSION['tanggal'])?>;
jam = <?php echo json_encode($_SESSION['jam'])?>;
menit = <?php echo json_encode($_SESSION['menit'])?>;
detik = <?php echo json_encode($_SESSION['detik'])?>;

setTimeout(function()
{
tglTarget = new Date(tahun, (bulan - 1), tanggal, jam, menit, detik, 00);
tglSkrg  = new Date();
tglSkrg  = new Date(tglSkrg.getFullYear(), tglSkrg.getMonth(), tglSkrg.getDate(), tglSkrg.getHours(), tglSkrg.getMinutes(), tglSkrg.getSeconds(), 00, 00);
var sisatanggal = parseInt((tglTarget-tglSkrg)/86400000);
var sisaJam = parseInt((tglTarget-tglSkrg)/3600000);
var sisaMenit = parseInt((tglTarget-tglSkrg)/60000);
var sisaDetik = parseInt((tglTarget-tglSkrg)/1000);
detik = sisaMenit*60;
detik = sisaDetik-detik;
menit = sisaJam*60;
menit = sisaMenit-menit;
jam = sisatanggal*24;
jam = (sisaJam-jam) < 0 ? 0 : sisaJam-jam;
tanggal = sisatanggal;	
mulaiHitung(tanggal,jam, menit,detik,tahun);
}, 1000);
}
function mulaiHitung(tanggal, jam, menit, detik, tahun){
if(menit < 10 && jam == 0){
       var peringatan = 'style="color:red"';
};
if(tanggal <= 0 && jam <= 0 && menit <= 0 && detik <= 0) {  
var f1 = document.getElementById("f1");
                f1.submit(); 
return; 

return;				
}else{				
	/** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
               $('#timer').html(
                      '<h3 align="center"'+peringatan+'>The rest of your time <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h3>'
                );	
} 
Hitung();
return;
}
</script>	  
<body onload='mulaiHitung();'>
<div class="container">	
<fieldset>	    
<div id='timer'></div>       
<form name="f1" id="f1" method="post" action="main.php?p=toeic-test-simpan"  enctype="multipart/form-data">
<table width="100%">
<?php
$i=0;
$sql_tbldata=("SELECT * from toeic");		
	$sql_tbldata .= " order by id_toeic ASC";	
	$psn=mysql_query($sql_tbldata) or die (mysql_error());
	while($data=mysql_fetch_object($psn)){
$id_toeic=$data->id_toeic;
$jenis_toic=$data->jenis_toic;
$kunci_jawaban=$data->kunci_jawaban;
$no=$i+1;
?>
<input type="hidden" name="id_toeic[]" value="<?php echo $id_toeic ?>">
<input type="hidden" name="kunci_jawaban[]" value="<?php echo $kunci_jawaban ?>">
  <tr valign="top">
    <td colspan="3"><?php echo nl2br($data->pertanyaan); ?></td>
  </tr>
  <tr  valign="top">
    <td width="49%"><input type="radio" name="jawaban[<?php echo $i ?>]" value="<?php echo $data->a ?>" required>
	(A) <?php if ($jenis_toic=='Listening'){ echo"____"; }else{ echo "$data->a"; }?></td>
    <td colspan="2"><input type="radio" name="jawaban[<?php echo $i ?>]" value="<?php echo $data->c ?>" required>
    (C) <?php if ($jenis_toic=='Listening'){ echo"____"; }else{ echo "$data->c"; }?></td>
  </tr>
  <tr  valign="top">
    <td><input type="radio" name="jawaban[<?php echo $i ?>]" value="<?php echo $data->b ?>" required>
	(B) <?php if ($jenis_toic=='Listening'){ echo"____"; }else{ echo "$data->b"; }?></td>
    <td colspan="2"><input type="radio" name="jawaban[<?php echo $i ?>]" value="<?php echo $data->d ?>" required>
    (D) <?php if ($jenis_toic=='Listening'){ echo"____"; }else{ echo "$data->d"; }?></td>
  </tr>
  
<?php
$no++;
$i++;
}
?>    
  <tr  valign="top">
    <td colspan="2">&nbsp;</td>
    <td width="20%" colspan="1">
	<?php
		if(mysql_num_rows($psn) > 0){?>
		<input type="submit" name="simpan" id="simpan" class="submit" value="Simpan">
		<?php }else{
		echo "";
		}
		?>
	</td>
  </tr>
</table>

<?php
		if(mysql_num_rows($psn) > 0){?>
			<marquee behavior="alternate" scrollamount="5"> <font name="Forte"><u><h2>GOOD LUCK</h2></u></font></marquee> 
		<?php }else{
		echo "";
		}
		?>

</form>
 </div>
</fieldset> 
</div>
</body>
<?php 
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
}
?>