<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../includes/check_session.php";
include "../db/common_db.php";
require "../includes/phpfunctions.php";
$linkid=db_connect();
?> 
<script type="application/javascript">
$(document).ready(function() {
	
	$('.fancybox').fancybox();
	
	var posttotal= $('#totalpost_home').val();
	var comtotal=  $('#totalcom_home').val();
	comtotal=parseInt(comtotal, 10) + parseInt(posttotal, 10); //comtotal+posttotal
	var i;
	var j;
	for (i=1;i<=posttotal;i++)
	{		
		$('#comment_posthome'+i).css("display","none"); 
		$('#deletehome'+i).css("display","none"); 
	}
	
	for (j=1;j<=comtotal;j++)
	{		
		$('#comment_posthomecom'+j).css("display","none"); 
		$('#deletehomecom'+j).css("display","none"); 
	}
	
});

function fnshow_hidedivhome(stringval)
{
	var posttotal= $('#totalpost_home').val();
	var i;
	for (i=1;i<=posttotal;i++)
	{		
		$('#comment_posthome'+i).css("display","none"); 
		$('#deletehome'+i).css("display","none"); 
		$('#'+stringval).css("display","block");
	}
}

function fnshow_hidedivhomecom(stringval)
{
	var posttotal= $('#totalpost_home').val();
	var comtotal=  $('#totalcom_home').val();
	comtotal=parseInt(comtotal, 10) + parseInt(posttotal, 10); //comtotal+posttotal
	var j;
	for (j=1;j<=comtotal;j++)
	{		
		$('#comment_posthomecom'+j).css("display","none");
		$('#deletehomecom'+j).css("display","none"); 
		$('#'+stringval).css("display","block");
	}
	
}

function fnsavecommentshome(userid,postid,txtid)
{
	var post_value=jQuery.trim($('#'+txtid).val());
	if (post_value != "" || post_value.match(/(\w+\s)*\w+[.?!]/) )
	{
		url='save_comments.php';
		data=new Object();
		data['txtcompost']=$('#'+txtid).val();
		data['userid']=userid;
		data['postid']=postid;
		$.ajax({
		  type: 'POST', // type of request either Get or Post
		  url: url, // Url of the page where to post data and receive response 
		  data: data, // data to be post
		  success: function(data){ 
			 alert (data);
		 	 $('#content_post_home').load('user_home_post.php');	
		  } //function to be called on successful reply from server
		});
	}
}

function fnprofdeletehome(user_id,post_id,string_val)
{	
	if (user_id != "" && post_id !="" && string_val == "Yes")
	{
		url='deletehome_profuser.php';
		data=new Object();
		data['user_id']=user_id;
		data['post_id']=post_id;
		$.ajax({
		  type: 'POST', // type of request either Get or Post
		  url: url, // Url of the page where to post data and receive response 
		  data: data, // data to be post
		  success: function(data){ 
			 alert (data);
		 	 $('#content_post_home').load('user_home_post.php');	
		  } //function to be called on successful reply from server
		});
	}
	else if ( string_val == "No")
	{
		$('#content_post_home').load('user_home_post.php');	
	}
}


function fnprofsharehome(usrid,pst_id,strval,action)
{
	if (usrid != "" && pst_id !="" && strval == "Yes" && action != "")
	{
		url='share_post.php';
		data=new Object();
		data['user_id']=usrid;
		data['post_id']=pst_id;		
		data['action']=action;
		
		$.ajax({
		  type: 'POST', // type of request either Get or Post
		  url: url, // Url of the page where to post data and receive response 
		  data: data, // data to be post
		  success: function(data){
			 alert (data);
		 	 $('#content_post_home').load('user_home_post.php');	
		  } //function to be called on successful reply from server
		});
	}
}


function fnproflikehome(usrid_val,pst_id_val,str_value,action)
{
	if (usrid_val != "" && pst_id_val !="" && str_value == "Yes" && action != "")
	{
		url='like_post.php';
		data=new Object();
		data['usrid_val']=usrid_val;
		data['pst_id_val']=pst_id_val;
		data['action']=action;
		
		$.ajax({
		  type: 'POST', // type of request either Get or Post
		  url: url, // Url of the page where to post data and receive response 
		  data: data, // data to be post
		  success: function(data){
			 alert (data);
		 	 $('#content_post_home').load('user_home_post.php');	
		  } //function to be called on successful reply from server
		});
	}
}

</script>


<?php

$select="select POSTID,POST,UID,POSTDATE,POSTTIME from post where UID in(select FRIENDID from friends where
 UID='".$uid."' and FSTATUS='1' ) order by POSTID desc ";

$res_select=mysql_query($select,$linkid);
$num_select=mysql_num_rows($res_select);

