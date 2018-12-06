<?php 
    try{
        require_once("../connectcd102g1.php");

        // 修改
        if(isset($_REQUEST["UpofficialNo"])){
            $officialImgNo = $_REQUEST["UpofficialNo"];            
            $officialImgName = $_REQUEST["UpofficialName"];
            $officialImgLName = $_REQUEST["UpofficialLName"];
            $officialImgPrice = $_REQUEST["UpofficialPrice"];
            echo $officialImgNo,$officialImgName,$officialImgLName,$officialImgPrice;
            $sql2 = "UPDATE officialimglist set officialImgName = :UpofficialName , officialImgLName = :UpofficialLName , officialImgPrice = :UpofficialPrice where officialImgNo = :UpofficialNo";
            $Upofficial = $pdo->prepare($sql2);
            $Upofficial->bindParam(':UpofficialNo', $officialImgNo);
            $Upofficial->bindParam(':UpofficialName', $officialImgName);
            $Upofficial->bindParam(':UpofficialLName', $officialImgLName);
            $Upofficial->bindParam(':UpofficialPrice', $officialImgPrice);
            $Upofficial->execute();
        }

        // 上下架
        if(isset($_REQUEST["officialImgNo"])){
            $officialImgNo = $_REQUEST["officialImgNo"];
            $officialImgStatus = $_REQUEST["officialImgStatus"];

            if($officialImgStatus==0){
                $officialImgStatus = 1;
            }else{
                $officialImgStatus = 0;
            }

            echo $officialImgNo,$officialImgStatus;
            $sql2 = "UPDATE officialimglist set officialImgStatus = :officialImgStatus where officialImgNo = :officialImgNo";
            $Upcolor = $pdo->prepare($sql2);
            $Upcolor->bindParam(':officialImgNo',$officialImgNo);
            $Upcolor->bindParam(':officialImgStatus',$officialImgStatus);
            $Upcolor->execute();
        }

        $sql = "select * from officialimglist";
        $bot = $pdo->query($sql);
        $bots=$bot->fetchAll(PDO::FETCH_ASSOC);

        echo "<tr>
                    <th>官方圖片編號</th>
                    <th>官方圖片</th>
                    <th>官方圖片名稱</th>
                    <th>官方圖片價格</th>
                    <th>操作</th>
                </tr>";

        foreach($bots as $data){

?>       
            <tr> 
                <td><?php echo $data['officialImgNo']; ?></td>

                <td>
                    <div class="col">
                        <label>
                            <input type="file" class="upofficialImgfile" name="upfile">
                            <img id="inofficialImgfile" class="officialfileimg" src="../back_images/<?php echo $data['officialImgName']; ?>">
                        </label>
                    </div>
                </td>

                <td><input type="text" name="officialImgLName" value="<?php echo $data['officialImgLName']; ?>"></td>

                <td><input type="text" name="officialImgPrice" value="<?php echo $data['officialImgPrice']; ?>"></td>
                <td><input type="hidden" value="<?php echo $data['officialImgStatus']; ?>"><button class="onandoff cuon"></button> <button class="alter3">修改</button></td>
            </tr> 
<?php 
		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>