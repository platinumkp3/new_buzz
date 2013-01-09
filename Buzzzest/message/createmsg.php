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

<form action="#" method="post" onSubmit="fnsavemsg(); return false;">
	<table width="90%" height="100%" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="71">To</td>
    <td width="139">
    <select id="msgusers" >
    <option value="1">Example</option>
    </select>
   
    <input type="checkbox" name="Select all" value="Select all" /> Select All
    </td>
  </tr>
  <tr>
    <td>Message</td>
    <td><textarea cols="30" id="msg" autofocus="autofocus"  name="msg" rows="5"></textarea></td>
  </tr>
   <tr>
    <td><input type="submit" value="Send" /></td>
    <td><input type="button" value="Cancel"/></td>
  </tr>
</table>

</form>
</div>
