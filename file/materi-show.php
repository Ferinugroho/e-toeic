<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='admin') {
?>
<br>
<div class="container">		
<fieldset>
<legend>Data Materi</legend>
<?php
//panggil data
$sql="select * from materi where id_materi ='$_GET[id]'";
$proses=mysql_query($sql);
$data=mysql_fetch_array($proses);
	$kode = mysql_num_rows($proses);
	if ($kode==''){	
?>	
<div align="center">
<a href="main.php?p=materi-tambah&id=<?php echo $_GET['id'] ?>">
<button class="tambah-materi" type="submit"><i class="icon-white icon-plus"></i>Add Materi</button></a>
</div>
<?php
} else { 
?>
<div style="text-align:justify;"><?php echo $data['isi_materi']?></div>
<div align="center">
<a href="main.php?p=materi-edit&id=<?php echo $_GET['id'] ?>">
<button class="edit-materi" type="submit"><i class="icon-white icon-plus"></i>Edit Materi</button></a>	
</div>
<?php
}
?>

<table width="100%">
  <tr>
<td style="text-align:right;">
<?php
//panggil data
$sql="select * from materi where id_materi ='$_GET[id]'";
$proses=mysql_query($sql);
$data=mysql_fetch_array($proses);
	$kode = mysql_num_rows($proses);
	if ($kode==''){	
	echo"";
	}else{
?>	
<a href="main.php?p=soal-materi-tambah&id=<?php echo $_GET['id'] ?>"><button class="tambah" type="submit"><i class="icon-white icon-plus"></i>Add Lesson Materi</button></a>
	<?php
	}
	?>
</td>
  </tr>
</table>
<table width="100%" class="tabel">
  <tr class="tr">
    <th width="4%" rowspan="2" class="th">No</th>
    <th width="28%" rowspan="2">Questions</th>
    <th colspan="4">Answer</th>
    <th width="13%" rowspan="2">Key</th>
    <th width="11%" rowspan="2">Action</th>
  </tr>
  <tr class="tr1">
    <th width="14%">A</th>
    <th width="12%">B</th>
    <th width="12%">C</th>
    <th width="12%">D</th>
  </tr>

<?php
//buat kelas paginator baru dengan nama $page
	$page = new paginator();
	//atur jumlah baris per halaman
	$page->items_per_page = 10;
	$sql_tbldata=("SELECT * FROM soal_materi where id_materi ='$_GET[id]'");
	$sql_tbldata .= " ORDER BY id_soal_materi ASC";
	$page->items_total = mysql_num_rows(mysql_query($sql_tbldata));
	$page->paginate();
	$sql_tbldata .= " $page->limit";
	$query = mysql_query($sql_tbldata);
	echo mysql_error();
	$prevPage = (int)$_GET['page']-1;
	$i = $prevPage*(int)$_GET['ipp']+1;
	$psn=mysql_query($sql_tbldata) or die (mysql_error());
	if(mysql_num_rows($psn) > 0):	
	while($data=mysql_fetch_object($psn)){
?>
 <tr class="tr2" valign="top">
    <td align="center"><?php echo $i;?>.</td>
    <td><?php echo $data->pertanyaan?></td>
    <td align="center"><?php echo $data->a?></td>
    <td align="center"><?php echo $data->b?></td>
    <td align="center"><?php echo $data->c?></td>
    <td align="center"><?php echo $data->d?></td>
    <td align="center"><?php echo $data->kunci_jawaban?></td>
		<td align="center">
		<a href="main.php?p=soal-materi-edit&id1=<?php echo $data->id_materi?>&id2=<?php echo $data->id_soal_materi?>"><button class="edit" type="submit">Edit</button></a>
		<a href="main.php?p=soal-materi-hapus&id1=<?php echo $data->id_materi?>&id2=<?php echo $data->id_soal_materi?>" onclick="return confirm('Are You Sure, You Want To Delete This Data?')"><button class="hapus" type="submit">Delete</button></a>
		</td>
</tr>
<?php 
$i++;
} 
else:  
	echo "EMPTY DATA.";
endif;
?>
<tr class="tr"> 
  <td colspan="8">
		<ul class="pagination pagination-mini">
		  <?php echo $page->display_pages();?>
		</ul>  
  </td>
  </tr>
</table>
</fieldset>
</div>
</div>
<?php 
}else{
echo '<script language="javascript">alert("Can not Access Data..!!"); document.location="index.php";</script>';
}
?>		