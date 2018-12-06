<?php
ob_start();
session_start();
// $memId = $_SESSION["memId"];
$memNo = $_SESSION["memNo"];
echo $memNo;
$memPsw = $_REQUEST["newMemPsw"];
// $memPsw = '222';
echo '密碼'.$memPsw;
try{
	require_once("connectcd102g1.php");
	$sql = "UPDATE member SET memPsw = :memPsw WHERE memNo = $memNo";
	  $memberRow = $pdo->prepare($sql);
  	$memberRow->bindValue(':memPsw', $memPsw);
  	// $memberRow->bindValue(':memNo', $memNo);
  	$memberRow->execute();

	  $_SESSION["memPsw"]= $_REQUEST["newMemPsw"];

    echo '密碼更新成功';
    header("location:memUpdate.php");

}catch(PDOException $e){
	echo $e->getMessage();
}


?>