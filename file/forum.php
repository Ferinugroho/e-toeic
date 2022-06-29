<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='admin' || $_SESSION['level']=='user') {
?>
<br>
<div class="container">
      <!--.row-->
      <div class="row">
        <div class="col-md-12"> 
          <div class="panel panel-info">
            <div class="panel-heading">Discussion Forum</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
              <div class="panel-body">
                  <form name="f1" id="f1" method="post" action="main.php?p=forum-simpan" enctype="multipart/form-data">
				  <input type="hidden" name="username" value="<?php echo $_SESSION['user']?>">
              <div class="form-body">
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
			<div class="scroll-komentar1">
				<div class='inner-komentar1'>
			  <?php
				$i=1;  
				$sql_tbldata1=("SELECT login.username as username,
												chat.tanggal as tanggal,chat.jam as jam,chat.chat as chat
										FROM chat,login 
											where login.username=chat.username order by chat.jam Desc");
				$psn1=mysql_query($sql_tbldata1) or die (mysql_error());
				while($data1=mysql_fetch_object($psn1)){
				$username=strtoupper($data1->username);
				$chat=$data1->chat;
				$date1 = date_create($data1->tanggal);
				$tanggal1=date_format($date1, 'd M Y');
				$date2 = date_create($data1->jam);
				$jam=date_format($date2, 'H:i');
				
			  ?>
			  <fieldset style="border:0px;">
				<font style="color:blue;font-size:20px;float:left;font-family:Jokerman;"><?php echo $username ?> &nbsp; </font>
				<font style="color:green;font-size:11px;float:left;"><?php echo  $tanggal1.'&nbsp/&nbsp' ?></font>
				<font style="color:green;font-size:9px;float:left;"><?php echo $jam ?></font>
				<br>
				<font style="font-size:18px;float:left;font-family:Monotype Corsiva;"><?php echo nl2br($chat) ?></font>
			  </div><hr>
			  </fieldset>
			  <?php
			  }
			  ?>
				</div>
			</div>
				  <div class="col-md-6">
                    <div class="form-group">
                      <textarea id="chat" name="chat" class="form-control" placeholder="Add a comment..."></textarea>
					 </div>
                  </div>
			  <div class="col-md-8" style="float:right;">
			  <div class="form-group">
                <button type="submit" class="btn btn-primary">&nbsp; Send &nbsp;</button>
                <a href="main.php?p=home"><button type="button" class="btn btn-danger">Cancel</button></a>
              </div>
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
