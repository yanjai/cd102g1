<?php 
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST['coachNo'])){
            $coachNo= $_REQUEST['coachNo'];
            $coachName = $_REQUEST["coachName"];
            $coachQ = $_REQUEST["coachQ"];
            $coachInfo = $_REQUEST["coachInfo"];
            $coachYear = $_REQUEST["coachYear"];
            $coachImg = $_REQUEST["coachImg"];
            $sql2 = "UPDATE  coach set coachName = :coachName , coachQuail = :coachQ, coachIntro = :coachInfo, seniority = :coachYear, coachImg = :coachImg where coachNo = :coachNo";
            $upcoach = $pdo->prepare($sql2);
            $upcoach->bindParam(':coachNo',$coachNo);
            $upcoach->bindParam(':coachName', $coachName);
            $upcoach->bindParam(':coachQ',$coachQ);
            $upcoach->bindParam(':coachInfo',$coachInfo);
            $upcoach->bindParam(':coachYear', $coachYear);
            $upcoach->bindParam(':coachImg',$coachImg);
            $upcoach->execute();
        }
        $sql = "select * from coach";
        $bot = $pdo->query($sql);
        $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
            echo '<div class="Tr">
                <div class="col">教練編號</div>
                <div class="col">教練名稱</div>
                <div class="col">教練資格</div>
                <div class="col col-big">教練簡介</div>
                <div class="col col-num">年資</div>
                <div class="col">教練圖片</div>
                <div class="col">編輯</div>
                </div>';
        foreach($bots as $data){
            echo '<div class="Tr">';
            echo '<div class="col">',$data['coachNo'],'</div>';
            echo '<div class="col"><input name="coachName" value="',$data['coachName'],'"></div>';
            echo '<div class="col"><textarea>',$data['coachQuail'],'</textarea></div>';
            echo '<div class="col col-big"><textarea>',$data['coachIntro'],'</textarea></div>';
            echo '<div class="col col-num"><input type="text" value="',$data['seniority'],'"></div>';
            echo '<div class="col"><label><input type="file" class="upfile" name="upfile"><img class="fileimg" src="../back_images/',$data['coachImg'],'"></label></div>';
            echo '<div class="col"><button class="alter">修改</button></div>';
            echo '</div>';
		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }



?>