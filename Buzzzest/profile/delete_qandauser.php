<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../includes/check_session.php";
include "../db/common_db.php";
$linkid=db_connect();

//echo date_default_timezone_get();
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curtime=date('Y-m-d H:i:s');

$data=$_POST;

$user_id=$data['user_id'];
$post_id=$data['post_id'];
$sel_comments="select * from answers where QID='".$post_id."'";
$res_sel_comments=mysql_query($sel_comments,$linkid);
$num_sel_comments=mysql_num_rows($res_sel_comments);
if ($num_sel_comments >0 )
{
	while($data_sel_comments=mysql_fetch_array($res_sel_comments))
	{
		$ANSID=$data_sel_comments['ANSID'];
		$del_comments="delete from answers where ANSID='".$ANSID."'";
		$res_del_comments=mysql_query($del_comments,$linkid);
	}
	
	$del_post="delete from querstions where QID='".$post_id."'";
	$res_del_post=mysql_query($del_post,$linkid);
}
else 
{
	$del_post="delete from querstions where QID='".$post_id."'";
	$res_del_post=mysql_query($del_post,$linkid);
}
echo "Successfully Deleted!!!";

?>