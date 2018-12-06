<?php 
    try{
        require_once("connectcd102g1.php");
        $memNo = $_REQUEST['memOrderNo'];
        $sql1 = "select * from actorderlist al left outer join coach c on al.coachNo = c.coachNo left outer join activitycategory act on al.actNo = act.actNo where memNo = $memNo order by al.ActOrderNo desc";
        $bot = $pdo->query($sql1);
        $bots = $bot->fetchAll(PDO::FETCH_ASSOC);
        $nowdate = date("Y-m-d");
        foreach($bots as $data){
?> 
            <div class="orderBox">
                <div class="orderImg">
                <h4>訂單編號:<?php echo $data['ActOrderNo'] ?></h4>
                <?php
                    if(strtotime($nowdate)>strtotime($data['ActOrderDate'])){
                        ?>
                        <div class="expired2"><img src="images/expired.png"></div>
                        <img class="qrimg" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://140.115.236.72/demo-projects/cd102/CD102G1/Backstage/actQrcodeCheck.php?ActOrderNo=<?php echo $data['ActOrderNo'] ?>&choe=UTF-8">
                        
                    <?php }elseif($data['attendStatus']==1){?>
                        <div class="expired"><img src="images/black_used.png"></div>
                        <img class="qrimg" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://140.115.236.72/demo-projects/cd102/CD102G1/Backstage/actQrcodeCheck.php?ActOrderNo=<?php echo $data['ActOrderNo'] ?>&choe=UTF-8">
                    <?php }else{?>
                        <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://140.115.236.72/demo-projects/cd102/CD102G1/Backstage/actQrcodeCheck.php?ActOrderNo=<?php echo $data['ActOrderNo'] ?>&choe=UTF-8">
                    <?php }?>
                </div>
                <div class="orederDtail">
                    <div class="orederbox receiveAdd">活動名稱:   <?php echo $data['actName'] ?></div>
                    <div class="orederbox receivePer">負責教練:   <?php echo $data['coachName'] ?></div>
                    <div class="orederbox receiveTel">活動地點:   <?php echo $data['actLoc'] ?></div>
                    <div class="orederbox orderDate">活動日期:  <?php echo $data['ActOrderDate'] ?></div>
                    <div class="orederbox orderDate">下單日期:  <?php echo $data['orderdate'] ?></div>
                    <div class="orederbox orderPrice">價格: <?php echo $data['ActOrderPrice'] ?>元</div>
                </div>
            </div>

            <div class="detialLightBox">
                
            </div>
                <!-- <td><button class="orderdes">訂單明細</button></td> -->
<?php

		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>