<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../../includes/check_session.php";
include "../../db/common_db.php";
$linkid=db_connect();

//echo date_default_timezone_get();
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curtime=date('Y-m-d H:i:s');

$data=$_POST;
$userid=$data['user_id'];
$postid=$data['post_id'];
$txtcompost=$data['txteditcomqandaval'];

$update="update querstions set QUESTION='".htmlspecialchars($txtcompost)."' where UID='".$userid."' and QID='".$postid."'";
$result_insert=mysql_query($update,$linkid);
echo "Successfully Updated!!!";

?>