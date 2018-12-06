<?php 
    try{
        require_once("../connectcd102g1.php");
                
        // 修改
        if(isset($_REQUEST["UpcolorNo"])){
            $colorNo = $_REQUEST["UpcolorNo"];
            $colorName = $_REQUEST["UpcolorName"];
            $colorImg = $_REQUEST["UpcolorImg"];
            $gender = $_REQUEST["Upgender"];
            echo $colorNo,$colorName,$gender;
            $sql2 = "UPDATE colorlist set colorName = :UpcolorName , colorImg = :UpcolorImg , gender = :Upgender where colorNo = :UpcolorNo";
            $Upcolor = $pdo->prepare($sql2);
            $Upcolor->bindParam(':UpcolorNo',$colorNo);
            $Upcolor->bindParam(':UpcolorName', $colorName);
            $Upcolor->bindParam(':UpcolorImg', $colorImg);
            $Upcolor->bindParam(':Upgender',$gender);
            $Upcolor->execute();
        }

        // 上下架
        if(isset($_REQUEST["colorNo"])){
            $colorNo = $_REQUEST["colorNo"];
            $colorStatus = $_REQUEST["colorStatus"];

            if($colorStatus==0){
                $colorStatus = 1;
            }else{
                $colorStatus = 0;
            }

            echo $colorNo,$colorStatus;
            $sql2 = "UPDATE colorlist set colorStatus = :colorStatus where colorNo = :UpcolorNo";
            $Upcolor = $pdo->prepare($sql2);
            $Upcolor->bindParam(':UpcolorNo',$colorNo);
            $Upcolor->bindParam(':colorStatus',$colorStatus);
            $Upcolor->execute();
        }

        $sql = "select * from colorlist";
        $bot = $pdo->query($sql);
        $bots = $bot->fetchAll(PDO::FETCH_ASSOC); 

        echo "<tr>
                <th>顏色編號</th>
                <th>顏色名稱</th>
                <th>顏色圖片</th>
                <th>性別</th>
                <th>操作</th></tr>";

        foreach($bots as $data){  
?>
        <tr> 
            <td><?php echo $data['colorNo']; ?></td>
            <td><input type="text" name="colorName" value="<?php echo $data['colorName']; ?>"></td>

            <td>
                <div class="col">
                    <label>
                        <input type="file" class="upcolorfile" name="upfile">
                        <img id="infile" class="fileimg" src="../back_images/<?php echo $data['colorImg']; ?>">
                    </label>
                </div>
            </td>          
            
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

            <td><input type="hidden" name="gender" value="<?php echo $data['colorStatus']; ?>"><button class="onandoff cuon"></button> <button class="alter">修改</button></td>
        </tr> 
<?php             
		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>