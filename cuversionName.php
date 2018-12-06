<?php
try {
	$versionNo = $_REQUEST['versionNo'];
	require_once("connectcd102g1.php");	
	$sql = "select * from versionlist where versionNo = $versionNo";
	$versions = $pdo->query($sql);
	$prodRows = $versions->fetchAll(PDO::FETCH_ASSOC);
	foreach($prodRows as $key => $prodRow){
		echo '<h4 class="cuVersionTitle">',$prodRow['versionLName'],'</h4>';
		echo '<p class="cuVersionContent">',$prodRow['versionContents'],'</p>';
		echo '<img class="cuVersionContent img" src="images/',$prodRow['versionImg'],'"></button>';
	}
	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>