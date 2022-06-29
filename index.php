<!DOCTYPE html>
<html>
<head>
<title>E-TOEIC</title>
<link href="images/favicon.ico" rel="shortcut icon" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Credit Login / Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->
</head>
<body>
<h1>Login/Register Form E-TOEIC</h1>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<h2>Login Form</h2>
			<form action="config/cek_login.php" method="post">
				<div class="form-sub-w3">
					<input type="text" name="username" placeholder="Username " required="" />
				<div class="icon-w3">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				</div>
				<div class="form-sub-w3">
					<input type="password" name="password" placeholder="Password" required="" />
				<div class="icon-w3">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</div>
				</div>
				<p class="p-bottom-w3ls">Are you new member?<a class="w3_play_icon1" href="#small-dialog1">  Register here</a></p>
				
				<div class="submit-w3l">
					<input type="submit" value="Login">
				</div>
			</form>
		</div>
<!--//form-ends-here-->
</div>
<div id="small-dialog1" class="mfp-hide">
					<div class="contact-form1">
										<div class="contact-w3-agileits">
										<h3>Register Form E-TOEIC</h3>
											<form action="config/register.php" method="post">
												<div class="form-sub-w3ls">
													<input name="email" placeholder="Email" class="mail" type="email" required="">
													<div class="icon-agile">
														<i class="fa fa-envelope-o" aria-hidden="true"></i>
													</div>
												</div>
												<div class="form-sub-w3ls">
													<input name="user" placeholder="Username"  type="text" required="">
													<div class="icon-agile">
														<i class="fa fa-user" aria-hidden="true"></i>
													</div>
												</div>
												<div class="form-sub-w3ls">
													<input name="pass" placeholder="Password"  type="password" required="">
													<div class="icon-agile">
														<i class="fa fa-unlock-alt" aria-hidden="true"></i>
													</div>
												</div>
												<!--div class="form-sub-w3ls">
													<input placeholder="Confirm Password"  type="password" required="">
													<div class="icon-agile">
														<i class="fa fa-unlock-alt" aria-hidden="true"></i>
													</div>
												</div-->
											</div>
											<!--div class="login-check">
								 			 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><p>I Accept Terms & Conditions</p></label>
											</div-->
										<div class="submit-w3l">
											<input type="submit" value="Register">
										</div>
										</form>
					</div>	
				</div>



				<!--aktifasi email-->
 <?
include "connection.php";
if($_POST[login]){
//membuat kode random
$kode = md5(uniqid(rand()));
mysql_query("INSERT INTO aktivasi_email VALUES('kode','$_POST[email]',
'$_POST[username]','$_POST[password]')");
$kepada=$_POST[email];
$judul  ="Aktivasi Account";
$pengirim ="From : admin@e-toeic.site \n";
$pengirim  .="Content-type: text/html \r\n";
$isi  ="Klik link dibawah ini untuk aktivasi : <br>";

//alamat kita meletakan scrip konfirm.php
$isi .="<a href='http://localhost/konfirm.php?kode=$kode'>
http://localhost/konfirm.php?kode=$kode</a>";
mail($kepada,$judul,$pesan,$dari);
echo "Kami telah mengirim link konfirmasi,silahkan cek e-mail anda";
}
?>


<!--akhir aktifasi email-->

<!-- copyright -->
	<div class="copyright w3-agile">
		<p> © 2017 E-TOEIC. State Polytechnic Of Sriwijaya</a></p>
	</div>
	<!-- //copyright --> 
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
</body>
</html>


