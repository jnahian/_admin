<?php require_once('../functions/functions.php');

$oUser->hasAccess();

$oTools->get_header();
$oTools->get_sidebar(); 
?>
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START CONTENT -->
<section id="content">


<?php

$oTools->get_part('dashboard');
$oTools->get_footer();



?>