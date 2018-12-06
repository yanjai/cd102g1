<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
	
</style>

</head>
<body>
<?php
try {
	require_once("connectcd102g1.php");
	$selectType = $_REQUEST["selectType"];
	// $sql = "select * from activitycategory where instr('$selectType',actType)";
	$sql = "select * from activitycategory where actType LIKE '%$selectType%' ";
	$Activitys = $pdo->query($sql);  //Activitys 是 PDOStatement物件

	
	$ActRows = $Activitys->fetchAll(PDO::FETCH_ASSOC);
	foreach($ActRows as $i=>$ActRow){
		$sql2="select * from activitycategory acg join activitycomment acm on acg.actNo = acm.actNo where acg.actNo = '{$ActRow['actNo']}'";
		$actBars=$pdo->query($sql2);
		$count = $actBars->rowCount();
		// echo $count;
		$actBarRows=$actBars->fetchAll(PDO::FETCH_ASSOC);
		if($count==0){

		}else{
			$totalScore = 0;
				foreach($actBarRows as $j=>$actBarRow){
			$totalScore += $actBarRow['score'];

			}

			$sumScore = $totalScore/$count;
		}
		// echo $sumScore;


?>
	

	<?php
	$ActImgs= explode("| ", $ActRow["actItemImg"]);
	
		
	 ;?>
	 
	 

	<div class="actBox">
		<div class="actBoxContent">
			<div class="actBoxImg">
				<img src="images/<?php echo $ActImgs[0];?>">
			</div>
			<div class="actTxt">
				<h4><?php echo $ActRow["actName"];?></h4>
				<p class="bounce animated"><span class="actFontWeight">評分:</span></p>
				<div class="actBoxContent">
					<div class="chLbPerRating">
						<div class="chLbPerRatingBar"></div>
					</div>
					<div class="chtotalScore">
						<?php 
							if($count==0){

							}else{
								echo round($sumScore).'%';
							}

								
									
							?>
					</div>
				</div>
				<p>活動簡介:</p>
				<p><?php echo $ActRow["actContent"];?></p>
				<a href="oneActivity.php?pageNo=<?php echo $ActRow["actNo"];?>"><span class="actBtn"><p>立刻參加</p></span></a>
			</div>
		</div>
	</div>



<?php		
	}
	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
</body>
</html>