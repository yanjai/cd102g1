<?php 
    try{
        require_once("connectcd102g1.php");
        $memNo = $_REQUEST['memOrderNo'];
        $sql1 = "select * from gearorders where memNo = $memNo order by gearOrderNo desc";
        $bot = $pdo->query($sql1);
        $bots = $bot->fetchAll(PDO::FETCH_ASSOC);
        foreach($bots as $data){
?> 
            <div class="orderBox">
                <div class="orderImg"><h4>訂單編號:<?php echo $data['gearOrderNo'] ?></h4></div>
                <div class="orederDtail">
                    <div class="orederbox gearReceivePer">收件人:   <?php echo $data['receiverName'] ?></div>
                    <div class="orederbox receiveAllPrice">總金額:   <?php echo $data['totalAmount'] ?></div>
                    <div class="orederbox receiveDate">下單日期:</br>   <?php echo $data['orderDate'] ?></div>
                    <input type="hidden" value="<?php echo $data['gearOrderNo'] ?>">
                    <button class="detialBtn">詳細</button>
                </div>
            </div>
                <!-- <td><button class="orderdes">訂單明細</button></td> -->
<?php

		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>