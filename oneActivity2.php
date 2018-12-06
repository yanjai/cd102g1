
<?php
try {
	require_once("connectcd102g1.php");
	$NewPage = $_REQUEST['NewPage'];
	$sql = "select * from activitycategory where actName = '{$NewPage}'";
	$Activitys = $pdo->query($sql);
	$ActRows = $Activitys->fetchAll(PDO::FETCH_ASSOC);

	$sql2 = "select actName from activitycategory";
	$sql4="select * from activitycategory acg join activitycomment acm on acg.actNo = acm.actNo where acg.actName = '{$NewPage}'";
	$actCounts=$pdo->query($sql2);
	$totalAct= $actCounts->rowCount();
	$actBars=$pdo->query($sql4);
	$count = $actBars->rowCount();
	/**/
	foreach($ActRows as $i=>$ActRow){
		$pageMS = $ActRow['actNo'];
		$pageMS1 =$pageMS-1;
	}
	$X = $Activitys->rowCount();
	$sql2="select * from activitycategory order by actNo limit 0,$pageMS1";//該物件前面
	$Activitys = $pdo->query($sql);   
	$sql3="select * from activitycategory order by actNo limit $pageMS1, $totalAct"; //該物件後面全部
	$Activitys2=$pdo->query($sql2);
	$ActRows2=$Activitys2->fetchAll(PDO::FETCH_ASSOC);
	$Activitys3=$pdo->query($sql3);
	$ActRows3=$Activitys3->fetchAll(PDO::FETCH_ASSOC);
	$ActRowPU = array_merge($ActRows3,$ActRows2);
	$ActRowPUlen = count($ActRowPU);


	/**/
	$actBarRows=$actBars->fetchAll(PDO::FETCH_ASSOC);
	$totalScore = 0;
	foreach($actBarRows as $j=>$actBarRow){
		$totalScore += $actBarRow['score'];

	}
	$sumScore = $totalScore/$count;
	
	foreach($ActRows as $i=>$ActRow){
?>


			<span class="actSMBig bounce animated"><?php echo $ActRow['actName']; ?></span>
			<p class="actIntr bounce animated"><?php echo $ActRow['actContent']; ?></p>
			<p class="bounce animated"><span class="actFontWeight">費用:</span><?php echo $ActRow['actPrice']; ?></p>
			<p class="bounce animated"><span class="actFontWeight">評分:</span></p>
			<div class="chLbPerRating">
				<div class="chLbPerRatingBar"></div>
			</div>
			<div class="chtotalScore">
				<?php 
					echo round($sumScore).'%';
						
				?>
				<script>
					$(document).ready(function(){
						var totalsc = parseInt($('.chtotalScore').text());
						console.log(totalsc);
						$('.chLbPerRating').children('.chLbPerRatingBar').animate({width:totalsc+'%'},600);
					})
					
				</script>
			</div>
			<select class="actRWDselect" name="" id="">
				
					<?php for($s=0;$s<$ActRowPUlen;$s++){
					?>
					<option value="<?php echo $ActRowPU[$s]['actName']; ?>"><?php echo $ActRowPU[$s]['actName']; ?></option>
					<?php
				} ?>
					
			</select>
			<div class="actNextStep"><p>下一步</p></div>
			<?php 
			$actTypeSelect = explode("| ", $ActRow["actType"]);
			
			 ?>
			<input type="hidden" name="" value="<?php echo $actTypeSelect[0]; ?>">
			<script>
				$(document).ready(function(){
					var actSType =$('.actSelectMesseage').find('input').val();
					console.log($('.actSelectMesseage').find('input').val());
					if(actSType == '浮潛類'){
						$('.actIconPipe').css('display','inline-block');
						$('.actIconBottle').css('display','none');

					}else if(actSType == '深潛類'){
						$('.actIconBottle').css('display','inline-block');
						$('.actIconPipe').css('display','none');
					}
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
