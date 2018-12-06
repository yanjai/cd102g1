<?php 
try{
	require_once("connectcd102g1.php");
	$actNo = $_REQUEST['pageNo'];
    $sql="select * from activitycategory act join activitycomment acc on act.actNo = acc.actNO left outer join member mb on acc.memNo = mb.memNo where act.actNo = $actNo and acc.verify = 0 order by acc.commentNo desc";
    $message = $pdo->query($sql);
    $messages=$message->fetchAll(PDO::FETCH_ASSOC);
  ?>
		<div class="chLbAllcommentBox">
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
						<div class="chLbPerContent"><p> <?php echo $item['comment']; ?></p></div>
					</div>
					<div class="chReport"><p class='reportbtn'>檢舉<input type="hidden" value="<?php echo $item['commentNo']; ?>"></p><p><?php echo $item['actdate']; ?></p></div>
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