<?php 
    try{
        require_once("../connectcd102g1.php");
        if(isset($_REQUEST["sNo"])){
            $sNo = $_REQUEST["sNo"];
            $sDate = $_REQUEST["sDate"];
            $sql = "INSERT INTO coachdate(dateId,coachNo,leaveday)values(null,'$sNo','$sDate')";
            $pdo->exec($sql);
        }
        if(isset($_REQUEST["lNo"])){
            $lNo = $_REQUEST["lNo"];
            $lDate = $_REQUEST["lDate"];
            $sql = "DELETE from coachdate where coachNo = '$lNo' and leaveday = '$lDate'";
            $pdo->exec($sql);
        }
        

    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }

?>