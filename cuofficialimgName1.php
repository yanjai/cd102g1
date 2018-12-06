<?php
try {
	$officialImgNo = $_REQUEST['officialImgNo'];
	require_once("connectcd102g1.php");		
	$sql = "select * from officialimglist where officialImgNo = $officialImgNo";
	$officialimgs = $pdo->query($sql);
	$prodRows = $officialimgs->fetchAll(PDO::FETCH_ASSOC);
	foreach($prodRows as $key => $prodRow){
		echo '<li class="cuImg">',$prodRow['officialImgLName'],'<p class="cuImgPrice">',$prodRow['officialImgPrice'],'</p></li>';
	}	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>