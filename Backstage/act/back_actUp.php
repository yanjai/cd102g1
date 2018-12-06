<?php 
	require_once("../connectcd102g1.php");
	$selectNo = $_REQUEST['selectNo'];
	$selectPrice = $_REQUEST['selectPrice'];
	$selectContent = $_REQUEST['selectContent'];
	
	$sql = "UPDATE activitycategory SET actPrice = $selectPrice  where actNo = $selectNo";
	$pdo->exec($sql);

 ?>