<?php
session_start();
$uid=$_SESSION['UID'];
$uname=$_SESSION['UNAME'];
include "../includes/check_session.php";
include "../db/common_db.php";
$linkid=db_connect();

$data=$_POST;

$userid=$data['userid'];
$comid=$data['comid'];
$postid=$data['postid'];

$delete="delete from blog_comments where BLCMTID='".$comid."' and BLID='".$postid."' and UID='".$userid."'";
$res_delelte=mysql_query($delete,$linkid);
echo "Successfull deleted!!!";
?>