<?php
include "connection.php";
$user= $_POST['user'];
$pass= $_POST['pass'];
$email= $_POST['email'];

if(empty($user)):
	echo "<script>alert('Maaf,Periksa Username anda.');history.go(-1);</script>";
elseif(empty($pass)):
	echo "<script>alert('Maaf,Periksa Password anda.');history.go(-1);</script>";	
	exit();
elseif(empty($email)):
	echo "<script>alert('Maaf,Email anda.');history.go(-1);</script>";	
	exit();	
endif;
//panggil data
$sql="select * from login where username ='$user'";
$proses=mysql_query($sql);
$data=mysql_fetch_array($proses);
	$kode = mysql_num_rows($proses);
	if ($kode==''){	

$query=mysql_query("insert into login set username='$user', password='$pass', email='$email', level='user'");
	//list($username)=mysql_fetch_row($query);
	if($query)  :
		//$_SESSION['sesiuser']=$user;
		echo "<script>alert('Registration succeed! Please login first.'); location.href='../index.php';</script>";	
	else  : 
	echo "<script>alert('Registration failed!'); window.history.go(-1);</script>";
	endif;
} else { 
echo "<script>alert('Registration failed! Username Alredy Exist.');window.history.go(-1);</script>";
	exit();
}

?>