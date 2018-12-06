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
try {
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
switch ($_FILES['cuupfile']['error']) {
  case 0:
    if(file_exists("back_images//")===false){
        mkdir("back_images//");
      }
    $from = $_FILES['cuupfile']['tmp_name'];
    $to = "back_images//" . $_FILES['cuupfile']['name'];
    if(copy( $from, $to)){
      echo "<script>alert('恭喜上傳成功');</script>";
    }
    else{
      echo "上傳失敗<br>";
    }

    $sql2 = "INSERT INTO custorderlist(custorderNo,memNo,clothNo,colorNo,size,officialImgNo,custoImgNo,FinalcustoImgName,custorName,custorAddr,custorTel,custorderStatus,custorderDate,totalPrice)values(null,'$memNo','$clothNo','$colorNo','$size','$officialImgNo','$custoImgNo','$FinalcustoImgName','$custorName','$custorAddr','$custorTel','$custorderStatus','$custorderDate','$totalPrice')";

    $pdo->exec($sql2);  
    
    break;
  case 1:
      // 從php.ini裡面抓出upload_max_filesize的大小用ini_get
      echo "上傳檔案太大，不得超過", ini_get("upload_max_filesize"),"<br>";
      break;

  case 2:
      // 判斷是否超過隱藏欄位設定的檔案上傳大小
      echo "上傳檔案太大，不得超過", $_REQUEST["MAX_FILE_SIZE"],"<br>";
      break;

  case 3:
      echo "上傳失敗，請重新上傳檔案","<br>";
      break;

  case 4:
      echo "<script>alert('未上傳檔案');</script>";
      break;  
    }

  header('Location: customWetsuitStep4.php');

}catch (PDOException $e) {
  echo "錯誤原因 : " , $e->getMessage(), "<br>";
  echo "錯誤行號 : " , $e->getLine(), "<br>"; 
}




?>
</body>
</html>