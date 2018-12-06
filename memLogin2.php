<?php
ob_start();
session_start();
// $memToNo = $_SESSION["memNo"];
try{
  require_once("connectcd102g1.php");
  $sql = "select * from member where memId = :memId and memPsw = :memPsw";
  $member = $pdo->prepare( $sql );
  $member->bindValue(":memId", $_REQUEST["memId"]);
  $member->bindValue(":memPsw", $_REQUEST["memPsw"]);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "NG";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memberRow = $member->fetch(PDO::FETCH_ASSOC);
  	$_SESSION["memNo"] = $memberRow["memNo"];
  	$_SESSION["memId"] = $memberRow["memId"];
  	$_SESSION["memName"] = $memberRow["memName"];
    $_SESSION["memPsw"] = $memberRow["memPsw"];
  	$_SESSION["memSex"] = $memberRow["memSex"];
    $_SESSION["memBir"] = $memberRow["memBir"];
    $_SESSION["memTel"] = $memberRow["memTel"];
    $_SESSION["memEmail"] = $memberRow["memEmail"];
    $_SESSION["memLevel"] = $memberRow["memLevel"];
    $_SESSION["memImg"] = $memberRow["memImg"];


    //送出登入者的姓名資料
    echo $memberRow["memName"];
    // $memArr["memNo"] = $memberRow["memNo"]; 
    // $memArr["memId"] = $memberRow["memId"];
    // $memArr["memName"] = $memberRow["memName"];
    // echo json_encode($memArr);
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>