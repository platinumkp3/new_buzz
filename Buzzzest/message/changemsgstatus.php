<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../includes/check_session.php";
include "../db/common_db.php";
$linkid=db_connect();

$data=$_POST;

$msgid=$data['msgid'];

$update ="update message set MSGSTATUS='1' where MSGID='".$msgid."'";
$result_insert=mysql_query($update,$linkid);
?>