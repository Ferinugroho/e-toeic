<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='admin') {
?>
<br>
<div class="container">		
<fieldset>
<legend>TOEIC Data</legend>
<div align="center">
<a href="main.php?p=toeic-tambah">
<button class="tambah-materi" type="submit"><i class="icon-white icon-plus"></i>Add Toeic Data</button></a>
</div>
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
	$sql_tbldata=("SELECT * FROM toeic");
	$sql_tbldata .= " ORDER BY id_toeic ASC";
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
		<a href="main.php?p=toeic-edit&id=<?php echo $data->id_toeic?>"><button class="edit" type="submit">Edit</button></a>
		<a href="main.php?p=toeic-hapus&id=<?php echo $data->id_toeic?>" onclick="return confirm('Are you sure you want to delete this data?')"><button class="hapus" type="submit">Hapus</button></a>
		</td>
</tr>
<?php 
$i++;
} 
else:  
	echo "NO DATA.";
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
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
}
?>		