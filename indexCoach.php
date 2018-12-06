<?php 
try{
	require_once("connectcd102g1.php");
	$sql="select * from coach";
	$bot = $pdo->query($sql);
    $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
	foreach($bots as $data){
		$quailarr = explode("| ",$data['coachQuail']);
		$totalscore=0;
		$coach = $data['coachNo'];
		$sql3="select * from coach c join coachcomment m on c.coachNo = m.coachNo left outer join member mb on m.memNo = mb.memNo  where c.coachNo = $coach";
		$total = $pdo->query($sql3);
		$totals=$total->fetchAll(PDO::FETCH_ASSOC);
		$del = $pdo->prepare($sql3);
		$del->execute();
        $count = $del->rowCount();
        foreach($totals as $item){
            $score = $item['score'];
            $totalscore+=$score;
        }
        $newtotal = ceil($totalscore/$count);
?>
       <div class="coSlide">
            <div class="slideImgWrap">
                <div class="slideImg" style="background-image: url(images/s-<?php echo $data['coachImg'];?>);"></div>
                <div class="slideImgRev"></div>
            </div>
            <div class="slideTitleWrap">
                <h3 class="slideTitle"><div class="slideBox"></div><span class="slideTitleInner"><?php echo $data['coachName'];?></span></h3>
                <h4 class="slideSub"><div class="slideBox"></div><span class="slideSubInner">教練評分:<?php echo $newtotal ?>%</span></h4>
                <a href="coach.php#catch<?php echo $data['coachNo'] ?>" class="slideMore"><span class="slideMoreInner">More</span></a>
            </div>
        </div>
<?php 
    }
}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";
}
?>