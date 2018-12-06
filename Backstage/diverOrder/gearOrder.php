<?php 
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST['searchContent'])){
            $searchContent = $_REQUEST['searchContent'];
            $sql = "select * from gearorders where memNo like ? order by memNo";
            $bot = $pdo->prepare($sql);
            $bot->execute(array("%$searchContent%"));
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "select * from gearorders order by gearOrderNo desc";
            $bot = $pdo->query($sql);
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }
        echo '<div class="Tr">
                <div class="col col-num">訂單編號</div>
                <div class="col">會員編號</div>
                <div class="col">收件人姓名</div>
                <div class="col col-big">收件人電話</div>
                <div class="col">收件人地址</div>
                <div class="col col-num">下單日期</div>
                <div class="col col-num">付款方式</div>
                <div class="col col-num">訂單總金額</div>
                <div class="col">訂單明細</div>
            </div>';
        foreach($bots as $data){
            echo '<div class="Tr">';
            echo '<div class="col col-num">',$data['gearOrderNo'],'</div>';
            echo '<div class="col">',$data['memNo'],'</div>';
            echo '<div class="col col-num">',$data['receiverName'],'</div>';
            echo '<div class="col ">',$data['receiverPhoneNo'],'</div>';
            echo '<div class="col">',$data['receiverAddress'],'</div>';
            echo '<div class="col">',$data['orderDate'],'</div>';
            echo '<div class="col">',$data['paymentType'],'</div>';
            echo '<div class="col">',$data['totalAmount'],'</div>';
            echo '<div class="col"><button class="orderDetails" style="background-color:#07336e;">訂單明細</button></div>';
            echo '</div>';
        }
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }



?>