if ($num_select > 0)
{
	$num_count=1;
	while($data_select=mysql_fetch_array($res_select))
	{
		$post=$data_select['POST'];
		$postid=$data_select['POSTID'];
		$POSTDATE=$data_select['POSTDATE'];
		$POSTTIME=$data_select['POSTTIME'];
		$userid=$data_select['UID'];
		
		//code for shares
		$select_shared="select * from share where POSTID='".$postid."'";
		$res_select_shared=mysql_query($select_shared,$linkid);
		$num_select_shared=mysql_num_rows($res_select_shared);
		if ($num_select_shared > 0)
		{
			while ($data_select_shared=mysql_fetch_array($res_select_shared))
			{
				
				$uid_share=$data_select_shared['UID'];
				if ($uid == $uid_share)
				{
					$shared=1;
				}
				else 
				{
					$shared=0;
				}
			}
		}
		else 
		{
			$shared=0;
		}
		// end of shares
		
		// code for likes
		$select_liked="select * from likes where POSTID='".$postid."'";
		$res_select_liked=mysql_query($select_liked,$linkid);
		$num_select_liked=mysql_num_rows($res_select_liked);
		if ($num_select_liked > 0)
		{
			while ($data_select_liked=mysql_fetch_array($res_select_liked))
			{
				
				$uid_like=$data_select_liked['UID'];
				if ($uid == $uid_like)
				{
					$liked=1;
				}
				else 
				{
					$liked=0;
				}
			}
		}
		else 
		{
			$liked=0;
		}
		//end of likes
		
			
		$user_select="select UPHOTO,UNAME from users where UID='".$userid."'";
		$res_userselect=mysql_query($user_select,$linkid);
		$data_userselect=mysql_fetch_array($res_userselect);
		$uphoto=$data_userselect['UPHOTO'];
		$user_name=$data_userselect['UNAME'];
		if ($uphoto != "")
		{
			$userphoto=$uphoto;
		}
		else
		{
			$userphoto="../images/humanicon.jpg";			
		}
		
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$curtime=date('Y-m-d H:i:s');
		
		$post_timeval =date_diffval($POSTTIME, $curtime);

	?>
         <table width="100%" height="100%" cellpadding="0" cellspacing="0" id="tableborder" >
	<tr>
    <td width="14%"><input type="hidden" name="totalpost_home" id="totalpost_home" value="<?php echo $num_select; ?>" /></td><td width="78%"><b><?php echo $user_name;?></b></td><td width="8%"></td>
    </tr>
    <tr>
    <td valign="top"><img src="<?php echo $userphoto;?>"  width="60" height="60"  /></td><td colspan="2"><?php echo $post;?></td>
    </tr>
    <?php
    //code for comments
		$sel_com="Select * from comments where POSTID='".$postid."' order by CMTID asc ";
		$res_sel_com=mysql_query($sel_com,$linkid);
		$num_rows_compost=mysql_num_rows($res_sel_com);	
		
		if($num_rows_compost > 0)
		{	
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
				<table width="105%" height="100%" cellpadding="0" cellspacing="0" >
					<tr>
					  <td width="15%"><input type="hidden" name="totalcom_home" id="totalcom_home" value="<?php echo $num_rows_compost; ?>" /></td><td width="75%"><b><?php echo $cuname;?></b> </td>
					  <td width="10%">&nbsp;</td>
					</tr>
					<tr>
						<td valign="top"><img src="<?php echo $comuserphoto;?>"  width="60" height="60"  /></td><td colspan="2"><?php echo $ctext;?></td>
					</tr>
				</table>
				</td>
			</tr>
		<?php
			}
		?>
		<tr>
			<td>&nbsp;</td><td colspan="2"><?php echo $post_timeval; ?> 
		<?php 	if ($userid != $uid && $liked == 0 ) {	?>
        .<a href="#" onclick="fnproflikehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes','save'); return false;">like</a>.
        <?php } else {?>
         <a href="#" onclick="fnproflikehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes','delete'); return false;">Unlike</a>.         
       <?php  } 	   
	   if ($num_select_liked > 0) {?>
    <a href="user_liked.php?postid=<?php echo $postid; ?>"  class="fancybox fancybox.ajax" ><strong><?php echo $num_select_liked; ?></strong> user(s) liked</a>
        <?php }  ?>
		<a href="#" onclick="fnshow_hidedivhomecom('comment_posthomecom<?php echo $num_count;  ?>'); return false">Comment</a>.
         <?php 	if ($userid != $uid  && $shared == 0 ) {	?>
		<a href="#" onclick="fnprofsharehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes','save'); return false">Share</a>
        <?php } else  {?>
        <a href="#" onclick="fnprofsharehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes','delete'); return false ">
       Unshare</a>  
       <?php } 
	   
	   if ($num_select_shared > 0) {?>
 <a href="user_shared.php?postid=<?php echo $postid; ?>"  class="fancybox fancybox.ajax" ><strong><?php echo $num_select_shared; ?></strong> user(s) shared</a>
        <?php } ?>
		<!--.<a href="#" onclick="fnshow_hidedivhomecom('deletehomecom<?php //echo $num_count; ?>'); return false">delete</a> --></td>
			</tr>
			<tr>   
			<td colspan="2"><div id="comment_posthomecom<?php echo $num_count; ?>">
			<form method="post" action="#" 
			onsubmit="fnsavecommentshome('<?php echo $uid; ?>','<?php echo $postid; ?>','txtcompost<?php echo $num_count;?>'); return false;">
				<textarea rows="2"   cols="39"  autofocus="autofocus"
                name="txtcompost<?php echo $num_count; ?>" id="txtcompost<?php echo $num_count; ?>" > </textarea>
				<input type="submit"   width="88" height="20"  value="post" name="Submitcom" />
			</form>
			</div>
			
			<div id="deletehomecom<?php echo $num_count;  ?>">
              <br />           
			<form name="frmprofdeletehome" id="frmprofdeletehome" action="#"  method="post"  >
           	  <label>Are u sure u want to delete ?</label>
               <input type="button" name="yes" value="Yes" 
                onclick="fnprofdeletehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes'); return false " />          
            	<input type="button" name="no" value="No" 
                 onclick="fnprofdeletehome('<?php echo $uid; ?>','<?php echo $postid; ?>','No'); return false " /> 
             </form>
			</div>
			</td> 
		</tr>
		<?php
		} 
		else 
		{
			?>
			 <tr>
			<td>&nbsp;</td>
			<td colspan="2"><?php echo $post_timeval; ?>
			 <?php 	if ($userid != $uid && $liked == 0 ) {	?>
         .<a href="#" onclick="fnproflikehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes','save'); return false ">like</a>.
       	 <?php } else {?>
          <a href="#" onclick="fnproflikehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes','delete'); return false ">Unlike</a>.
         <?php }		 
		  if ($num_select_liked > 0) { ?>
                 <a href="user_liked.php?postid=<?php echo $postid; ?>"  class="fancybox fancybox.ajax"><strong><?php echo $num_select_liked; ?></strong> user(s) liked</a>
        <?php } ?>
			<a href="#" onclick="fnshow_hidedivhome('comment_posthome<?php echo $num_count;  ?>'); return false">Comment</a>.
            
			 <?php 	if ($userid != $uid && $shared == 0 ) {	?>
             <a href="#"
              onclick="fnprofsharehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes','save'); return false;" >Share</a>	   <?php } else { ?>
             
              <a href="#" 
              onclick="fnprofsharehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes','delete'); return false;" >
               Unshare</a>&nbsp;&nbsp;
               <?php }
			   
               if ($num_select_shared > 0) { ?>
                 <a href="user_shared.php?postid=<?php echo $postid; ?>"  class="fancybox fancybox.ajax"><strong><?php echo $num_select_shared; ?></strong> user(s) shared</a>
        <?php } ?>
			<!--.<a href="#" onclick="fnshow_hidedivhome('deletehome<?php //echo $num_count;  ?>'); return false">delete</a> --></td>
			</tr>
			<tr>   
			<td colspan="2"><div id="comment_posthome<?php echo $num_count; ?>">
			<form method="post" action="#" 
			 onsubmit="fnsavecommentshome('<?php echo $uid; ?>','<?php echo $postid; ?>','txtcompost<?php echo $num_count; ?>'); return false">
				<textarea rows="2"   cols="39"  autofocus="autofocus"
                 name="txtcompost<?php echo $num_count; ?>" id="txtcompost<?php echo $num_count; ?>"   > </textarea>
				<input type="submit"   width="88" height="20"  value="post" name="Submit" />
			</form>
			</div>
			
			<div id="deletehome<?php echo $num_count; ?>">
             <br />
			<form name="frmprofdeletehome" id="frmprofdeletehome" action="#"   method="post" >
            	<label>Are u sure u want to delete ?</label>
                <input type="button" name="yes" value="Yes" 
                onclick="fnprofdeletehome('<?php echo $uid; ?>','<?php echo $postid; ?>','Yes'); return false " />
                <input type="button" name="no" value="No" 
                 onclick="fnprofdeletehome('<?php echo $uid; ?>','<?php echo $postid; ?>','No'); return false " /> 
             </form>
			</div>
			</td>  </tr>
			<?php 
		} ?>
</table>
		
<?php	
 $num_count++;			
	}
}
?>