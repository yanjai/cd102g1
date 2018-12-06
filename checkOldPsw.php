<?php
ob_start();
session_start();
// echo $_REQUEST['oldMemPsw'];
// echo "123";
try{
  require_once("connectcd102g1.php");
  $sql = "select * from member where memId = :memId and memPsw = :memPsw";
  $member = $pdo->prepare( $sql );
  $member->bindValue(":memId", $_SESSION['memId']);
  $member->bindValue(":memPsw", $_REQUEST["oldMemPsw"]);
  $member->execute();

  $memberRow = $member->fetch(PDO::FETCH_ASSOC);

  if( $member->rowCount()== 0){ //查無此密碼
    echo "密碼錯誤";
  }else { 
    echo "密碼成功";
  }

}catch(PDOException $e){
  echo $e->getMessage();
}
?>