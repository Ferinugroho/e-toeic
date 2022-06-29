<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='user') {
$data_user=mysql_fetch_array(mysql_query("select * from login where username='$_SESSION[user]'")); 
$data_badge=mysql_fetch_array(mysql_query("select * from leaderboard where id_user='$_SESSION[user]' order by id_leaderboard desc limit 1")); 
//panggil data
$sql_xp="select * from latihan_soal where id_user='$_SESSION[user]' order by id_soal_materi desc limit 1";
$proses_xp=mysql_query($sql_xp);
$data_xp=mysql_fetch_array($proses_xp);
	if ($data_xp['id_materi']=='meeting1' and $data_xp['status']=='Complete'){
	$xp='8%';
	$meeting='First';
	}elseif ($data_xp['id_materi']=='meeting2' and $data_xp['status']=='Complete'){
	$xp='16%';
	$meeting='Second';
	}elseif ($data_xp['id_materi']=='meeting3' and $data_xp['status']=='Complete'){
	$xp='24%';
	$meeting='Third';
	}elseif ($data_xp['id_materi']=='meeting4' and $data_xp['status']=='Complete'){
	$xp='32%';
	$meeting='Fourth';
	}elseif ($data_xp['id_materi']=='meeting5' and $data_xp['status']=='Complete'){
	$xp='40%';
	$meeting='Fiveth';
	}elseif ($data_xp['id_materi']=='meeting6' and $data_xp['status']=='Complete'){
	$xp='50%';
	$meeting='Sixth';
	}elseif ($data_xp['id_materi']=='meeting7' and $data_xp['status']=='Complete'){
	$xp='58%';
	$meeting='Seventh';
	}elseif ($data_xp['id_materi']=='meeting8' and $data_xp['status']=='Complete'){
	$xp='66%';
	$meeting='Eighth';
	}elseif ($data_xp['id_materi']=='meeting9' and $data_xp['status']=='Complete'){
	$xp='74%';
	$meeting='Nineth';
	}elseif ($data_xp['id_materi']=='meeting10' and $data_xp['status']=='Complete'){
	$xp='82%';
	$meeting='Tenth';
	}elseif ($data_xp['id_materi']=='meeting11' and $data_xp['status']=='Complete'){
	$xp='90%';
	$meeting='Eleventh';
	}elseif ($data_xp['id_materi']=='meeting12' and $data_xp['status']=='Complete'){
	$xp='100%';
	$meeting='Tweleveth';
	}else{
	$xp='0%';
	$meeting='None';
	}				
?>
<br>
<div class="container">
      <!--.row-->
      <div class="row">
        <div class="col-md-12"> 
          <div class="panel panel-info">
            <div class="panel-heading"> Profile</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
              <div class="panel-body">
          <form name="f1" id="f1" method="post" action="main.php?p=profile-update" enctype="multipart/form-data">
				  <input type="hidden" name="username" value="<?php echo $_SESSION['user']?>">
              <div class="form-body">
                <hr>
                <div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-4">
								<?php echo "<img style=width:100%;height:210px;border-radius:20px; src = photo/$data_user[photo]>";?>
								<input type="file" name="photo" >
							</div>
							<div class="col-md-6">
								<div class="form-body">
									<div class="row">
										<div class="form-group">
										Name : <input type="text" name="nama" value="<?php echo $data_user['nama'] ?>" class="form-control">
										</div>
										<div class="form-group">
										Meeting : <?php echo $meeting ?>
										</div>
										<div class="form-group">
										XP :
										<div class="progress progress-striped active">
											<div class="progress-bar progress-bar-primary" style="width:<?php echo $xp?>;height:50px;">
											<span><?php echo $xp?> Complete</span>
											</div>
										</div>
										 <div align="center">
										  <div class="form-group">
											<button type="submit" class="btn btn-primary">&nbsp; Update &nbsp;</button>
											<a href="main.php?p=home"><button type="button" class="btn btn-danger">Cancel</button></a>
										  </div>
										  </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<?php 
								if(!empty($data_badge['badge'])){
								echo "<div align=center><img style=width:50%;border-radius:20px; src = badge/$data_badge[badge]></div>";
								}else{
								echo "";
								}
								?>
							</div>
						</div>
					</div>
                </div>
           </form>
              </div>
            </div>
          </div>  
        </div>
      </div>
      <!--./row-->
	</div>
</div>	
<br>
<?php
}else{
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
exit();
}
?>
