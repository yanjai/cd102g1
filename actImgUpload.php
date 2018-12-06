<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	$dsn = "mysql:host=localhost;port=3306;dbname=cd102g1;charset=utf8";
	$user = "root";
	$password = "root";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO($dsn, $user, $password, $options);
	switch ($_FILES['fileImg']['error']) {
		case 0:
			// 如果不存在images資料夾,就透過程式創立
			if(file_exists("back_images//")===false){
				mkdir("back_images//");
			}
			// 從暫存區搬到images資料夾
			$from = $_FILES['fileImg']['tmp_name'];
			// echo $_FILES['fileImg']['tmp_name'];
    		$to = "back_images//" . $_FILES['fileImg']['name'];
    		$to2 = "images//" . $_FILES['fileImg']['name'];
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

    		// $colorName = $_REQUEST["colorName"];
		    // $colorImg = $_FILES['fileImg']['name'];
		    // $gender = $_REQUEST["cg"];
		    // $colorStatus = $_REQUEST["colorStatus"];

			// $sql2 = "INSERT INTO colorlist(colorNo,colorName,colorImg,gender,colorStatus)values(null,'$colorName','$colorImg','$gender','$colorStatus')";

			// $pdo->exec($sql2);

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
		
		
        // header('Location: custoFormatMag.php');
	 ?>
</body>
</html>