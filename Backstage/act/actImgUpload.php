<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	require_once("../connectcd102g1.php");
	foreach( $_FILES["upFile"]["error"] as $i => $error){
	switch($_FILES['upFile']['error'][$i]){ //也可寫成$error
	  case 0:
	    if( file_exists("../../images//")===false){
	    	mkdir("../../images//");
	    }
	    $from = $_FILES['upFile']['tmp_name'][$i];
		$to = "../../images//" . $_FILES['upFile']['name'][$i];
		$to2 = "../../back_images//" . $_FILES['upFile']['name'][$i];
		if(copy( $from, $to2)){
	    	echo "上傳成功<br>";
	    }
	    if(copy( $from, $to)){
	    	echo "上傳成功<br>";
	    }
	    else
    			echo "上傳失敗<br>";



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
		
	}
		$actImg = $_FILES['upFile']['name'];
    	$actName = $_REQUEST["actNameUp"];
    	$coachNo = $_REQUEST["coachNameUp"];
    	$actType = $_REQUEST["actTypeUp"];
    	$actPrice = $_REQUEST["actPriceUp"];
    	$actLocUp = $_REQUEST["actLocUp"];
    	$actContentUp = $_REQUEST["actContentUp"];
    	$actImgStr =$actImg[0].'| '.$actImg[1].'| '.$actImg[2];

    	$coachNamesIn = '';
    	for($x= 0 ;$x < strlen($coachNo);$x++){

    		$sql3 = "select * from coach where coachNo = $coachNo[$x];";
    		$coachNameShow = $pdo->query($sql3);
    		$coachNameShows=$coachNameShow->fetchAll(PDO::FETCH_ASSOC);
    		foreach($coachNameShows as $coachNameShowRow){
    			// echo $coachNameShowRow['coachName']." ";
    			$coachNamesIn= $coachNamesIn.$coachNameShowRow['coachName']." "; 
    			// echo $coachNamesIn;
    		}
    		


    	}
    	
		echo $coachNamesIn;
    	echo $actImgStr;
    	echo $actName;
    	
    	strlen($coachNo);
    	// echo explode('', $coachNo);
    	// for($i=0; $i<count($coachNo); $i++){
    	// 	echo $coachNo[$i].'<br>';
    	// }

    	echo $actType;
    	echo $actPrice;
    	echo $actLocUp;
    	echo $actContentUp;

    	$sql = "INSERT INTO activitycategory(actNo,actName,actPrice,actItemImg,actLoc,actType,actContent)values(null,'$actName',$actPrice,'$actImgStr','$actLocUp','$actType','$actContentUp')";

		$pdo->exec($sql);
		$orderActNo = $pdo->lastInsertId(); 

		for($x= 0 ;$x < strlen($coachNo);$x++){

    		echo $coachNo[$x].'<br>';
		$sql2 = "INSERT INTO coachact(coachActPK,coachNo,actNo)values(null,$coachNo[$x],$orderActNo)";

		$pdo->exec($sql2);
    	}

        header('Location: ../back_act.php');
	 ?>
</body>
</html>