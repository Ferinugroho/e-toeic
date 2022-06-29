<?php
session_start();
include ('config/connection.php');
include ('paginator.class.php');
defined("VALIDASI") or die( 'Tidak diperkenankan mengakses file ini secara langsung !' );
if($_SESSION['level']=='admin' || $_SESSION['level']=='user') {
$page=$_GET['p'];
?>
<!DOCTYPE html>
<html>
<head>
<title>E-TOEIC</title>
<link href="images/favicon.ico" rel="shortcut icon" /> 
<!-- Dropzone css -->
<link href="css/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Teaching Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);	
	function hideURLbar(){ window.scrollTo(0,1); } </script>	
	
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/imagehover.css" rel="stylesheet" media="all">
<link type="text/css" rel="stylesheet" href="css/cm-overlay.css" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!--progrees bar-->
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link rel="stylesheet" type="text/css" href="css/custom-bars.css" />
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Capriola' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/animate.min.css" rel="stylesheet"> 
</head>
	
<body>
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="navbar-header navbar-left">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="index.html"><span>E</span> - TOEIC</a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
						<nav class="menu menu--shylock">
							<div class="agileinfo_social_icons">
								<ul class="agileinfo_social_icons1">
									<li><a href="https://www.facebook.com/pages/Politeknik-Negeri-Sriwijaya/104096339925842?fref=ts" class="facebook"></a></li>
									<li><a href="https://twitter.com/kmhs_polsri" class="twitter"></a></li>
									<li><a href="plus.google.com" class="google"></a></li>
								</ul>
							</div>
							
					<ul class="nav navbar-nav">
								<li role="presentation" <?php if($page == 'home') echo 'class="active"';?>><a href="main.php?p=home" class="hvr-bounce-to-bottom">Home</a></li>
						<?php if ($_SESSION['level']=='admin'){ ?>	
								<li role="presentation" <?php if($page == 'upload-view') echo 'class="active"';?>><a href="main.php?p=upload-view" class="hvr-bounce-to-bottom">Upload File</a></li>
								<li role="presentation" <?php if($page == 'course') echo 'class="active"';?>><a href="main.php?p=course" class="hvr-bounce-to-bottom">Course Data</a></li>
								<li role="presentation" <?php if($page == 'toeic') echo 'class="active"';?>><a href="main.php?p=toeic" class="hvr-bounce-to-bottom">Toeic Data</a></li>
								<li role="presentation" <?php if($page == 'forum') echo 'class="active"';?>><a href="main.php?p=forum" class="hvr-bounce-to-bottom">Forum</a></li>
								
						<?php } if ($_SESSION['level']=='user'){ ?>	
								<li role="presentation" <?php if($page == 'course') echo 'class="active"';?>><a href="main.php?p=course" class="hvr-bounce-to-bottom">Course</a></li>
								<li role="presentation" <?php if($page == 'profile') echo 'class="active"';?>><a href="main.php?p=profile" class="hvr-bounce-to-bottom">Profile</a></li>
								<li role="presentation" <?php if($page == 'leaderboard') echo 'class="active"';?>><a href="main.php?p=leaderboard" class="hvr-bounce-to-bottom">Leaderboard</a></li>
								<li role="presentation" <?php if($page == 'forum') echo 'class="active"';?>><a href="main.php?p=forum" class="hvr-bounce-to-bottom">Forum</a></li>
								
						<?php } ?>
								<li><a href="logout.php" class="hvr-bounce-to-bottom">Logout</a></li>
							</ul>
							<div class="clearfix"> </div>
						</nav>
					</div>
				</nav>	
			</div>
		</div>


<?php 
if(!empty($_GET['p'])) {
	if(file_exists("file/$_GET[p].php")) {
	include("file/$_GET[p].php");
	} else {
	echo "Error !<br/>Not Found !!!";
	}
} else {
include 'file/home.php';
}
?>

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-4 w3l_footer_grid">
				<h2><a href="main.php"><span>E</span> - TOEIC</a></h2>
				<p>TOEIC (<i>Test of English for International Communication</i>) is a test of English proficiency for those whose native language 
				   is not English.</p>
			</div>
			<div class="col-md-3 w3l_footer_grid">
				<h3>Address</h3>
				<ul class="w3_address">
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Jl. Srijaya Negara Bukit Besar
					<span>Palembang City, South Sumatera </span><span>Indonesia 30139</span></li>
					<li><i class="glyphicon glyphicon-education" aria-hidden="true"></i><a href="http://www.polsri.ac.id">State Polytechnic Of Sriwijaya</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+62711 353414 -<span>Fax : 62711 355918</span></li>
				</ul>
			</div>
			<div class="col-md-2 w3l_footer_grid">
				<h3>Navigation</h3>
				<ul class="agileinfo_footer_grid_nav">
					<li role="presentation" <?php if($page == 'home') ;?>><a href="main.php?p=home"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Home</a></li>
					<li role="presentation" <?php if($page == 'course') ;?>><a href="main.php?p=course"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Course</a></li>
					<?php if ($_SESSION['level']=='admin'){ 
					echo ""; 
					}if ($_SESSION['level']=='user'){
					?> 
					<li role="presentation" <?php if($page == 'profile');?>><a href="main.php?p=profile"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Profile</a></li>
					<?php } ?>
					<li role="presentation" <?php if($page == 'leaderboard');?>><a href="main.php?p=leaderboard"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Leaderboard</a></li>
					<li role="presentation" <?php if($page == 'forum');?>><a href="main.php?p=forum"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Forum</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3l_footer_grid">
				<h3>Social Media</h3>
				<ul class="agileinfo_social_icons1 agileinfo_social">
					<li><a href="https://www.facebook.com/pages/Politeknik-Negeri-Sriwijaya/104096339925842?fref=ts" class="facebook"></a></li>
					<li><a href="https://twitter.com/kmhs_polsri" class="twitter"></a></li>
					<li><a href="plus.google.com" class="google"></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<div class="w3agile_footer_copy">
				<p>© 2017 E-TOEIC. State Polytechnic Of Sriwijaya</p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script src="js/jquery.tools.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/jquery.cm-overlay.js"></script>
<script>
	$(document).ready(function(){
		$('.cm-overlay').cmOverlay();
	});
</script>

<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<!-- Dropzone Plugin JavaScript -->
<script src="css/dropzone-master/dist/dropzone.js"></script>
<!-- Tinymce Plugin JavaScript -->
<script src="css/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function () {
  
if($("#mymce").length > 0){
 tinymce.init({
   selector: "textarea#mymce",
   theme: "modern",
   height:300,
   plugins: [
   "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
   "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
   "save table contextmenu directionality emoticons template paste textcolor"
   ],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 

 });    
}  
});
</script>
</body>
</html>
<?php 
}else{
header("location:index.php");
}
?>