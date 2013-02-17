<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];

require "../includes/frnds_viewheader.php";
include "../includes/check_session.php";
//include "../db/common_db.php";
include "../aes/AESEncryption.php";
require "../includes/phpfunctions.php";
include "../aes/seckey.php";
//$linkid=db_connect();
?>
<script src="../js/home.js" type="application/javascript" >
</script>

<!-- stylesheet for light box for photos in profile.page -->
<link rel="stylesheet" type="text/css" href="../css/lightbox/jquery.lightbox-0.5.css" />
<!-- end of stylesheet -->    

<!-- script for light box for photos in profile.page 
<script type="text/javascript" src="js/lightbox/jquery.js"></script>-->
<script type="text/javascript" src="../js/lightbox/jquery.lightbox-0.5.js"></script>
<!-- end of scripts -->  

<script type="text/javascript">

    $(function() {
        $('#gallery a').lightBox();
    });
</script>

<style type="text/css" >

	/* jQuery lightBox plugin - Gallery style */
	#gallery {
		width: 600px;
	}
	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #3e3e3e;
		border-width: 5px 5px 20px;
	}
	#gallery ul a:hover img {
		border: 5px solid #fff;
		border-width: 5px 5px 20px;
		color: #fff;
	}
	#gallery ul a:hover { 
		color: #fff; 
	}
	</style>
<?php

$userencid=$_GET['usd'];
$uid = AESDecryptCtr($userencid , $AES_SEC_KEY, 256);

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


//$sel_friends="select * from friends where UID='".$uid."' and FSTATUS='1'";
$sel_friends="select usr.UID as UID,usr.UNAME as UNAME,usr.UPHOTO as UPHOTO from friends as frnd inner join users as usr on usr.UID = frnd.FRIENDID  where frnd.UID='".$uid."' and frnd.FSTATUS='1'";
$res_sel_friends=mysql_query($sel_friends,$linkid);
$num_sel_friends = mysql_num_rows($res_sel_friends);
$friends_count=$num_sel_friends;
?>
<div class="content">
<a  href="#" onclick="fnchangefrnddiv('frndinfo')">Information</a>&nbsp;&nbsp;
<a  href="#" onclick="fnchangefrnddiv('frndupdates')">Updates</a>&nbsp;&nbsp;
<a  href="#" onclick="fnchangefrnddiv('frndlist')" >Friends</a>&nbsp;&nbsp;
<a  href="#" onclick="fnchangefrnddiv('frndphotos')" >Photos</a>

