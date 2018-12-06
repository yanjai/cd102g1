<?php 
ob_start();
session_start();

 ?>
<?php
try {
  require_once("connectcd102g1.php");
  $actSelectName = $_REQUEST['actSelectName'];
  $sql1 = "select actNo from activitycategory where actName = '$actSelectName';";
  $actSelectNameActive = $pdo->query($sql1);
  $actSelectNameRows = $actSelectNameActive->fetchAll(PDO::FETCH_ASSOC);

  foreach($actSelectNameRows as $n=>$actSelectNameRow){
    $actSelectNo = $actSelectNameRow['actNo'];
  }


  $actSelectPrice = $_REQUEST['actSelectPrice'];
  $actSelectCoachName = $_REQUEST['actSelectCoachName'];
  $memNum = $_REQUEST['memNum'];
  $sql2 = "select coachNo from coach where coachName = '$actSelectCoachName'";
  $actSelectCoachNameActive = $pdo->query($sql2);
  $actSelectCoachNameRows = $actSelectCoachNameActive->fetchAll(PDO::FETCH_ASSOC);

  foreach($actSelectCoachNameRows as $n=>$actSelectCoachNameRow){
    $CoachSelectNo = $actSelectCoachNameRow['coachNo'];
  }
  $orderDate =date("Y-m-d");
  $actCoachDate = $_REQUEST['actCoachDate'];
  $sql = "INSERT INTO actorderlist (ActOrderNo ,memNo,actNo,coachNo,ActOrderPrice,ActOrderDate, attendStatus,orderdate)values(null,$memNum,$actSelectNo,$CoachSelectNo, $actSelectPrice ,'$actCoachDate', 0 ,'$orderDate')";/*抓到搜尋數值*/	
  $orderSendActive = $pdo->exec( $sql ); 
  
  
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";		
}
?>
