<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../includes/check_session.php";
include "../db/common_db.php";
include "../aes/AESEncryption.php";
include "../aes/seckey.php";
$linkid=db_connect();

$select_frnd="select usr.UID as UID,usr.UNAME as UNAME,usr.UPHOTO as UPHOTO from friends as frnd inner join users as usr on usr.UID = frnd.FRIENDID  where frnd.UID='".$uid."' and frnd.FSTATUS='1'";
$res_frnd = mysql_query($select_frnd,$linkid);
$num_frnd = mysql_num_rows($res_frnd);
?>

<table width="100%" height="100%" cellpadding="0" cellspacing="0" align="center"  >
<?php
if ($num_frnd > 0)
{
	while ($data_frnd = mysql_fetch_array($res_frnd))
	{
		$frndname = $data_frnd['UNAME'];
		$user_id = $data_frnd['UID'];
		$uphoto = $data_frnd['UPHOTO'];
		if ($uphoto != "")
		{
			$userphoto=$uphoto;
		}
		else
		{
			$userphoto="../images/humanicon.jpg";			
		}
//		$userencryid = md5($user_id);
		
		$userencryid = AESEncryptCtr($user_id, $AES_SEC_KEY, 256);
		?>
			<tr><td><a href="viewfrndprofile.php?usd=<?php echo $userencryid;?>" target="_blank"><img src="<?php echo $userphoto;?>"  width="60" height="60"  /><br/><?php echo $frndname; ?></a></td></tr>
		<?php
	}
} 
?>
</table>