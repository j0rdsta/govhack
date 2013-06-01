<?php
	require('includes/defs.php');
	require('Smarty.class.php');

	// Smarty
	$smarty = new smarty();

	$smarty->assign("suburb_name", "Varsity Lakes");
	$smarty->display("suburb.tpl");
?>
