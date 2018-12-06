<?php 
    ob_start();
    session_start();
    try{
        require_once("connectcd102g1.php");
            // $changeCoach =$_REQUEST["chgcoach"];
            $changeCoach =$_REQUEST["chgcoach"];
            $actNo =$_REQUEST["chgcat"];
            $str ="";
            $sql="SELECT * FROM `actorderlist` where coachNo = $changeCoach and actNo = $actNo group by ActOrderDate having 4>count(*)>0";
            $actList = $pdo->query($sql);
            $actLists = $actList->fetchAll(PDO::FETCH_ASSOC);
            foreach($actLists as $data){
                $str.=$data['ActOrderDate']."|";
            }
            echo substr($str,0,-1);
        
    }catch(PDOException $e){
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>