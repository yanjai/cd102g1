
<?php
try {
	require_once("connectcd102g1.php");
	$NewPage = $_REQUEST['NewPage'];
	$sql = "select * from activitycategory where actName = '{$NewPage}'";
	$Activitys = $pdo->query($sql);
	$ActRows = $Activitys->fetchAll(PDO::FETCH_ASSOC);
	foreach($ActRows as $i=>$ActRow){
?>


				<p>活動名稱: <span class="actFontWeight"><?php echo $ActRow['actName']; ?></span></p>
				<input class="actSelectName" type="hidden" value="<?php echo $ActRow['actName']; ?>">
				<p>活動費用: <span class="actFontWeight"><?php echo $ActRow['actPrice']; ?></span></p>
				<input class="actSelectPrice" type="hidden" value="<?php echo $ActRow['actPrice']; ?>">
				
		
		

	
	

<?php		
	}
	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
<!--footer end-->	
