<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly  !' );
if($_SESSION['level']=='admin') {
?>
<br>
<div class="container">
<fieldset>
<legend>Add Materi Data</legend>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<form name="f1" method="post" action="main.php?p=materi-simpan"  enctype="multipart/form-data">
			<input type="hidden" name="id_materi" value="<?php echo $_GET['id']?>">
				<div class="form-sub-w3">
					<textarea type="text" id="mymce" name="isi_materi"></textarea>
				</div>
				<div align="center">
					<input type="submit" class="tambah-materi" value="Simpan"><input type="button" onclick="history.back(-1)" class="batal-materi" value="Batal">
				</div>
			</form>
		</div>
<!--//form-ends-here-->
</div>
</fieldset>		
</div>
<?php 
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
}
?>		