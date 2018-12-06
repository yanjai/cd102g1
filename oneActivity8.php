
<?php
try {
	require_once("connectcd102g1.php");
	$coachSelect=$_REQUEST['coachSelect'];



	$sql7 = "select * from coach c join coachcomment acm on c.coachNo = acm.coachNo where c.coachName = '{$coachSelect}'";
	$actCoachScoreActive = $pdo->query($sql7);
	$actCoachScoreCount = $actCoachScoreActive->rowCount();
	
	$actCoachScoreRows = $actCoachScoreActive->fetchAll(PDO::FETCH_ASSOC);
	$actCoachTotalScore = 0;
	foreach($actCoachScoreRows as $n=>$actCoachScoreRow){
		$actCoachTotalScore += $actCoachScoreRow['score'];
	}
	

	$actCoachSumScore = $actCoachTotalScore/$actCoachScoreCount;
	// echo $actCoachSumScore;

	$sql = "select * from coach c join coachact cc on c.coachNo = cc.coachNo left outer join activitycategory acg on cc.actNo = acg.actNo where coachName = '{$coachSelect}' order by coachName limit 1" ;
	$Activitys = $pdo->query($sql);
	$ActRows = $Activitys->fetchAll(PDO::FETCH_ASSOC);
	foreach($ActRows as $i=>$ActRow){
?>
			<input type="hidden" value="<?php echo $ActRow['coachNo']; ?>">
			<p><span class="actFontWeight">教練名稱:</span><span class="actFirstCoach"><?php echo $ActRow['coachName']; ?></span></p>
				<p>評分:</p>
				<div class="chLbPerRating chLbPerRating2">
						<div class="chLbPerRatingBar chLbPerRatingBar2"></div>
					</div>
					
					<div class="chtotalScore chtotalScore2">
						<?php 
						if($actCoachScoreCount == 0){

						}else{
							echo round($actCoachSumScore).'%';
						}

							
								
						?>
						<script>

							$(document).ready(function(){
								var totalsc = parseInt($('.chtotalScore').text());
								console.log(totalsc);
								$('.chLbPerRating').children('.chLbPerRatingBar').animate({width:totalsc+'%'},600);
							})
							
						</script>
					</div>
				


<?php		
	}
	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
<!--footer end-->	
