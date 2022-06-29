<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
?>
<br>
<div class="container">
<fieldset>
<legend>Upload File</legend>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<form name="f1" method="post" action="main.php?p=upload-simpan" class="dropzone">
				<div class="form-sub-w3">
					<div class="fallback">
						<input name="file" type="file" multiple />
					</div>
				</div>
			</form>
		</div>
<!--//form-ends-here-->
</div>
<div align="center">
<a href="main.php?p=upload-view"><button class="tambah">OK</button></a>
</div>
</fieldset>		
</div>
<?php 
}else{
echo '<script language="javascript">alert("Can not Access Data...!!"); document.location="index.php";</script>';
}
?>		