<?php ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	require_once("connectcd102g1.php");

	  $memNo = $_SESSION["memNo"];	
	  $clothNo = (int)$_REQUEST["userversion"];
	  $colorNo = (int)$_REQUEST["usercolor"];
	  $size = $_REQUEST["usersize"];
    $officialImgNo = (int)$_REQUEST["userofficialImg"];
    $custoImgNo = $_FILES["cuupfile"]["name"];
    // $FinalcustoImgName = $_FILES["userwetsuit"]["name"];
    $imagedata = base64_decode($_REQUEST['userwetsuit']);
    //$FinalcustoImgName = md5(uniqid(rand(), true));
    $FinalcustoImgName = rand();
    $file = "back_images//" . $FinalcustoImgName.'.png';
    file_put_contents($file,$imagedata);
    $custorName = $_REQUEST["cuuserName"];
   	$custorAddr = $_REQUEST["cuuserAddr"];
   	$custorTel = $_REQUEST["cuuserPhone"];
   	$custorderStatus = 0;
   	$custorderDate = date("Y-m-d");
   	$totalPrice = (int)$_REQUEST["userprice"];

   	// echo $clothNo,$colorNo,$size,$officialImgNo,$custoImgNo,$custorName,$custorAddr,$custorTel,$custorderStatus,$custorderDate,$totalPrice;
    // echo $officialImgNo;
	$sql2 = "INSERT INTO custorderlist(custorderNo,memNo,clothNo,colorNo,size,officialImgNo,custoImgNo,FinalcustoImgName,custorName,custorAddr,custorTel,custorderStatus,custorderDate,totalPrice)values(null,'$memNo','$clothNo','$colorNo','$size','$officialImgNo','$custoImgNo','$FinalcustoImgName','$custorName','$custorAddr','$custorTel','$custorderStatus','$custorderDate','$totalPrice')";

	$pdo->exec($sql2);	
		
    header('Location: customWetsuitStep4.php');
	?>
</body>
</html>