<?php
ob_start();
session_start();

try{
  require_once("connectcd102g1.php");
  $sql = "select * from member where memId = :memId and memPsw = :memPsw";
  $member = $pdo->prepare( $sql );
  $member->bindValue(":memId", $_REQUEST["memId"]);
  $member->bindValue(":memPsw", $_REQUEST["memPsw"]);
  $member->execute();

  $memberRow = $member->fetch(PDO::FETCH_ASSOC);

  if( $member->rowCount()== 0){ //查無此人
	  echo "0";
  }
  else if(!$memberRow["memLevel"] == 0){ //停權
    echo "1";
  }
  else { 
    echo "2";
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>