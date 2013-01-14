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

$txtmsg=$data['txtmsg'];
$Selfrndval=$data['Selfrndval'];

$frnid=explode(',',$Selfrndval);
foreach ($frnid as $key )
{
	if ($key != "" && $key > 0 )
	{
		 $insert ="insert into message(UID,MSG,MSGDATE,MSGTIME,TOMSGID,MSGSTATUS) 
		 values('".$uid."','".htmlspecialchars($txtmsg)."','".date('Y-m-d')."','".$curtime."','".$key."','0')";
		 $result_insert=mysql_query($insert,$linkid);
	}
}
echo "Successfully sent!!!";
?>