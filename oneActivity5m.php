
<?php
try {
	require_once("connectcd102g1.php");
	$NewPage = $_REQUEST['NewPage'];
	$sql6 = "select * from coach c join coachact cc on c.coachNo = cc.coachNo left outer join activitycategory acg on cc.actNo = acg.actNo where acg.actName = '{$NewPage}' order by c.coachNo  limit 1";
	$actLimitCoach = $pdo->query($sql6);
	$actLmCoachs= $actLimitCoach->fetchAll(PDO::FETCH_ASSOC);
	foreach($actLmCoachs as $m=>$actLmCoach){
		$actFirstLmCoach = $actLmCoach['coachName'];
	}


	$sql7 = "select * from coach c join coachcomment acm on c.coachNo = acm.coachNo where c.coachName = '{$actFirstLmCoach}'";
	$actCoachScoreActive = $pdo->query($sql7);
	$actCoachScoreCount = $actCoachScoreActive->rowCount();
	
	$actCoachScoreRows = $actCoachScoreActive->fetchAll(PDO::FETCH_ASSOC);
	$actCoachTotalScore = 0;
	foreach($actCoachScoreRows as $n=>$actCoachScoreRow){
		$actCoachTotalScore += $actCoachScoreRow['score'];
	}
	

	$actCoachSumScore = $actCoachTotalScore/$actCoachScoreCount;
	// echo $actCoachSumScore;
	$sql = "select * from coach c join coachact cc on c.coachNo = cc.coachNo left outer join activitycategory acg on cc.actNo = acg.actNo where acg.actName = '{$NewPage}' order by acg.actName limit 1";
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
								
						</div>


				</div>
				<section class="actCoachSlick regular">
					<!-- <div class="actMobileHead">
						<img src="images/index_icon1.png" alt="">
					</div> -->
					
					</div>
				</section>

				
					<script>

							$(document).ready(function(){
								console.log('執行了~~~~~~~~~~~~~~~~~~~~~~~~~~~');
								var totalsc = parseInt($('.chtotalScore2').text());
								console.log(totalsc);
								$('.chLbPerRating2').children('.chLbPerRatingBar2').animate({width:totalsc+'%'},600);
							})
							
						</script>
				
		
		

	
	

<?php		
	}
	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
<!--footer end-->	
