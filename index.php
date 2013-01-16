<!doctype html>
<html>
<?php
require_once('php/sqlite.inc.php');
require_once('php/sys_postHandler.inc.php');
include_once('php/inc/head.inc.php');
?>
<body><div class="mainWrapper"><div class="topSeparator"></div><?php include_once('php/inc/sliderTop.inc.php'); ?>


<!-- begin of the articles -->

<div class="object1 object"><?php include("obj/object1.php") ?></div>

<div class="object2 object"><?php include("obj/object2.php") ?></div>

<div class="object3 object"><?php include("obj/object3.php") ?></div>

<div class="object4 object"><?php include("obj/object4.php") ?></div>

<div class="object5 object"><?php include("obj/object5.php") ?></div>

<!-- end of the articles -->

<?php include_once('php/inc/sliderBottom.inc.php'); ?>
<?php include_once('php/inc/footer.inc.php'); ?></div><?php /*end of mainWrapper*/ ?></body></html>