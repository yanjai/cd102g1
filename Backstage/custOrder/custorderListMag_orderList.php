<?php 
    try{
        require_once("../connectcd102g1.php");

        if(isset($_REQUEST['searchContent'])){
            $searchContent = $_REQUEST['searchContent'];
            $sql1 = "select * from custorderlist cl left outer join member m on cl.memNo = m.memNo where cl.custorderNo like ?";
            $bot = $pdo->prepare($sql1);
            $bot->execute(array("%$searchContent%"));
            $bots = $bot->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql1 = "select * from custorderlist cl left outer join member m on cl.memNo = m.memNo order by cl.custorderNo desc";
            $bot = $pdo->query($sql1);
            $bots = $bot->fetchAll(PDO::FETCH_ASSOC);
        }
        echo "<tr>
                <th>訂單編號</th>
                <th>訂單日期</th>
                <th>會員姓名</th>
                <th>電話</th>
                <th>地址</th>
                <th>成品圖片</th>
                <th>訂單總金額</th>
                <th>訂單明細</th>
            </tr>";
        
        foreach($bots as $data){
            echo '<tr>';
                echo '<td>',$data['custorderNo'],'</td>';  
                echo '<td>',$data['custorderDate'],'</td>';     
                echo '<td>',$data['memName'],'</td>';
                echo '<td>',$data['custorTel'],'</td>';
                echo '<td>',$data['custorAddr'],'</td>';
                echo '<td><div class="col"><img src="../back_images/',$data['FinalcustoImgName'],'.png"></td>';
                echo '<td>',$data['totalPrice'],'</td>';
?> 
                <td><button class="orderdes">訂單明細</button></td>
<?php
            echo '</tr>';

		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>