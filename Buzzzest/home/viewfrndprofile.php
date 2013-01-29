<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];

require "../includes/header.php";
include "../includes/check_session.php";
//include "../db/common_db.php";
include "../includes/encryt_decrypt.php";
//$linkid=db_connect();

$userencid=$_GET['usd'];
$uid = $userencid;
$select_photo="select * from users where UID='".$uid."'";
$res_select_photo=mysql_query($select_photo,$linkid);
$num_select_photo=mysql_num_rows($res_select_photo);
if ($num_select_photo > 0)
{
	$data_info_pro=mysql_fetch_array($res_select_photo);
	$uname = $data_info_pro['UNAME'];
	
	$UACCOUNT=$data_info_pro['UACCOUNT'];
	$UFULLNAME=$data_info_pro['UFULLNAME'];
	$UEMAILID=$data_info_pro['UEMAILID'];
	$UINDUSTRY=$data_info_pro['UINDUSTRY'];
	$UOCCUPATION=$data_info_pro['UOCCUPATION'];	
	$UINTEREST=$data_info_pro['UINTEREST'];

	$UDOB=$data_info_pro['UDOB'];
	$UPLACE=$data_info_pro['UPLACE'];	
	$UPHOTO_val=$data_info_pro['UPHOTO'];
	$UGENDER_val=$data_info_pro['UGENDER'];
	$UDESCRIPTION=$data_info_pro['UDESCRIPTION'];
	$UTAGLINE=$data_info_pro['UTAGLINE'];
	$UTYPE=$data_info_pro['UTYPE'];
	$USPECIALITIES=$data_info_pro['USPECIALITIES'];
	$UMISSION=$data_info_pro['UMISSION'];
	$UFOUNDED=$data_info_pro['UFOUNDED'];
	$UEMPCOUNT=$data_info_pro['UEMPCOUNT'];
	$UBIO=$data_info_pro['UBIO'];
	$UWEBSITE=$data_info_pro['UWEBSITE'];
	if ($UPHOTO_val != "" && $UPHOTO_val != NULL)
	{
		$userpro_photo=$UPHOTO_val;
	}
	else 
	{
		if ($UGENDER_val == 2) {
			$userpro_photo="../images/female.jpg";}
		else if ($UGENDER_val == 1) {
			$userpro_photo="../images/male.jpg"; 
		}else {
			$userpro_photo="../images/humanicon.jpg";	
		}		
	}
}

$sel_updates="select count(*) as CNT from post where UID='".$uid."'";
$res_sel_updates=mysql_query($sel_updates,$linkid);
$data_sel_updates=mysql_fetch_array($res_sel_updates);
$update_count=$data_sel_updates['CNT'];


$sel_friends="select count(*) as CNT from friends where UID='".$uid."' and FSTATUS='1'";
$res_sel_friends=mysql_query($sel_friends,$linkid);
$data_sel_friends=mysql_fetch_array($res_sel_friends);
$friends_count=$data_sel_friends['CNT'];
?>
<div class="content">
<table width="90%" height="90%" cellpadding="0" cellspacing="0" align="left" border="1" >
   
	<tr>
        <td width="100%">
        	<table width="90%" height="100%" cellpadding="0" cellspacing="0" align="left" >
            	<tr><td width="21%">Username </td><td width="79%"><?php echo $uname; ?></td></tr>
                <tr><td>Name </td><td><?php echo $UFULLNAME; ?></td></tr>
                <?php if ($UGENDER_val != "") { ?>
                	<tr><td>Gender </td><td><?php echo $ugender_val; ?> </td></tr>
                <?php } if ($UOCCUPATION != "") {?>
                <tr><td>Occupation </td><td><?php echo $UOCCUPATION; ?></td></tr>
                <?php } if ($UINDUSTRY != "") {?>
                <tr><td>Industry </td><td><?php echo $UINDUSTRY; ?></td></tr>
                <?php } if ($UINTEREST != "") {?>
                <tr><td>Interests </td><td><?php echo $UINTEREST; ?></td></tr>
                <?php } if ($UPLACE != "") { ?>
                <tr><td>Place </td><td><?php echo $UPLACE; ?></td></tr>
                <?php } ?>
            </table>
        </td>
    </tr>
      <tr><td colspan="2">
     	<table width="100%" height="100%" cellpadding="0" cellspacing="0"> 
      	<?php if($UBIO != "" ) { ?>     
            <tr><td width="17%" valign="top">Bio</td>
            <td width="83%"><?php echo $UBIO;?></td></tr>
        <?php } if($UWEBSITE != "" ) { ?>	
			<tr><td width="17%" height="24">Website</td>
            <td width="83%"><?php echo $UWEBSITE; ?></td></tr>
        <?php } if($UEMAILID != "" ) { ?>
        <tr>
            <td width="17%" height="24">Email</td>
            <td width="83%"><?php echo $UEMAILID; ?></td></tr>
        <?php }?>	
      	</table>     
     </td></tr>	
</table>
</div>  
 <div class="sidebar1">
   <div >
   <table width="100%" height="100%" cellpadding="0" cellspacing="0" id="tableborder" >
	
    <tr>
    <td width="13%" valign="top"><img src="<?php echo $userpro_photo?>" width="100" height="100"  /></td>
    <td width="87%" colspan="2" valign="top">
    <table  width="85%" height="80%" cellpadding="0" cellspacing="0" align="center"> 
    <tr><td colspan="4" align="left"><h3><?php echo $uname; ?></h3></td></tr>
     <tr id="trbordertop"><td width="24%" id="tdborderlefttop" align="center" >Updates</td><td width="26%" id="tdbordertop" align="center">Friends</td><td width="31%" id="tdbordertop" align="center" >Followings</td><td width="19%" id="tdborderrighttop" align="center" >Followers</td></tr>
     <tr><td id="tdborderleftbottom" align="center"><strong><?php echo $update_count; ?></strong></td><td id="tdborderbottom" align="center" ><strong><?php echo $friends_count; ?></strong></td><td id="tdborderbottom" align="center" >&nbsp;</td><td id="tdborderrightbottom" align="center">&nbsp;</td></tr>
    </table>   
    </td>
    </tr>    
	</table>
   </div>
    <div id="content_postright">
<table width="100%" height="100%" cellpadding="0" cellspacing="0" id="tableborder" >
	<tr>
    <td width="15%">&nbsp;</td><td width="85%"><b><?php echo $uname;?></b></td><td width="2%"><img src="../images/valid.png"  /></td>
    </tr>
    <tr>
    <td valign="top"><img src="../images/bee2.gif" width="60" height="60"  /></td><td colspan="2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </td>
    </tr>
     <tr>
    <td>&nbsp;</td><td colspan="2">3 hours ago .<a href="">Like</a>.<a href="">Comment</a>.<a href="">Share</a>.
    <a href="">Delete</a> </td>
    </tr>
     
</table>
</div>
  <!-- end .sidebar1 --></div>
  
