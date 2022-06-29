<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
$data=mysql_fetch_array(mysql_query("select * from soal_materi where id_soal_materi='$_GET[id2]'")); 
?>
<script type="text/javascript">
function startCalc(){ 
interval=setInterval("calc()",1)}

function calc(){ 	
	a=document.f1.a.value;
	b=document.f1.b.value;
	c=document.f1.c.value;
	d=document.f1.d.value;
	k=document.f1.kunci.value;
		if(k == 'a'){
		kunci = a;
		}else if(k == 'b'){
		kunci = b;
		}else if(k == 'c'){
		kunci = c;
		}else if(k == 'd'){
		kunci = d;	
		}else{
		kunci = '';
}
		document.f1.kunci_jawaban.value=kunci
	}
		function stopCalc(){clearInterval(interval)} 
</script>
<br>
<div class="container">
<fieldset>
<legend>Change Materi Question Data</legend>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<form name="f1" method="post" action="main.php?p=soal-materi-update"  enctype="multipart/form-data">
			<input type="hidden" name="id_materi" value="<?php echo $_GET['id1']?>">
			<input type="hidden" name="id_soal_materi" value="<?php echo $_GET['id2']?>">
				<label class="label">Question Type </label>
				<div class="form-sub-w3">
					<select name="jenis_pertanyaan" required>
						<option value="<?php echo $data['jenis_pertanyaan']?>"><?php echo $data['jenis_pertanyaan']?></option>
						<option value="Listening">Listening</option>
						<option value="Reading">Reading</option>
					</select>
				</div>
				<label class="label">Question</label>
				<div class="form-sub-w3">
					<textarea type="text" id="mymce"  name="pertanyaan"><?php echo $data['pertanyaan']?></textarea>
				</div>
				<label class="label">Answer A </label>
				<div class="form-sub-w3">
					<input type="text" name="a" id="a" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['a']?>" required>
				</div>
				<label class="label">Answer B </label>
				<div class="form-sub-w3">
					<input type="text" name="b" id="b" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['b']?>" required>
				</div>
				<label class="label">Answer C </label>
				<div class="form-sub-w3">
					<input type="text" name="c" id="c" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['c']?>" required>
				</div>
				<label class="label">Answer D </label>
				<div class="form-sub-w3">
					<input type="text" name="d" id="d" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['d']?>" required>
				</div>
				<label class="label">Answer Key</label>
				<div class="form-sub-w3">
					<select name="kunci" id="kunci" onchange="startCalc();" onBlur="stopCalc();" required>
						<option value="">Select Answer Key</option>
						<option value="a">A</option>
						<option value="b">B</option>
						<option value="c">C</option>
						<option value="d">D</option>
					</select>
				</div>
				<input type="hidden" name="kunci_jawaban"  id="kunci_jawaban"  onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['kunci_jawaban']?>" readonly="yes">
			
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
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
}
?>		