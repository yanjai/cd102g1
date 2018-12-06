<?php 
    try{
        require_once("../connectcd102g1.php");
        $gearOrderNo = $_REQUEST['gearOrderNo'];
        $sql = "SELECT * FROM gearorders gr left outer join gearorderdetails gd on gr.gearOrderNo = gd.gearOrderNo LEFT OUTER JOIN gearlist gl on gd.gearNo = gl.gearNo where gr.gearOrderNo = $gearOrderNo limit 1 ";
        $bot = $pdo->query($sql);
        $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        echo "<div id='closeLB_btn'><img src='../images/xx.png'></div>";
        foreach($bots as $data){
            echo '<div class="receiverdetails">';

            echo '<div class="col col-num gearlistNo">訂單號碼：',$data['gearOrderNo'],'</div>';  //1
            echo '<div class="col totalAmount">總金額：',$data['totalAmount'],'</div> ';
            echo '<div class="col paymentType">付款方式：',$data['paymentType'],'</div>'; //12
            echo '<div class="col receiverName">收件人姓名：',$data['receiverName'],'</div>'; //9
            echo '<div class="col receiverPhoneNo">收件人聯絡：',$data['receiverPhoneNo'],'</div>'; //10
            echo '<div class="col receiverAddress">收件人地址：',$data['receiverAddress'],'</div>'; //11
           
            echo '</div>';
        }

        $sq2 = "SELECT * FROM gearorders gr left outer join gearorderdetails gd on gr.gearOrderNo = gd.gearOrderNo LEFT OUTER JOIN gearlist gl on gd.gearNo = gl.gearNo where gr.gearOrderNo = $gearOrderNo";
        $order = $pdo->query($sq2);
        $orders=$order->fetchAll(PDO::FETCH_ASSOC);
            echo "<table class='listtable'>";
            echo "<tr><td class='col b_table_img'>圖片</td><td class='col b_typeNo'>裝備類別</td><td class='col col-num b_gearNo'>裝備編號</td><td class='col col-num b_gearName'>裝備名稱</td><td class='col b_gearPrice'>單價</td><td class='col b_gearQty'>數量</td><td class='col b_subtotal'>小計</td></tr>";
        foreach($orders as $item){
            echo "<tr>";
            echo '<td><img src="../back_images/',$item['gearPic'],'"></td>'; //5
            echo '<td>',$item['gearTypeNo'],'</td>'; //3
            echo '<td>',$item['gearNo'],'</td>'; //2
            echo '<td>',$item['gearName'],'</td>'; //4
            echo '<td>',$item['gearPrice'],'</td>'; //6
            echo '<td>',$item['gearOrderQty'],'</td>'; //7
            echo '<td>',$item['orderSubtotal'],'</td>'; //8
            echo "</tr>";
            
        }

    }catch(PDOException $e){
        echo "</table>";
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }



?>