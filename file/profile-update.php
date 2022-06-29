<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='user') {

//inisialisasi variabel
$username = $_POST['username'];
$nama = $_POST['nama'];

//definisi variabel
$tmp_gambar=$_FILES['photo']['tmp_name']; //lokasi gambar di komputer
$photo=$_FILES['photo']['name']; //Variabel nama gambar yang diupload
$jenis_photo=$_FILES['photo']['type'];
$ukuran_photo=$_FILES['photo']['size'];
$folder="photo/$photo"; //folder tujuan upload

$valid_ext = array('jpg','jpeg','JPG','JEPG','png','PNG','gif','GIF','bmp','BMP');
     
if (strlen($photo)>0) {
$ext = pathinfo($photo, PATHINFO_EXTENSION);
if(in_array($ext,$valid_ext)){
$ukuran='500000';
if($ukuran_photo <= $ukuran){
$upload=move_uploaded_file($tmp_gambar,$folder);
mysql_query ("UPDATE login SET photo='$photo' WHERE username='$username'");
if($upload){
	echo "<script>alert('Gambar Berhasil di Update');</script>";
}
else {
	echo "<script>alert('Gambar Tidak di Update');</script>";
}
}else{
echo "<script language='javascript'>alert('Maaf, Ukuran Gambar Adalah Maksimal 500kb.')</script>";
echo "<script>alert('Gambar Gagal di Update.');location.href='main.php?p=profile';</script>";
exit();
}
}else{
echo "<script language='javascript'>alert('Maaf, Hanya file JPG, PNG, GIF atau BMP yang boleh diupload.')</script>";
echo "<script>alert('Gambar Gagal di Update.');location.href='main.php?p=profile';</script>";
exit();
}
}


$sqlSave = "UPDATE login SET 
				nama = '$nama' WHERE username='$username'";								
$querySave = mysql_query($sqlSave);
if($querySave){
	echo "<script>alert('Perubahan Data berhasil disimpan.');location.href='main.php?p=profile';</script>";
	exit();	
}else{
	echo "<script>alert(Perubahan Data Gagal Disimpan.');history.go(-1);</script>";
	exit();
}
}else{
echo '<script language="javascript">alert("Tidak Dapat Akses Data..!!"); document.location="index.php";</script>';
}
?>
