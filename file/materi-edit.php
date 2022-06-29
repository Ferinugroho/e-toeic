<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
$data=mysql_fetch_array(mysql_query("select * from materi where id_materi='$_GET[id]'")); 
?>
<div class="services">
		<div class="container">
<fieldset>
<legend>Ubah Data Materi</legend>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<form name="f1" method="post" action="main.php?p=materi-update"  enctype="multipart/form-data">
				<input type="hidden" name="id_materi" value="<?php echo $data['id_materi']?>">
				<div class="form-sub-w3">
					<textarea type="text" id="mymce" name="isi_materi" class="textarea"><?php echo $data['isi_materi']?></textarea>
				</div>
				<div align="center">
					<input type="submit" class="edit-materi" value="Simpan"><input type="button" onclick="history.back(-1)" class="batal-materi" value="Batal">
				</div>
			</form>
		</div>
<!--//form-ends-here-->
</div>
</fieldset>		
		</div>
</div>
<?php 
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
}
?>		