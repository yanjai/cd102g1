<?php
    ob_start();
    session_start();
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST["adminName"])){
            $adminName= $_REQUEST["adminName"];
            $adminId = $_REQUEST["adminId"];
            $adminPsw = $_REQUEST["adminPsw"];
            $sql2 = "INSERT INTO adminmag(adminNo,adminId,adminPsw,adminName,adminLevel)values(null,'$adminId','$adminPsw','$adminName','1')";
		    $pdo->exec($sql2);
        }
        if(isset($_REQUEST["UpadNo"])){
            $UpadNo = $_REQUEST["UpadNo"];
            $UpadId = $_REQUEST["UpadId"];
            $UpadPsw = $_REQUEST["UpadPsw"];
            $UpadName = $_REQUEST["UpadName"];
            if(isset($_REQUEST["UpadLv"])){
                $UpadLv = $_REQUEST["UpadLv"];
            }else{
                $UpadLv =0;
            }
            $sql2 = "UPDATE  adminmag set adminId = :UpadId , adminPsw = :UpadPsw, adminName = :UpadName, adminLevel = :UpadLv  where adminNo = :UpadNo";
            $upad = $pdo->prepare($sql2);
            $upad->bindParam(':UpadNo',$UpadNo);
            $upad->bindParam(':UpadId', $UpadId);
            $upad->bindParam(':UpadPsw',$UpadPsw);
            $upad->bindParam(':UpadName',$UpadName);
            $upad->bindParam(':UpadLv',$UpadLv);
            $upad->execute();
            $_SESSION['memName']=$_REQUEST["UpadName"];
        }

        $sql = "select * from adminMag where adminNo = '1'";
        $adminMag = $pdo->query($sql);
        $adminMags=$adminMag->fetch(PDO::FETCH_ASSOC); 
        $sql = "select * from adminMag where adminNo <> '1'";
        $bot = $pdo->query($sql);
        $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
            if($adminMags["adminLevel"]==0){
                $adminMags["adminLevel"]='最高管理員';
            }
            echo '<tr>';
                echo '<td>',$adminMags['adminNo'],'</td>';
                echo '<td><input type="text" value="',$adminMags['adminId'],'"></td>';
                echo '<td><input type="text" value="',$adminMags['adminPsw'],'"></td>';
                echo '<td><input type="text" value="',$adminMags['adminName'],'"></td>';
                echo '<td>'.$adminMags["adminLevel"].'</td>';
                echo '<td><button class="alter2">修改</button></td>';
            echo '</tr>';
        foreach($bots as $data){
            echo '<tr>';
                echo '<td>',$data['adminNo'],'</td>';
                echo '<td><input type="text" value="',$data['adminId'],'"></td>';
                echo '<td><input type="text" value="',$data['adminPsw'],'"></td>';
                echo '<td><input type="text" value="',$data['adminName'],'"></td>';
                echo '<td><select class="adlevel">';
                if($data['adminLevel']==1){
                    echo '<option value="1">一般管理員</option>';
                    echo '<option value="2">停權</option>';
                }else{
                    echo '<option value="2">停權</option>';
                    echo '<option value="1">一般管理員</option>';
                }
                echo '</select></td>';
                echo '<td><button class="alter">修改</button></td>';
            echo '</tr>';
		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>