<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='admin' || $_SESSION['level']=='user') {
	if ($_SESSION['level']=='admin'){ 
?>

<div class="services">
		<div class="container">
			<h3 class="head head2">M<span>Input <i>Meeting </i> Lesson</span></h3>
			
			<div class="agileinfo_services_grids">
<?php
$m=13;
for ($n=1;$n<$m;$n++){
?>			
			<a href="main.php?p=materi-show&id=meeting<?php echo"$n";?>"><!-- href tarok disini -->
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1">
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						<h4>Meeting <?php echo"$n";?></h4>
						<p></p>
					</div>
				</div>
			</a>
<?php
}
?>			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<?php } elseif ($_SESSION['level']=='user'){ ?>	
<!-- services -->
		<div class="container">
			<h3 class="head head2">T<span>Start <i>TOEIC</i> Lesson</span></h3>
			
			<div class="grid_3 grid_5">
				<div class="alert alert-warning" role="alert">
					<strong>Warning!</strong> Please complete the meeting and doing exercises gradually to proceed to the next meeting
				</div>
		
			<div class="agileinfo_services_grids">
<!--Meeting 1-->			
<?php
//panggil data
$sql1="select * from latihan_soal where id_materi ='meeting1' and id_user='$_SESSION[user]'";
$proses1=mysql_query($sql1);
$data1=mysql_fetch_array($proses1);
	if ($data1['status']=='Complete'){	
?>				
			<a href="main.php?p=latihan-view&id=meeting1">
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="cursor:pointer;">
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						<h6>Meeting 1</h6>
						<h4>Meeting 1 is Complete</h4>
					</div>
				</div>
			</a>
<?php
} else { 
?>
			<a href="main.php?p=latihan-show&id=meeting1">
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="cursor:pointer;">
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						<h6>Meeting 1</h6>
						<h4>Meeting 1 is not Complete</h4>
					</div>
				</div>
			</a>
<?php
}
?>		
<!--End Meeting 1-->
<!--Break-->
<!--Meeting 2-15-->
<?php
$i=13;
for ($x=2;$x<$i;$x++){
$y=$x+20;
$z=$x-1;
//panggil data
$sql['$x']="select * from latihan_soal where id_materi ='meeting$z' and id_user='$_SESSION[user]'";
$proses['$x']=mysql_query($sql['$x']);
$data['$x']=mysql_fetch_array($proses['$x']);
	if ($data['$x']['status']=='Complete'){	
//panggil data
$sql['$y']="select * from latihan_soal where id_materi ='meeting$x' and id_user='$_SESSION[user]'";
$proses['$y']=mysql_query($sql['$y']);
$data['$y']=mysql_fetch_array($proses['$y']);
	if ($data['$y']['status']==''){	
?>	
			<a href="main.php?p=latihan-show&id=meeting<?php echo"$x";?>">
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="cursor:pointer;">
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						<h6>Meeting <?php echo"$x";?></h6>
						<h4>Meeting <?php echo"$x";?> is not Complete </h4>
					</div>
				</div>
			</a>
<?php
} elseif ($data['$y']['status']=='Complete'){ 
?>
			<a href="main.php?p=latihan-view&id=meeting<?php echo"$x";?>">
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="cursor:pointer;">
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						<h6>Meeting <?php echo"$x";?></h6>
						<h4>Meeting <?php echo"$x";?> Is Complete</h4>
					</div>
				</div>
			</a>
<?php
} 
?>	
<?php
} else{ 
?>
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="cursor:not-allowed;background:red;">
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						<h6>Meeting <?php echo"$x";?></h6>
						<h4>Please Complete Meeting <?php echo"$z";?></h4>
					</div>
				</div>
<?php
} 
}
?>		
<!--End Meeting 2-15-->
<!--Break-->			
<!--Toeic-->
<?php
//panggil data
$data_t=mysql_fetch_array(mysql_query("select * from latihan_soal 
										where id_user='$_SESSION[user]' and id_materi ='meeting12'")); 
	if ($data_t==true){	
?>									
				<a href="main.php?p=toeic-set">				
				<div class="col-md-12 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="height:214px;cursor:pointer;">
						<span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
						<h4>TOEIC TEST</h4>
						<p>Simulation TOEIC Test</p>
					</div>
				</div>
				</a>
<?php
} else{ 
?>					
				<div class="col-md-12 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="height:214px;cursor:not-allowed;background:red;">
						<h4>TOEIC TEST</h4>
						<span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
						<h4>Please Complete All Meeting</h4>
					</div>
				</div>
<?php
}
?>	
<!--End Toeic-->			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
<?php 
	}else{
	header("location:index.php");
}
}else{
header("location:index.php");
}
?>