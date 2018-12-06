<?php 
    try{
    require_once("connectcd102g1.php");
    if(isset($_REQUEST["memNo"])){
		$UpcoachNo = $_REQUEST["coachNO"];
		$Upmember = $_REQUEST["memNo"];
		$sql = "select * from actorderlist where memNo = $Upmember and actNo = $UpcoachNo";
		$del = $pdo->prepare($sql);
		$del->execute();
        $count = $del->rowCount();
		if($count>0){
			echo 0;
		}else{
            echo 1;
        }
    }
}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";
}



?>