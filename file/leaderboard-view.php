<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly!' );
if($_SESSION['level']=='user') {

?>

<!-- services -->
		<div class="container">
			<h3 class="head head2">S<span>Leaderboard <i>Score</i> E-TOEIC</span></h3>
			
			<div class="grid_1 grid_5">
					
<!--End Meeting 1-->
<!--Break-->
<?php
$i=11;
for ($x=1;$x<$i;$x++){

?>	
			<a href="main.php?p=leaderboard&id=meeting<?php echo"$x";?>">
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="cursor:pointer;">
						<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
						<h6>Meeting <?php echo"$x";?></h6>
					</div>
				</div>
			</a>
<?
}
?>		
			<a href="main.php?p=toeic-test">				
				<div class="col-md-8 agileinfo_services_grid">
					<div class="agileinfo_services_grid1" style="cursor:pointer;">
						<span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
						<h6>TOEIC TEST</h6>
					</div>
				</div>
			</a><!--End Toeic-->			
				<div class="clearfix"> </div>
			
		</div>
	</div>
	
<?php 
}else{
header("location:index.php");
}
?>