<?php 
    try{
        require_once("../connectcd102g1.php");
        $colorArr = array();
        $officialArr = array();
        $custorderNo = $_REQUEST['UpcustorderNo'];
        // echo $custorderNo;
        $sql = "select * from custorderlist where custorderNo = $custorderNo";
        $boot = $pdo->query($sql);
        $boots = $boot->fetchAll(PDO::FETCH_ASSOC);

        $sql2="SELECT * FROM custorderlist cus left outer join colorlist col on cus.colorNo = col.colorNo left outer join officialimglist offi on cus.officialImgNo = offi.officialImgNo where cus.custorderNo = $custorderNo";
        $bot = $pdo->query($sql2);
        $bots = $bot->fetch(PDO::FETCH_ASSOC);
        echo "<tr>
                 <th>成品圖片</th>
                 <th>版型</th>
                 <th>顏色</th>
                 <th>尺寸</th>
                 <th>官方圖片</th>
                 <th>使用者上傳圖片</th>
             </tr>"; 
        foreach($boots as $data2){
            
?>          
            <tr>
                <td>
                    <div class="FinalcustoImg"><img src="../back_images/<?php echo $data2['FinalcustoImgName']; ?>.png">
                </td>
<?php
                if($data2['clothNo']==1 || $data2['clothNo']==3){
                    $data2['clothNo'] = "長版";
                }
                else{
                    $data2['clothNo'] = "短版";
                } 
?>
                <td><?php echo $data2['clothNo']; ?></td>
                <td><?php echo $bots['colorName'];?></td>
                <td><?php echo $data2['size']; ?></td>                
<?php
                
?>
                <!-- 判斷使用者是自己上傳圖片或者選擇官方圖案 -->
<?php               
                if($bots['officialImgName']==''){
                    $bots['officialImgName'] = "-";
?>
                <td>
                    <?php echo $bots['officialImgName'] ?>
                </td> 
<?php
                }else{
?>
                <td>
                    <img src="../back_images/<?php echo $bots['officialImgName'] ?>">
                </td>  
<?php
                }     
?>  

<?php               
                if($data2['custoImgNo']==''){
                    $data2['custoImgNo'] = "-";
?>
                <td>
                    <?php echo $data2['custoImgNo'] ?>
                </td> 
<?php
                }else{
?>
                <td>
                    <img src="../back_images/<?php echo $data2['custoImgNo'] ?>">
                </td>  
<?php
                }             
?> 
                             
            </tr>

<?php
        }
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>