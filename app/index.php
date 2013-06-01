<?php
	require('includes/defs.php');
	require('Smarty.class.php');

	$results = list_locations(5);

	// Smarty
	$smarty = new smarty();

	$smarty->assign("results", $results);
	$smarty->display("index.tpl");
?>
