<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	require_once("../connectcd102g1.php");
	switch ($_FILES['fileImg']['error']) {
		case 0:
			// 如果不存在images資料夾,就透過程式創立
			if(file_exists("../../back_images//")===false){
				mkdir("../../back_images//");
			}
			// 從暫存區搬到images資料夾
			$from = $_FILES['fileImg']['tmp_name'];
			// echo $_FILES['fileImg']['tmp_name'];
    		$to = "../../back_images//" . $_FILES['fileImg']['name'];
    		$to2 = "../../images//" . $_FILES['fileImg']['name'];
    		if(copy( $from, $to)){
    			echo "<script>alert('恭喜上傳成功');</script>";
    		}
    		else
    			echo "上傳失敗<br>";

    		if(copy( $from, $to2)){
    			echo "<script>alert('恭喜上傳成功');</script>";
    		}
    		else
    			echo "上傳失敗<br>";
    		
    		$wetsuitcolorNo = $_REQUEST["colorNo"];
		    $wetsuitversionNo = $_REQUEST["versionNo"];
		    $wetsuitImg = $_FILES['fileImg']['name'];
		    $wetsuitStatus = $_REQUEST["wetsuitStatus"];

			$sql2 = "INSERT INTO wetsuitlist(wetsuitNo,wetsuitImg,versionNo,colorNo,wetsuitStatus)values(null,'$wetsuitImg','$wetsuitversionNo','$wetsuitcolorNo','$wetsuitStatus')";

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
		
		
        header('Location: ../custoFormatMag.php');
	 ?>
</body>
</html>