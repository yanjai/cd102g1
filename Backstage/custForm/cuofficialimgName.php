<?php
try {
	require_once("connectcd102g1.php");

	$sql = "select * from officialimglist where officialImgStatus = 0";
	$officialimgs = $pdo->query($sql);
	$prodRows = $officialimgs->fetchAll(PDO::FETCH_ASSOC);
	foreach($prodRows as $key => $prodRow){
		echo '<button class="culogobtn"><input type="hidden" value= ',$prodRow['officialImgNo'],'><img src="images/',$prodRow['officialImgName'],'" onclick="change(this)"></button>';
	}
	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>