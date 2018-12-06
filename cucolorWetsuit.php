<?php
try {
	$versionNo = $_REQUEST["versionNo"];
	$colorNo = $_REQUEST["colorNo"];
	require_once("connectcd102g1.php");
	$sql = "select * from wetsuitlist where versionNo = $versionNo and colorNo = $colorNo and wetsuitStatus = 0";
	$wetsuits = $pdo->query($sql);
	if($wetsuits->rowCount()==0){
		echo '此顏色無此版型';
	}else{
		while($row = $wetsuits->fetch(PDO::FETCH_ASSOC)){
		echo '<img id="cuCustomizeWetSuit" src="images/',$row['wetsuitImg'],'">';
		}	
	}
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>