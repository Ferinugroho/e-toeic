  <?php
      include'connection.php';
      session_start();


if(empty($_POST['username'])):
	echo "<script>alert('Maaf,Periksa Username anda.');history.go(-1);</script>";
elseif(empty($_POST['password'])):
	echo "<script>alert('Maaf,Periksa Password anda.');history.go(-1);</script>";	
	exit();
endif;
	  
$perintah_query=mysql_query(" SELECT * 
FROM login
WHERE username = '$_POST[username]'
AND password = '$_POST[password]'"); 

	if($hasil_cek=mysql_num_rows($perintah_query))
	{
	//sukess
	$datauser=mysql_fetch_array($perintah_query);
	$_SESSION['user'] = $_POST['username'];
	$_SESSION['level'] = $datauser['level'];
	echo $_SESSION['level'];

            header("location:../main.php");
            }else{
             echo "<script>alert('Maaf, Username atau Password Anda Salah!');history.go(-1);</script>";

            }
           
    ?>