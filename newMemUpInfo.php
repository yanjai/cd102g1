<?php
ob_start();
session_start();
$memId = $_SESSION["memId"];
$memNo = $_SESSION["memNo"];

try{
	require_once("connectcd102g1.php");

	function getMemberInfo($pdo, $mId) {
	    try {
	        $sql = "SELECT * FROM member WHERE memNo = :memNo";
	        $query = $pdo->prepare($sql);
	        $query->bindValue(":memNo", $mId);
	        $query->execute();
	        if ($query->rowCount() == 0) {
	            echo "您不是會員唷!";
	        } else {
	            $memberRow = $query->fetch(PDO::FETCH_ASSOC);
	            //echo json_encode($memberRow);
	            return $memberRow;
	        }
	    } catch(Exception $ex) {
	        echo 'error：' . $ex->getMessage();
	    }
	} 

	$memberInfo = getMemberInfo($pdo, $_SESSION['memNo']);

	function updateMember ($pdo, $memName, $memTel, $memEmail, $memNo) {
		echo '姓名'.$memName;
		echo '電話'.$memTel;
		echo '信箱'.$memEmail;
		echo '會員編號'.$memNo;
		$sql = "UPDATE member SET memName = :memName, memTel = :memTel, memEmail = :memEmail WHERE memNo = :memNo";	
	 	
	 	$member = $pdo->prepare($sql); 
	 	$member->bindParam(":memName", $memName);
	 	$member->bindParam(":memTel", $memTel);
	 	$member->bindParam(":memEmail", $memEmail);
	 	$member->bindParam(":memNo", $memNo);
	 	$member->execute();
	 	echo $member->rowCount();
	 	$_SESSION['memName']=$memName;
	 	$_SESSION['memTel'] = $memTel;
	 	$_SESSION['memEmail'] = $memEmail;
	 	header("location:memUpdate.php");
	}

	// @$_REQUEST['isModified']
	if (@$_REQUEST['isModified'] == true) {
		// echo 'modify memberInfo';
		// echo $_REQUEST['newMemName'];
		// echo $_REQUEST['newMemTel'];
		// echo $_REQUEST['newMemEmail'];
		// echo $_SESSION['memNo'];
		updateMember($pdo, $_REQUEST['newMemName'], $_REQUEST['newMemTel'], $_REQUEST['newMemEmail'],$memNo);
		
	}

	
}catch(PDOException $e){
	echo $e->getMessage();
}


?>