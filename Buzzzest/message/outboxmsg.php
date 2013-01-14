<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../includes/check_session.php";
include "../db/common_db.php";
$linkid=db_connect();

$select_msgsent="select * from message where UID='".$uid."'";
$res_msgsent = mysql_query($select_msgsent,$linkid);
$num_msgsent=mysql_num_rows($res_msgsent);

if ($num_msgsent > 0)
{ ?>
	 <table width="100%" height="100%" cellpadding="0" cellspacing="0"  >
	 <?php
	 	while ( $data_msgsent = mysql_fetch_array($res_msgsent))
		{
			$TOMSGID= $data_msgsent['TOMSGID'];
			$msg= $data_msgsent['MSG'];
			$user_select="select UNAME from users where UID='".$TOMSGID."'";
			$res_userselect=mysql_query($user_select,$linkid);
			$data_userselect=mysql_fetch_array($res_userselect);
			$username=$data_userselect['UNAME'];
			?>
	
			 <tr ><td  ><img src="../images/sentmsg.jpg" width="28" height="20"  /><b> <?php echo $username.":"; ?></b> <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msg;?>  <br/>
				</td></tr>
			<?php
		}
	 ?>
	 </table>
<?php
}
?>