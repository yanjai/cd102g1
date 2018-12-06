<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<?php
	$gearNo = $_REQUEST["gearNo"];
	if( isset($_REQUEST["delBtn"]) === true){ //delete
		unset($_SESSION["gearList"][$gearNo]);
		header("Location:shoppingCart.php");
	}else{
		$_SESSION["gearList"][$gearNo]["gearQty"] =  $_REQUEST["cartgearQty"];
	}
    
?>
</body>
</html>