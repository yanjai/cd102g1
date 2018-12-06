<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- 亂碼 -->
<script src="js/memlogin.js"></script>
<title>註冊</title>

</head>
<body>


<?php
	$memId = $_POST["memId"];
	$memPsw = $_POST["memPsw"];
	$memName = $_POST["memNameReg2"];
	$memSex = $_POST["memSex"];
	$memBir = $_POST["memBir"];
	$memTel = $_POST["memTel"];
	$memEmail = $_POST["memEmail"];
?>

<?php	
	try{
		require_once("connectcd102g1.php");
		// require_once("connectSeaTunnel.php");
		$sql = "select * from member where memId = :memId";
			$member = $pdo->prepare($sql);
			$member -> bindValue(":memId",$memId);
			$member -> execute();
		if( $member->rowCount() == 0 ){

			$sql = "insert into member (memNo, memName, memId, memPsw, memSex, memBir, memRegDate, memTel, memEmail, memLevel, memImg)values(Null, :memName, :memId, :memPsw, :memSex, :memBir, NOW(), :memTel, :memEmail, :memLevel, :memImg)";
			$member = $pdo -> prepare($sql);
			$member->bindValue(":memName", $memName);
			$member->bindValue(":memId", $memId);
			$member->bindValue(":memPsw", $memPsw);
			$member->bindValue(":memSex", $memSex);
			$member->bindValue(":memBir", $memBir);
			$member->bindValue(":memTel", $memTel);
			$member->bindValue(":memEmail", $memEmail);
			$member->bindValue(":memLevel", "0");
			$member->bindValue(":memImg", "memberFish.png");
			$member->execute();

			$_SESSION["memName"] = $memName;
			$_SESSION["memId"] = $memId;
			$_SESSION["memPsw"] = $memPsw;
			$_SESSION["memSex"] = $memSex;
			$_SESSION["memBir"] = $memBir;
			$_SESSION["memTel"] = $memTel;
			$_SESSION["memEmail"] = $memEmail;

			// window.location.href='index.html'
			// window.history.go(-1);

			echo "<script>alert('註冊成功，歡迎您!')
						window.location.href='seatunnel.php';
					</script>";
		}else{
			echo "<script>alert('帳號已存在，請重新註冊。');
					window.location.href='memRegister.html'</script>";
		}

	}catch(PDOException $e){
		echo "錯誤原因 : " , $e->getMessage(), "<br>";
		echo "錯誤行號 : " , $e->getLine(), "<br>";
	}
	// header(javascript:history-1)
?> 



</body>
</html>