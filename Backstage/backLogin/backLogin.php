<?php
try{
  ob_start();
  session_start();
  require_once("../connectcd102g1.php");
  $sql = "select * from adminmag where adminId = :adminId and adminPsw = :adminPsw";
  $admin = $pdo->prepare( $sql );
  $admin->bindValue(":adminId", $_REQUEST["adminId"]);
  $admin->bindValue(":adminPsw", $_REQUEST["adminPsw"]);
  $admin->execute();
  if( $admin->rowCount()==0){ //查無此人
	  echo "NG";
  }else{ //登入成功
    //自資料庫中取回資料
  	$adminRow = $admin->fetch(PDO::FETCH_ASSOC);
  	$_SESSION["adminNo"] = $adminRow["adminNo"];
  	$_SESSION["adminId"] = $adminRow["adminId"];
  	$_SESSION["adminName"] = $adminRow["adminName"];
  	// $_SESSION["email"] = $adminRow["email"];

    //送出登入者的姓名資料
    echo $adminRow["adminName"];
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>