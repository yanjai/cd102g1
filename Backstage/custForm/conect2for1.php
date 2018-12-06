<?php 
    try{
        require_once("../connectcd102g1.php");

        $sql = "select * from colorlist";
        $bot = $pdo->query($sql);
        $bots = $bot->fetchAll(PDO::FETCH_ASSOC);
        foreach($bots as $data){
        	echo '<option value="'.$data["colorNo"].'">'.$data["colorName"].'</option>';
        }

        }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>