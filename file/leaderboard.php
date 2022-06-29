<?php
defined("VALIDASI") or die( 'Not allowed to access this file directly !' );
if($_SESSION['level']=='user') {
?>
		<div class="container">
			<h3 class="head head2">S<span>Leaderboard <i>Score</i> E-TOEIC</span></h3>
<table width="100%" class="tabel">
  <tr class="tr">
    <th width="5%">No</th>
    <th width="35%">User</th>
    <th width="40%">Test</th>
    <th width="10%">Score</th>
    <th width="10%">Badge</th>
  </tr>
<?php
$i=1;  
$sql_tbldata=("SELECT * from leaderboard order by tipe_test desc, skor desc");					
$psn=mysql_query($sql_tbldata) or die (mysql_error());
while($data=mysql_fetch_object($psn)){

?>
 <tr class="tr2" valign="top">
    <td align="center"><?php echo $i;?>.</td>
    <td align="center"><?php echo strtoupper($data->id_user)?></td>
    <td align="center"><?php echo strtoupper($data->tipe_test)?></td>
    <td align="center"><?php echo $data->skor?></td>
    <td align="center"><?php echo "<img width=25px; height=25px; src = badge/$data->badge>";?></td>
 </tr>
<?php 
$i++;
} 
?> 
</table>	
</div>
<br>		
<?php 
}else{
echo '<script language="javascript">alert("Can not access data..!!"); document.location="index.php";</script>';
}
?>