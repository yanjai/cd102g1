<?php 
try{
	require_once("connectcd102g1.php");
	$sql="select * from coach";
	$bot = $pdo->query($sql);
    $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
	$i=0;
	foreach($bots as $data){
        $i++;
		$quailarr = explode("| ",$data['coachQuail']);
		$totalscore=0;
		$coach = $data['coachNo'];
		$sql2="select * from coach c join coachcomment m on c.coachNo = m.coachNo left outer join member mb on m.memNo = mb.memNo where c.coachNo = $coach and m.verify=0 order by m.commentNo desc LIMIT 3 ";
		$message = $pdo->query($sql2);
		$messages=$message->fetchAll(PDO::FETCH_ASSOC);
		$sql3="select * from coach c join coachcomment m on c.coachNo = m.coachNo left outer join member mb on m.memNo = mb.memNo  where c.coachNo = $coach";
		$total = $pdo->query($sql3);
		$totals=$total->fetchAll(PDO::FETCH_ASSOC);
		$del = $pdo->prepare($sql3);
		$del->execute();
		$count = $del->rowCount();
		$sql4="SELECT * from activitycategory act left outer join coachact cht on act.actNo = cht.actNo left outer join coach c on cht.coachNo =  c.coachNo where cht.coachNo = $coach";
		$act = $pdo->query($sql4);
		$acts=$act->fetchAll(PDO::FETCH_ASSOC);
?>
        <div id="trigger_0<?php echo $i;?>"></div>
        <div class="chWrap" id="chWrap<?php echo $i; ?>">
            <div class="chWrapContent">
                <div class="chImg">
                    <img src="images/<?php echo $data['coachImg']; ?>">
                    <div class="chBtnBox">
                        <button class="chRese">預約教練</button> 
                        <button><a href="chBot.php">諮詢教練</a></button>
                    </div>
                 </div>
                 <div class="chProfile">
			<h4><?php echo $data['coachName']; ?></h4>
			<div class="chDetail">
				<p><?php echo $data['coachIntro']; ?></p>
			</div>
			<div class="chQual">
				<h4>教練資格:</h4>
				<ul>
                    <?php 
                        for($j=0;$j<count($quailarr);$j++){
                            echo '<li>',$quailarr[$j],'</li>';
                        }
                    ?>
				</ul>
			</div>
			<div class="chBtnBox">
				<button class="chRese">預約教練</button>
				<button><a href="chBot.php">諮詢教練</a></button>
			</div>
		</div>
		<div class="chBox">
			<div class="chAct">
				<h4>負責活動</h4>
				<ul>
					<?php foreach($acts as $li){?>
					<li><a href="oneActivity.php?pageNo=<?php echo $li['actNo']; ?>"><i class="fas fa-caret-right"></i>

<?php echo $li['actName']; ?></a></li>
					<?php }?>
					<div class="chBorder"></div>
				</ul>
			</div>
			<div class="chComment">
				<h4>教練評論</h4>
				<div class="chCommentBox">
					<div class="chRating">
						<div class="chRatingBar"></div>
					</div>
					<div class="chtotalScore">
						<?php 
							foreach($totals as $sc){
								$totalscore+= $sc['score'];
							}
							if($count==0){

							}else{
								echo round($totalscore / $count).'%';
							}
							
						?>
					</div><button class="chBtnComment">我要評論<input type="hidden" id='coachNOinHtml' value="<?php $data['coachNo'] ?>"></button>
				</div>
				<div class="chCommentWrap">
					<ul>
						<?php  foreach($messages as $items){
							?>
							<li>
							<div class="chPerImg"><img src="images/<?php echo $items['memImg']; ?>"></div>
							<div class="chPerCommentBox">
								<p><?php echo $items['memName']; ?></p>
								<p>教練評分:</p>
								<div class="chPerRating">
									<div class="chPerRatingBar"></div>
								</div>
								<p><?php echo $items['score']; ?>%</p>
							</div>
							<div class="chPerCommentContent">
								<p><?php echo $items['comment']; ?></p>
							</div>
							<div class="chMembox">
								<p><?php echo $items['commentdate']; ?></p>	
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
    }
}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";
}
?>