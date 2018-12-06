<?php 
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST['searchContent'])){
            $searchContent = $_REQUEST['searchContent'];
            $sql = "select * from activitycategory where actName like ?";
            $bot = $pdo->prepare($sql);
            $bot->execute(array("%$searchContent%"));
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "select * from activitycategory";
            $bot = $pdo->query($sql);
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }


        echo '<div class="Tr"><div class="col col-num">活動編號</div><div class="col">活動名稱</div><div class="col">教練名稱</div><div class="col">活動類型</div><div class="col col-num">活動費用</div><div class="col">活動圖片</div><div class="col">活動地點</div><div class="col col-big">活動簡介</div><div class="col col-num">編輯</div></div>';
        foreach($bots as $data){
            $str ="";
            $actNo = $data['actNo'];
            $sql2 ="select * from activitycategory act left outer join coachact cact on act.actNo = cact.actNo left OUTER join coach ch on cact.coachNo = ch.coachNo where act.actNo =$actNo";
            $actrow = $pdo->query($sql2);
            $actrows=$actrow->fetchAll(PDO::FETCH_ASSOC);
            echo '<div class="Tr">';
            echo '<input class="actNoHide" type="hidden" name="actNoHide" value="',$data['actNo'],'">';
            echo '<div class="col col-num">',$data['actNo'],'</div>';
            echo '<div class="col">',$data['actName'],'</div>';
            echo '<div class="col">';
                foreach($actrows as $item){
                    $str.= $item["coachName"].',';
                }
                echo substr($str,0,-1);
            echo '</div>';
            echo '<div class="col">',$data['actType'],'</div>';
            echo '<div class="col col-num"><input type="text" name="" value="',$data['actPrice'],'"></div>';
            echo '<div class="col">',$data['actItemImg'],'</div>';
            echo '<div class="col">',$data['actLoc'],'</div>';
            echo '<div class="col col-big"><textarea>',$data['actContent'],'</textarea></div>';
            echo '<div class="col col-num"><button class="upBtn">修改</button></div>';
            echo '</div>';
            // ,$data['coachtNames'],
		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }



?>