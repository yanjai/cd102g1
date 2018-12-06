<?php 
try{
    $coachNo = $_REQUEST["coachNo"];
    require_once("connectcd102g1.php");
	$sql="select * from coach where coachNo = $coachNo";
	$bot = $pdo->query($sql);
    while($bots=$bot->fetch(PDO::FETCH_ASSOC)){
	$sql2="SELECT * from activitycategory act left outer join coachact cht on act.actNo = cht.actNo left outer join coach c on cht.coachNo =  c.coachNo where cht.coachNo = $coachNo";
	$actRow = $pdo->query($sql2);
	
?>
      <div class="chContent">
		<div class="chImg"><img src="images/<?php echo 's-'.$bots['coachImg']; ?>"></div>
		<div class="chNameBox"><h4 id="chName"><?php echo $bots['coachName']; ?></h4></div>
		<div class="chBtnBox">
				<button class="chRese"><p>預約</p></button>
				<button><p><a href="chBot.php">諮詢</a></p></button>
				<button class="chBtnComment2"><p>評論</p></button>
		</div>
		<i class="fas fa-chevron-circle-left" id='prevCoach'></i>
		<i class="fas fa-chevron-circle-right" id='nextCoach'></i>
		<div class="chDetail">
			<p><?php echo $bots['coachIntro']; ?></p>
		</div>
		<div class="chAct">
				<h4>負責活動</h4>
				<ul>
					<?php while($actRows = $actRow->fetch(PDO::FETCH_ASSOC)){
						$actImg = explode("| ",$actRows['actItemImg']);
						// for($i =0;$i<count($actImg);$i++){
						// 	$newImg = $actImg[$i];
						// }
						// echo count($actImg);
					?>
					<li>
						<a href="oneActivity.php?pageNo=<?php echo $actRows['actNo']; ?>"><p><?php echo $actRows['actName']; ?></p><img src="images/<?php echo $actImg[2]; ?>"></a>
					</li>
					<?php }?>
					<div class="chBorder"></div>
				</ul>
			</div>
	</div>
<?php 
    }
}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";
}
?>