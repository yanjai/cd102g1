<?php 
    try{
        require_once("../connectcd102g1.php");

        // 修改
        if(isset($_REQUEST["UpwetsuitNo"])){
            $wetsuitNo = $_REQUEST["UpwetsuitNo"];            
            $wetsuitImg = $_REQUEST["UpwetsuitImg"];
            $versionNo = $_REQUEST["UpwetsuitversionNo"];
            $colorNo = $_REQUEST["UpwetsuitcolorNo"];
            
            echo $wetsuitNo,$wetsuitImg,$versionNo,$colorNo;
            $sql2 = "UPDATE wetsuitlist set wetsuitImg = :UpwetsuitImg , versionNo = :UpwetsuitversionNo , colorNo = :UpwetsuitcolorNo where wetsuitNo = :UpwetsuitNo";
            $Upwetsuit = $pdo->prepare($sql2);
            $Upwetsuit->bindParam(':UpwetsuitNo', $wetsuitNo);
            $Upwetsuit->bindParam(':UpwetsuitImg', $wetsuitImg);
            $Upwetsuit->bindParam(':UpwetsuitversionNo', $versionNo);
            $Upwetsuit->bindParam(':UpwetsuitcolorNo', $colorNo);          
            $Upwetsuit->execute();
        }

        // 上下架
        if(isset($_REQUEST["wetsuitNo"])){
            $wetsuitNo = $_REQUEST["wetsuitNo"];
            $wetsuitStatus = $_REQUEST["wetsuitStatus"];

            if($wetsuitStatus==0){
                $wetsuitStatus = 1;
            }else{
                $wetsuitStatus = 0;
            }

            echo $wetsuitNo,$wetsuitStatus;
            $sql2 = "UPDATE wetsuitlist set wetsuitStatus = :wetsuitStatus where wetsuitNo = :wetsuitNo";
            $Upcolor = $pdo->prepare($sql2);
            $Upcolor->bindParam(':wetsuitNo',$wetsuitNo);
            $Upcolor->bindParam(':wetsuitStatus',$wetsuitStatus);
            $Upcolor->execute();
        }

        $sql = "select * from wetsuitlist";
        $bot = $pdo->query($sql);
        $bots=$bot->fetchAll(PDO::FETCH_ASSOC);

        echo "<tr>
                 <th>潛水衣編號</th>
                 <th>潛水衣圖片</th>
                 <th>版型編號</th>
                 <th>顏色編號</th>
                 <th>操作</th>
             </tr>";

        foreach($bots as $data){

?>

            <tr> 
                <td><?php echo $data['wetsuitNo']; ?></td>

                <td>
                    <div class="col">
                        <label>
                            <input type="file" class="upwetsuitImgfile" name="upfile">
                            <img id="inwetsuitImgfile" class="wetsuitfileimg" src="../back_images/<?php echo $data['wetsuitImg']; ?>">
                        </label>
                    </div>
                </td>

                <td><input type="text" name="versionNo" value="<?php echo $data['versionNo']; ?>"></td>
                <td><input type="text" name="colorNo" value="<?php echo $data['colorNo']; ?>"></td>
                <td><input type="hidden" value="<?php echo $data['wetsuitStatus']; ?>"><button class="onandoff cuon"></button> <button class="alter4">修改</button></td>
            </tr> 
<?php            
		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>