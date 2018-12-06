<?php
try {
	$versionNo = $_REQUEST['versionNo'];
	require_once("connectcd102g1.php");		
	$sql = "select * from versionlist where versionNo = $versionNo";
	$versions = $pdo->query($sql);
	$prodRows = $versions->fetchAll(PDO::FETCH_ASSOC);
	foreach($prodRows as $key => $prodRow){
		echo '<li class="cuPriceVersion">',$prodRow['versionLName'],'<p class="cuVersionPrice">',$prodRow['versionPrice'],'</p></li>';
	}	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>