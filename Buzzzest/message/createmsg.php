<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../includes/check_session.php";
include "../db/common_db.php";
$linkid=db_connect();

?>

<br/>
<div id="createmsg_form">

<form action="#" name="msgfrom" method="post" onSubmit="fnsavemsg(); return false;" >
	<table width="90%" height="100%" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="71">To</td>
    <td width="139">

    <select id="mySelect" multiple="multiple" style="width:50%; height:60%" size="1"   >
	
	<?php
	$select_usersfrnd="select * from friends where UID='".$uid."'";
	$res_usersfrnd= mysql_query($select_usersfrnd,$linkid);
	$num_usersfrnd = mysql_num_rows($res_usersfrnd);
	if ($num_usersfrnd > 0)
	{
		while ($data_usersfrnd = mysql_fetch_array($res_usersfrnd) )
		{
			$frndid = 	$data_usersfrnd['FRIENDID'];
			$select_frndname ="select UNAME from users where UID='".$frndid."'";
			$res_frndname= mysql_query($select_frndname,$linkid);
			$num_frndname = mysql_num_rows($res_frndname);
			$data_frndname	= mysql_fetch_array($res_frndname);
		 ?>
			 <option value="<?php echo $frndid;?>" ><?php echo $data_frndname['UNAME'];?>&nbsp;&nbsp;&nbsp;&nbsp;</option>
		<?php }
	}
	?>   
    </select>


    <input type="checkbox" id="chlselfrnd"  name="chlselfrnd" onclick="displayResult()" /> Select All
    </td>
  </tr>
  <tr>
    <td>Message</td>
    <td> <textarea  cols="30" id="txtmsg"   name="txtmsg" autofocus="autofocus"  name="msg" rows="5" > </textarea> </td>
  </tr>
   <tr>
    <td><input type="submit" value="Send"/></td>
    <td><input type="button" value="Cancel" onclick="clearmsg(); return false" /></td>
  </tr>
</table>

</form>
</div>
