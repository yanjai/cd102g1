<?php 
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST['searchContent'])){
            $searchContent = $_REQUEST['searchContent'];
            $sql = "select * from gearlist where gearName like ?";
            $bot = $pdo->prepare($sql);
            $bot->execute(array("%$searchContent%"));
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }else{  
            $sql = "select * from gearlist";
            $bot = $pdo->query($sql);
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }
        echo '<div class="Tr">
            <div class="col col-num">商品編號</div>
            <div class="col">商品類別</div>
            <div class="col">商品名稱</div>
            <div class="col col-big">商品資料</div>
            <div class="col">商品圖片</div>
            <div class="col col-num">商品價格</div>
            <div class="col col-num">編輯</div>
        </div>';
        foreach($bots as $data){
            echo '<div class="Tr">';
            echo '<div class="col col-num">',$data['gearNo'],'</div>';
            echo '<div class="col">',$data['gearTypeNo'],'</div>';
            echo '<div class="col col-num">',$data['gearName'],'</div>';
            echo '<div class="col ">',$data['gearInfo'],'</div>';
            echo '<div class="col"><img src="../back_images/',$data['gearPic'],'"></div>';
            echo '<div class="col">',$data['gearPrice'],'</div>';
            echo '<input  type="hidden" name="gearStatus" value="1">';
            echo '<div class="col col-big "><button class="onBtn" style="background-color:#07336e;">上架</button><button class="offBtn" style="background-color:#bbb;">下架</button></div>';

            echo '</div>';
        }
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }



?>