<?php
session_start();
include "../includes/check_session.php";
require "../includes/header.php";
?>

<script src="../js/message.js" type="application/javascript" >
</script>

  <div class="sidebar1">
    <ul class="nav">
      <li><a href="#">Link one</a></li>
      <li><a href="#">Link two</a></li>
      <li><a href="#">Link three</a></li>
      <li><a href="#">Link four</a></li>
    </ul>
   
    <!-- end .sidebar1 --></div>
  <div class="content">
   <div id="divborder">
   <a href="#" onclick="fnchangedivmsg('inbox')"; >Inbox</a>&nbsp;&nbsp;
   <a href="#" onclick="fnchangedivmsg('outbox')"; >Outbox</a>&nbsp;&nbsp;
   <a href="#" onclick="fnchangedivmsg('createmsg')"; >Create Message</a>&nbsp;&nbsp;
   <a href="#" onclick="fnchangedivmsg('trash')"; >Trash</a>
   </div>   
 <div id="divborder" >
 	&nbsp;&nbsp;
 	<a href="">Report spam</a>&nbsp;&nbsp;
   	<a href="">Delete</a></div>
 <div id="inbox">
  
 </div>
 
 <div id="outbox">
 
 </div>
 
 <div id="createmsg">
 
 </div>
 
 <div id="trash">
 
 </div>
 
      <!-- end .content --></div>
<?php
require "../includes/footer.php";
?>