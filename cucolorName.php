<?php
try {
	require_once("connectcd102g1.php");
	$gender = $_REQUEST['gender'];
	$sql = "select * from colorlist where gender = $gender and colorStatus = 0";
	$colors = $pdo->query($sql);
	$prodRows = $colors->fetchAll(PDO::FETCH_ASSOC);
	foreach($prodRows as $key => $prodRow){
		echo '<button class="cucolorbtn"><input type="hidden" value= ',$prodRow['colorNo'],'>',$prodRow['colorName'],'<img src="images/',$prodRow['colorImg'],'"></button>';
	}
	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>