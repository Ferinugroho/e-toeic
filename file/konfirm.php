<?php
   include "connection.php";
$sql    = "SELECT * FROM aktivasi_email WHERE kode_verifikasi='$_GET[kode]'";
$hasil  = mysql_query($sql);
$jumlah = mysql_num_rows($hasil);

// Apabila kode verifikasi ditemukan
if ($jumlah==1){
  $data=mysql_fetch_array($hasil);

  // Masukkan data ke tabel user
  $sql2="INSERT INTO login(email, username, password)
  VALUES('$data[email]', '$data[username]',
  '$data[password]')";
  $hasil2=mysql_query($sql2);

  // Apabila data sudah sukses diinputkan ke tabel user
  if ($hasil2){
    echo "Account Anda telah diaktifkan";
    
    // Hapus data pendaftar tersebut di tabel temp
 mysql_query("DELETE FROM aktivasi_email WHERE kode_verifikasi='$_GET[kode]'");
  }
}
else {
  echo "verifikasi gagal";
}
?>
