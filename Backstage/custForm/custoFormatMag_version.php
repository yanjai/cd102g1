<?php 
    try{
        require_once("../connectcd102g1.php");

        if(isset($_REQUEST["UpversionNo"])){
            $versionNo = $_REQUEST["UpversionNo"];
            $versionName = $_REQUEST["UpversionName"];
            $versionContents = $_REQUEST["UpversionContents"];
            $versionPrice = $_REQUEST["UpversionPrice"];
            $gender = $_REQUEST["Upgender"];
            echo $versionNo,$versionName,$versionContents,$versionPrice,$gender;
            $sql2 = "UPDATE  versionlist set versionName = :UpversionName ,versionContents = :UpversionContents ,versionPrice = :UpversionPrice, gender = :Upgender where versionNo = :UpversionNo";
            $Upversion = $pdo->prepare($sql2);
            $Upversion->bindParam(':UpversionNo',$versionNo);
            $Upversion->bindParam(':UpversionName', $versionName);
            $Upversion->bindParam(':UpversionContents', $versionContents);
            $Upversion->bindParam(':UpversionPrice', $versionPrice);
            $Upversion->bindParam(':Upgender',$gender);
            $Upversion->execute();
        }

        $sql = "select * from versionlist";
        $bot = $pdo->query($sql);
        $bots=$bot->fetchAll(PDO::FETCH_ASSOC);


        echo    "<tr>
                    <th>版型編號</th>
                    <th>版型名稱</th>
                    <th>版型說明</th>
                    <th>版型價格</th>
                    <th>性別</th>
                    <th>操作</th>
                </tr>";

        foreach($bots as $data){
?>          
            <tr> 
                <td><?php echo $data['versionNo']; ?></td>
                <td><input type="text" name="versionName" value="<?php echo $data['versionName']; ?>"></td>
                <td class="col-big"><textarea style="width:200px;height:80px;" name="versionContents"><?php echo $data['versionContents']; ?></textarea></td>
                <td><input type="text" name="versionPrice" value="<?php echo $data['versionPrice']; ?>"></td>                

                <td>
                    <select>                
                    
<?php
                        if($data['gender']==0){
                            echo '<option value="0">男生</option><option value="1">女生</option>';
                        }else{
                            echo '<option value="1">女生</option><option value="0">男生</option>';
                        }
?>
                    </select>
                </td>

                <td><button class="alter2">修改</button></td>
            </tr> 
<?php 
		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>