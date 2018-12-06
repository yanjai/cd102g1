<?php 
    try{
        require_once("connectcd102g1.php");
        $memNo = $_REQUEST['memOrderNo'];
        $sql1 = "select * from custorderlist cl left outer join colorlist cll on cl.colorNo = cll.colorNo left outer join versionlist vl on cl.clothNo = vl.versionNo where memNo = $memNo order by cl.custorderNo desc";
        $bot = $pdo->query($sql1);
        $bots = $bot->fetchAll(PDO::FETCH_ASSOC);
        foreach($bots as $data){
?> 
            <div class="orderBox">
                <div class="orderImg"><h4>訂單編號:<?php echo $data['custorderNo'] ?></h4><img src="back_images/<?php echo $data['FinalcustoImgName'] ?>.png"></div>
                <div class="orederDtail">
                    <div class="orederbox spec">
                        <h4>產品規格</h4>
                        <div class="specbox productSize">尺寸:  <?php echo $data['size'] ?></div>
                        <div class="specbox productColor">顏色: <?php echo $data['colorName'] ?></div>
                        <div class="specbox productVersion">版型:   <?php echo $data['versionName'] ?></div>
                    </div>
                    <div class="orederbox receivePer">收件人:   <?php echo $data['custorName'] ?></div>
                    <div class="orederbox receiveAdd">收件人地址:   <?php echo $data['custorAddr'] ?></div>
                    <div class="orederbox receiveTel">收件人電話:   <?php echo $data['custorTel'] ?></div>
                    <div class="orederbox orderDate">訂單日期:  <?php echo $data['custorderDate'] ?></div>
                    <div class="orederbox orderPrice">價格: <?php echo $data['totalPrice'] ?>元</div>
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