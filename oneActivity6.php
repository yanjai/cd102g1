
<?php
try {
	require_once("connectcd102g1.php");
	$NewPage = $_REQUEST['NewPage'];
	$sql = "select * from coach c join coachact cc on c.coachNo = cc.coachNo left outer join activitycategory acg on cc.actNo = acg.actNo where acg.actName = '{$NewPage}' order by acg.actName limit 1";
	$Activitys = $pdo->query($sql);
	$ActRows = $Activitys->fetchAll(PDO::FETCH_ASSOC);
	foreach($ActRows as $i=>$ActRow){
?>

			<div class="actCoachBigHead animated" style="background-image: url('images/s-<?php echo $ActRow['coachImg']; ?> "')";>
				
			</div>
				


<?php		
	}
	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
<!--footer end-->	
