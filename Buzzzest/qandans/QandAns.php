<?php
session_start();
include "../includes/check_session.php";
require "../includes/header.php";

?>

<script src="../js/qanda.js" type="application/javascript" >
</script>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="#">Link one</a></li>
      <li><a href="#">Link two</a></li>
      <li><a href="#">Link three</a></li>
      <li><a href="#">Link four</a></li>
    </ul>
    <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
    <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
    <!-- end .sidebar1 --></div>
  <div class="content">
   	<div id="content_qanda" >
    </div>
  <!-- end .content --></div>
<?php
require "../includes/footer.php";
?>