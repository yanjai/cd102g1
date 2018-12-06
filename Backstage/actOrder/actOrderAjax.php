<?php 
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST["Upcontent"])){
            $botNo = $_REQUEST["Upbot"];
            $content = $_REQUEST["Upcontent"];
            $ans = $_REQUEST["Upans"];
            echo $botNo,$content,$ans;
            $sql2 = "UPDATE  bot set content = :upcontent , ans = :upans where bot_num = :upbot";
            $upbot = $pdo->prepare($sql2);
            $upbot->bindParam(':upbot',$botNo);
            $upbot->bindParam(':upcontent', $content);
            $upbot->bindParam(':upans',$ans);
            $upbot->execute();
        }
        if(isset($_REQUEST['searchContent'])){
            $searchContent = $_REQUEST['searchContent'];
            $sql = "select * from actorderlist al left outer join coach c on al.coachNo = c.coachNo left outer join activitycategory act on al.actNo = act.actNo left outer join member m on al.memNo = m.memNo where al.memNo like ? order by al.memNo,al.ActOrderDate";
            $bot = $pdo->prepare($sql);
            $bot->execute(array("%$searchContent%"));
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "select * from actorderlist al left outer join coach c on al.coachNo = c.coachNo left outer join activitycategory act on al.actNo = act.actNo left outer join member m on al.memNo = m.memNo order by al.ActOrderNo desc";
            $bot = $pdo->query($sql);
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }
?>
        <tr>
        <th>訂單編號</th>
        <th>會員姓名</th>
        <th>活動</th>
        <th>教練姓名</th>
        <th>活動日期</th>
        <th>訂單金額</th>
        <th>下單日期</th>
        <th>出席紀錄</th>
        </tr>
        <?php
        foreach($bots as $data){
            if($data['attendStatus']==0){
                $data['attendStatus']='未出席';
            }else{
                $data['attendStatus']='已出席';
            }
            ?>
            <tr> 
                <td><?php echo $data['ActOrderNo']; ?></td>
                <td><?php echo $data['memName']; ?></td>
                <td><?php echo $data['actName']; ?></td>
                <td><?php echo $data['coachName']; ?></td>
                <td><?php echo $data['ActOrderDate']; ?></td>
                <td><?php echo $data['ActOrderPrice']; ?></td>
                <td><?php echo $data['orderdate']; ?></td>
                <td><?php echo $data['attendStatus']; ?></td>
            </tr>
<?php       
        }
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>