<div id="frndinfo">
<table width="90%" height="90%" cellpadding="0" cellspacing="0" align="left" border="1" >
   	<tr>
        <td width="100%">
        	<table width="90%" height="100%" cellpadding="0" cellspacing="0" align="left" >
            	<tr><td width="21%">Username </td><td width="79%"><?php echo $uname; ?></td></tr>
                <tr><td>Name </td><td><?php echo $UFULLNAME; ?></td></tr>
                <?php if ($UGENDER_val != "") { ?>
                	<tr><td>Gender </td><td><?php echo $UGENDER_val; ?> </td></tr>
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

<div id="frndupdates">
<?php
$select="select POSTID,POST,UID,POSTDATE,POSTTIME from post where UID='".$uid."' and PSTATUS=1 order by POSTID DESC";
$res_select=mysql_query($select,$linkid);
$num_select=mysql_num_rows($res_select);
if ($num_select > 0)
{
$num_count=1;
	
	while ( $data_select = mysql_fetch_array($res_select) )
	{
		$post=$data_select['POST'];
		$postid=$data_select['POSTID'];
		$POSTDATE=$data_select['POSTDATE'];
		$POSTTIME=$data_select['POSTTIME'];
		$post_time=explode(" ",$POSTTIME);
		$posttimeval=$post_time[1];
		$user_select="select UPHOTO from users where UID='".$uid."'";
		$res_userselect=mysql_query($user_select,$linkid);
		$data_userselect=mysql_fetch_array($res_userselect);
		$uphoto=$data_userselect['UPHOTO'];
		if ($uphoto != "")
		{
			$userphoto=$uphoto;
		}
		else
		{
			$userphoto="../images/humanicon.jpg";			
		}
		
			//code for shares
		$select_shared="select * from share where POSTID='".$postid."'";
		$res_select_shared=mysql_query($select_shared,$linkid);
		$num_select_shared=mysql_num_rows($res_select_shared);
		
		// end of shares
		
		// code for likes
		$select_liked="select * from likes where POSTID='".$postid."'";
		$res_select_liked=mysql_query($select_liked,$linkid);
		$num_select_liked=mysql_num_rows($res_select_liked);
	
		//end of likes
		
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$curtime=date('Y-m-d H:i:s');
		
		$post_timeval =date_diffval($POSTTIME, $curtime);

	?>
     
         <table width="100%" align="left" height="100%" cellpadding="0" cellspacing="0" id="tableborder" >
	<tr>
      <td width="15%">&nbsp;</td>
      <td width="85%"><b><?php echo $uname;?></b></td><td width="2%"></td>
    </tr>
    <tr>
    <td valign="top"><img src="<?php echo $userphoto;?>"  width="60" height="60"  /></td><td colspan="2">
	<?php echo $post;?>

    </tr>
    <?php
    //code for comments
		$sel_com="Select * from comments where POSTID='".$postid."' order by CMTID asc ";
		$res_sel_com=mysql_query($sel_com,$linkid);
		$num_rows_compost=mysql_num_rows($res_sel_com);	
		
		if($num_rows_compost > 0)
		{	
			$num_com_count=1;
			while( $data_sel_com=mysql_fetch_array($res_sel_com))
			{
				$comid=$data_sel_com['CMTID'];
				$comuid=$data_sel_com['UID'];
				$ctext=$data_sel_com['CTEXT'];
				$ctime=$data_sel_com['CTIME'];
				
				$select_comuser="select UPHOTO,UNAME from users where UID='".$comuid."'";
				$res_comuser=mysql_query($select_comuser,$linkid);
				$data_comuser=mysql_fetch_array($res_comuser);
				$comuphoto=$data_comuser['UPHOTO'];
				$cuname=$data_comuser['UNAME'];
				if ($comuphoto != "")
				{
					$comuserphoto=$comuphoto;
				}
				else
				{
					$comuserphoto="../images/humanicon.jpg";			
				}
		?>
			<tr>
				<td>&nbsp;</td>
				<td>
				<table width="100%" height="100%" cellpadding="0" cellspacing="0" >
					<tr>
					  <td width="13%"><input type="hidden" name="totalcom" id="totalcom" value="<?php echo $num_rows_compost; ?>" /></td><td width="87%"><b><?php echo $cuname;?></b></td>
                      
					</tr>
					<tr>
						<td valign="top"><img src="<?php echo $comuserphoto;?>"  width="40" height="40"  /></td>
                        <td colspan="2">
                        <?php echo $ctext;?>
                      	                         
                    </td>
					</tr>
				</table>
				</td>
			</tr>
		<?php
			$num_com_count++;
			}
		?>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2"><?php echo $post_timeval; ?> 
		</td>
			</tr>
			<tr>   
			
		</tr>
		<?php
		} else 
		{
			?>
			 <tr>
			<td>&nbsp;</td><td colspan="2"><?php echo $post_timeval; ?></td>  </tr>
			<?php
			}
		?>
</table>
<?php	
 $num_count++;
	
	}
}
?>

</div>

<div id="frndlist">
<table  width="100%" height="100%" cellpadding="0" cellspacing="0" id="tableborder">
<?php
if ($num_sel_friends > 0)
{
	while ($data_frnd = mysql_fetch_array($res_sel_friends))
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
		$userencryid = AESEncryptCtr($user_id, $AES_SEC_KEY, 256);
		?>
			<tr><td><a href="viewfrndprofile.php?usd=<?php echo $userencryid;?>" target="_blank"><img src="<?php echo $userphoto;?>"  width="60" height="60"  /><br/><?php echo $frndname; ?></a></td></tr>
		<?php
	}
} 
?>
</table>
</div>

<div id="frndphotos">
<div id="gallery">

<br/>
<ul>
  
   <?php
     $count=1;
    foreach(glob("../uploads/".$uid."/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG}", GLOB_BRACE) as $images)
    { ?>
      <li>
        <a href="<? echo $images;?>" title="">
            <img src="<? echo $images;?>" width="100" height="100" alt="" />
        </a>
     </li>
    
    <?php 
    if($count%4==0)
            echo "<ul>";
        $count++; }?>
</ul>
</div>
</div>

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
  
