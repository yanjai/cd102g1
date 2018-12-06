<?php 
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST['commentNo'])){
            $commentNo= $_REQUEST['commentNo'];
            $verifyVal = $_REQUEST["verifyVal"];
            $report = 0;
            if($verifyVal==0){
                $sql2 = "UPDATE  coachcomment set report = :report, verify = :verify where commentNo = :commentNo";
                $upcoach = $pdo->prepare($sql2);
                $upcoach->bindParam(':report', $report);
                $upcoach->bindParam(':verify', $verifyVal);
            }else{
                $sql2 = "UPDATE  coachcomment set verify = :verify where commentNo = :commentNo";
                $upcoach = $pdo->prepare($sql2);
                $upcoach->bindParam(':verify', $verifyVal);
            }
            $upcoach->bindParam(':commentNo',$commentNo);
            $upcoach->execute();
        }
        $sql = "select * from coachcomment where report > 0";
        $bot = $pdo->query($sql);
        $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
            echo '<table><tr>
                  <th>評論編號</th>
                  <th>評論內容</th>
                  <th>被檢舉次數</th>
                  <th>審核</th>
                  <th>編輯</th></tr>';
        foreach($bots as $data){
?>         
        <tr>
            <td class="fno"><?php echo $data['commentNo']; ?></td>
            <td><?php echo $data['comment']; ?></td>
            <td><?php echo $data['report']; ?></td>
            <td><select class='selectid'>
                    <?php if($data['verify']==0){ ?>
                        <option value="0">未審核</option>
                        <option value="1">未通過</option>
                    <?php }else{ ?>
                        <option value="1">未通過</option>
                        <option value="0">未審核</option>
                    <?php } ?>
                    
                </select>
            </td>
            <td><button class="send">送出</button></td>
        </tr>
<?php
    } 
    echo '</table>';
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>