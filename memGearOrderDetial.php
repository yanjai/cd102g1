<?php 
    try{
        require_once("connectcd102g1.php");
        $gearOrderNo = $_REQUEST['gearNo'];
        $sq2 = "SELECT * FROM gearorders gr left outer join gearorderdetails gd on gr.gearOrderNo = gd.gearOrderNo LEFT OUTER JOIN gearlist gl on gd.gearNo = gl.gearNo where gr.gearOrderNo = $gearOrderNo";
        $order = $pdo->query($sq2);
        $orders=$order->fetchAll(PDO::FETCH_ASSOC);
            echo '<div class="detiaClose"><img src="images/xx.png"></div>';
            echo"<div class='detialTable'>";
            echo "<div class='col b_table_img'>圖片</div>
            <div class='col b_typeNo'>裝備類別</div>
            <div class='col col-num b_gearNo'>裝備編號</div>
            <div class='col col-num b_gearName'>裝備名稱</div>
            <div class='col b_gearPrice'>單價</div>
            <div class='col b_gearQty'>數量</div>
            <div class='col b_subtotal'>小計</div>";
        foreach($orders as $item){
            
            echo '<div class="col b_table_img"><img src="back_images/',$item['gearPic'],'"></div>'; //5
            echo '<div class="col">',$item['gearTypeNo'],'</div>'; //3
            echo '<div class="col">',$item['gearNo'],'</div>'; //2
            echo '<div class="col col-num b_gearName">',$item['gearName'],'</div>'; //4
            echo '<div class="col">',$item['gearPrice'],'</div>'; //6
            echo '<div class="col">',$item['gearOrderQty'],'</div>'; //7
            echo '<div class="col">',$item['orderSubtotal'],'</div>'; //8
        }
        ?>
        </div> 
            <div class="detialMobileBox"> 
                <div class="mobileCol detialImg"><p>圖片</p><img src="back_images/<?php echo $item['gearPic']?>"></div>
                <div class="mobileCol"><p>裝備類別</p><?php echo $item['gearTypeNo']?></div>
                <div class="mobileCol"><p>裝備編號</p><?php echo $item['gearNo']?></div>
                <div class="mobileCol"><p>裝備名稱</p><?php echo $item['gearName']?></div>
                <div class="mobileCol"><p>單價</p><?php echo $item['gearPrice']?></div>
                <div class="mobileCol"><p>數量</p><?php echo $item['gearOrderQty']?></div>
                <div class="mobileCol"><p>小計</p><?php echo $item['orderSubtotal']?></div>


            </div>




        <?php
            
            
        
        
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>