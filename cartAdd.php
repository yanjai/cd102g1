<?php
ob_start();
session_start();
$gearNo = $_REQUEST["gearNo"];

if( isset($_SESSION["gearList"][$gearNo]) === false){
	$_SESSION["gearList"][$gearNo]["gearName"] = $_REQUEST["gearName"];
	$_SESSION["gearList"][$gearNo]["gearPic"] = $_REQUEST["gearPic"];
	$_SESSION["gearList"][$gearNo]["gearPrice"] = $_REQUEST["gearPrice"];
	$_SESSION["gearList"][$gearNo]["gearSize"] = $_REQUEST["gearSize"];
	$_SESSION["gearList"][$gearNo]["gearQty"] = $_REQUEST["gearQty"];
	// $_SESSION["gearList"][$gearNo]["quantity"] = 1;	
}
header("location:shoppingCart.php");
?>