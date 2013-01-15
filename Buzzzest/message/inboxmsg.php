<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../includes/check_session.php";
include "../db/common_db.php";
$linkid=db_connect();
?>
<script type="application/javascript">
function fnshow_hidemsg(stringval)
{
		url='changemsgstatus.php';
		data=new Object();
		data['msgid']=stringval;
		$.ajax({
		  type: 'POST', // type of request either Get or Post
		  url: url, // Url of the page where to post data and receive response 
		  data: data, // data to be post
		  success: function(data){ 			
		 	 $("#inbox").load("./inboxmsg.php");	 
		  } //function to be called on successful reply from server
		});
}
</script>
<?php
$select_msgsent="select * from message where TOMSGID='".$uid."'";
$res_msgsent = mysql_query($select_msgsent,$linkid);
$num_msgsent=mysql_num_rows($res_msgsent);

if ($num_msgsent > 0)
{ ?>
	 <table width="100%" height="100%" cellpadding="0" cellspacing="0"  >
	 <?php
	 	while ( $data_msgsent = mysql_fetch_array($res_msgsent))
		{
			$FROMID = $data_msgsent['UID'];
			$msg = $data_msgsent['MSG'];
			$MSGID = $data_msgsent['MSGID'];
			$MSGSTATUS= $data_msgsent['MSGSTATUS'];
			$user_select="select UNAME from users where UID='".$FROMID."'";
			$res_userselect=mysql_query($user_select,$linkid);
			$data_userselect=mysql_fetch_array($res_userselect);
			$username=$data_userselect['UNAME'];
			if ($MSGSTATUS == 0)
			{
			?>
				<tr ><td  ><a href="#" style="text-decoration:none;"
				  onclick="fnshow_hidemsg('<?php echo $MSGID;  ?>'); return false">
				  <img src="../images/unreadmsg1.jpg" width="28" height="20"  /><b> <?php echo $username; ?></b> </a> <br/>
				
				</td></tr>
			<?php
			}
			
			
			if ($MSGSTATUS == 1)
			{ 
			?>
				<tr ><td  ><img src="../images/readmsg.jpg" width="28" height="20"  /><b> <?php echo $username.":"; ?></b> <br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msg;?>  <br/>
				</td></tr>
			<?php
			}
			
		}
	 ?>
	 </table>
<?php
}
?>