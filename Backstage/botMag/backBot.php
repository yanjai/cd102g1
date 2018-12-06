
<?php 
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST["content"])){
            $content = $_REQUEST["content"];
            $ans = $_REQUEST["ans"];
            $sql2 = "INSERT INTO bot(bot_num,content,ans)values(null,'$content','$ans')";
		    $pdo->exec($sql2);
        }
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
            $sql = "select * from bot where content like ?";
            $bot = $pdo->prepare($sql);
            $bot->execute(array("%$searchContent%"));
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "select * from bot";
            $bot = $pdo->query($sql);
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }
?>
        <tr>
        <th>關鍵字編號</th>
        <th>關鍵字內容</th>
        <th>關鍵字對應回答</th>
        <th>編輯</th>
        </tr>
        <?php
        foreach($bots as $data){
            ?>
            <tr> 
                <td><?php echo $data['bot_num']; ?></td>
                <td><input type="text" name="content" value="<?php echo $data['content']; ?>"></td>
                <td><input type="text" name="ans" value="<?php echo $data['ans']; ?>"></td>
                <td><button class="alter">修改</button></td>
            </tr>
<?php       
        }
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>