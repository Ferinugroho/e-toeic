<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='user') {
?>
<script language="javascript">
function toggle() {

var ele = document.getElementById("sembunyikan");

var text = document.getElementById("penampakan");

if(ele.style.display == "block") {

ele.style.display = "none";
text.innerHTML = "<button class='tambah'>Show Questions</button>";

}
else {
ele.style.display = "block";
text.innerHTML = "<button class='tambah'>Hide Questions</button>";
}
} 
</script>

<div class="container">	
<fieldset>		
<?php
//panggil data
$sql="select * from materi where id_materi ='$_GET[id]'";
$proses=mysql_query($sql);
$data=mysql_fetch_array($proses);
	$kode = mysql_num_rows($proses);
	if ($kode==''){	
?>	
<div align="center">
Materi Not Created
</div>
<?php
} else { 
?>
<br>
<div style="text-align:justify;"><?php echo $data['isi_materi']?></div>
<?php
}
?>

<a id="penampakan" href="javascript:toggle();"  style="float:right;"><button class="tambah">Show Questions</button></a>
<div id="sembunyikan" style="display: none;">
<br>
<blockquote>              
<form name="f1" id="f1" method="post" action="main.php?p=latihan-simpan"  enctype="multipart/form-data">
<table width="100%">
<?php
$i=0;
$sql_tbldata=("SELECT * from soal_materi where id_materi='$_GET[id]'");		
	$sql_tbldata .= " order by id_soal_materi ASC";	
	$psn=mysql_query($sql_tbldata) or die (mysql_error());
	while($data=mysql_fetch_object($psn)){
$id_soal_materi=$data->id_soal_materi;
$jenis_pertanyaan=$data->jenis_pertanyaan;
$kunci_jawaban=$data->kunci_jawaban;
$no=$i+1;
?>
<input type="hidden" name="id_materi" value="<?php echo $_GET['id'] ?>">
<input type="hidden" name="id_soal_materi[]" value="<?php echo $id_soal_materi ?>">
<input type="hidden" name="kunci_jawaban[]" value="<?php echo $kunci_jawaban ?>">
  <tr valign="top">
    <td colspan="3"><?php echo nl2br($data->pertanyaan); ?></td>
  </tr>
  <tr  valign="top">
    <td width="49%"><input type="radio" name="jawaban[<?php echo $i ?>]" value="<?php echo $data->a ?>" required>
	(A) <?php if ($jenis_pertanyaan=='Listening'){ echo"____"; }else{ echo "$data->a"; }?></td>
    <td colspan="2"><input type="radio" name="jawaban[<?php echo $i ?>]" value="<?php echo $data->c ?>" required>
    (C) <?php if ($jenis_pertanyaan=='Listening'){ echo"____"; }else{ echo "$data->c"; }?></td>
  </tr>
  <tr  valign="top">
    <td><input type="radio" name="jawaban[<?php echo $i ?>]" value="<?php echo $data->b ?>" required>
	(B) <?php if ($jenis_pertanyaan=='Listening'){ echo"____"; }else{ echo "$data->b"; }?></td>
    <td colspan="2"><input type="radio" name="jawaban[<?php echo $i ?>]" value="<?php echo $data->d ?>" required>
    (D) <?php if ($jenis_pertanyaan=='Listening'){ echo"____"; }else{ echo "$data->d"; }?></td>
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
 </blockquote>
 </div>
</fieldset> 
</div>
<?php 
}else{
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
}
?>