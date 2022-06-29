<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='user') {
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl_skrng=date("d-m-Y",$tanggal);
$tgl = explode('-',$tgl_skrng);
$ttahun=$tgl[2];
$tbulan=$tgl[1];
$ttanggal=$tgl[0];
$jam_mulai=date("H:i");
$jam_mulai1=date("H:i:s");
$dates1 = date_create($jam_mulai);
date_add($dates1, date_interval_create_from_date_string('2 hours 00 minute 00 seconds'));
$jam_selesai=date_format($dates1, 'H:i:s');
$jam = explode(':',$jam_selesai);
$tjam=$jam[0];
$tmenit=$jam[1];
$tdetik=$jam[2];
?>	  
<div class="container">	
<form name="f1" id="f1" method="post" action="main.php?p=toeic-test"  enctype="multipart/form-data">
<input type="hidden" name="tahun" value="<?php echo $ttahun ?>">
<input type="hidden" name="bulan" value="<?php echo $tbulan ?>">
<input type="hidden" name="tanggal" value="<?php echo $ttanggal ?>">
<input type="hidden" name="jam" value="<?php echo $tjam ?>">
<input type="hidden" name="menit" value="<?php echo $tmenit ?>">
<input type="hidden" name="detik" value="<?php echo $tdetik ?>">
<fieldset>
<span style="float:right;color:blue;"><?php echo "Start Date: <b>".$tgl_skrng."</b> "; echo "| Time <b>". $jam_mulai." "."</b>";?></span>
<br>

	<fieldset>
		<legend style="color:#110e7f;font-size:32px;">Toeic Guidance</legend>

		<ul>
          <li><strong>Guide 1</strong><br>
            <p>Guide content 1.</p></li>
		  <li><strong>Guide 2</strong><br>
		    <p>Guide content 2.</p></li>
		</ul>
	
	</fieldset>

	<center><input type="submit" name="lanjut" class="submit" value="Mulai"></center>
</fieldset>
</form>
</div>
<?php 
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
}
?>