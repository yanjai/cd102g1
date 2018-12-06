<?php
try {
	require_once("connectcd102g1.php");	
	$gender = $_REQUEST['gender'];	
	$sql = "select * from versionlist where gender = $gender";
	$versions = $pdo->query($sql);
	$prodRows = $versions->fetchAll(PDO::FETCH_ASSOC);
	foreach($prodRows as $key => $prodRow){
		echo '<button class="cuversionbtn"><input type="hidden" value= ',$prodRow['versionNo'],'>',$prodRow['versionName'],'</button>';
	}	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>