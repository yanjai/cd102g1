<?php 
try{
	require_once("connectcd102g1.php");
	if(isset($_REQUEST["coachNo2"])){
		$UpcoachNo = $_REQUEST["coachNo2"];
		$Upnewscore = $_REQUEST["newscore"];
		$Upcontent = $_REQUEST["content"];
		$Upmember = $_REQUEST["memNo"];
		$update = date("Y/m/d");
		$sql3="INSERT INTO activitycomment(commentNo,actNo,memNo,comment,score,report,verify,actdate)values(null,'$UpcoachNo','$Upmember','$Upcontent','$Upnewscore','0','0','$update')";
		$pdo->exec($sql3);
		$coachNo = $_REQUEST["coachNo2"];
	}else{
		$coachNo = $_REQUEST["coachNo"];
	}
    $sql="select * from activitycategory c join activitycomment m on c.actNo = m.actNo left outer join member mb on m.memNo = mb.memNo where c.actNo =  $coachNo and m.verify = 0 ORDER BY m.commentNo desc";
    $message = $pdo->query($sql);
    $messages=$message->fetchAll(PDO::FETCH_ASSOC);
    $del = $pdo->prepare($sql);
	$del->execute();
	$count = $del->rowCount();

  ?>
    <input type="hidden" value='<?php echo $count ?>' id='count'>
			<ul>
                <?php foreach($messages as $item){ ?>
				<li>
					<div class="chLbImgName">
						<div class="chLbPerImg">
							<img src="images/<?php echo $item['memImg']; ?>">
						</div>
					</div>
					<div class="chLbPercommentBox">
						<div class="chLbPerName">
							<p><?php echo $item['memName']; ?></p>
						</div>
						<p>教練評分:</p>
						<div class="chLbPerRating">
							<div class="chLbPerRatingBar"></div>
						</div>
						<div class="chLbPerScore">
                            <?php echo $item['score'].'%';?>
						</div>
						<div class="chLbPerContent"><p><?php echo $item['comment']; ?></p></div>
					</div>
					<div class="chReport"><p class='reportbtn'>檢舉<input type="hidden" value="<?php echo $item['commentNo']; ?>"></p></div>
					<div class="chPerDate"><p><?php echo $item['actdate']; ?></p></div>
				</li>
                <?php } ?>
			</ul>
		</div>
  <?php
}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";
}
?>