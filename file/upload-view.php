<br>
<div class="container">	
<div align="center">
<a href="main.php?p=upload-tambah"><button class="tambah">Add File</button></a>
</div>
<br>
<fieldset>
<legend><p align="center"><strong>Galeri File</strong></p></legend>
<?php
//buat kelas paginator baru dengan nama $page
	$page = new paginator();
	//atur jumlah baris per halaman
	$page->items_per_page = 24;
	$sql_tbldata=("SELECT * FROM file");
	$page->items_total = mysql_num_rows(mysql_query($sql_tbldata));
	$page->paginate();
	$sql_tbldata .= " $page->limit";
	$query = mysql_query($sql_tbldata);
	echo mysql_error();
	$prevPage = (int)$_GET['page']-1;
	$i = $prevPage*(int)$_GET['ipp']+1;
	$psn=mysql_query($sql_tbldata) or die (mysql_error());
	while($data=mysql_fetch_object($psn)){
$file=$data->file;
$valid_ext = array('jpg','jpeg','JPG','JEPG','png','PNG','gif','GIF','bmp','BMP');
$ext = pathinfo($file, PATHINFO_EXTENSION);
if(in_array($ext,$valid_ext)){
?>
<div class="col-md-4 w3_tab_img_left">
<div class="demo">
	<a class="cm-overlay" href="upload/<?php echo $data->file?>">
	  <figure class="imghvr-shutter-in-out-diag-1"><img src="upload/<?php echo $data->file?>" class="img-responsive" style="width:200px; height:100px;"/>
		<figcaption>
		View Image
		</figcaption>
	  </figure>
	</a>
	kode: upload/<?php echo $data->file?><br>
	<a href="main.php?p=upload-hapus&id=<?php echo $data->id_file?>" onclick="return confirm('Apakah anda yakin akan menghapus file ini?')">
	Delete File
	</a>
</div>
</div>
<?php
}else{
?>
<div class="col-md-4 w3_tab_img_left">
	<audio controls  src="upload/<?php echo $data->file?>"></audio>
	kode: upload/<?php echo $data->file?><br> 
	<a href="main.php?p=upload-hapus&id=<?php echo $data->id_file?>" onclick="return confirm('Apakah anda yakin akan menghapus file ini?')">
	Delete File
	</a>
</div>
<?php
}
}
?>	
<tr>
  <td height="40">  
  <td colspan="11">
		<ul class="pagination pagination-mini">
		  <li><?php echo $page->display_pages();?></li>
	</ul>  </tr>		
</fieldset>
</div>