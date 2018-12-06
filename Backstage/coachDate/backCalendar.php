<?php
    ob_start();
    session_start();
    try{
        require_once("../connectcd102g1.php");

            $changeCoach =$_REQUEST["chgcoach"];
            $str ="";
            $sql="select * from coach c left outer join coachdate cd on c.coachNo = cd.coachNo where c.coachNo = $changeCoach";
            $coachD = $pdo->query($sql);
            $coachDs = $coachD->fetchAll(PDO::FETCH_ASSOC);
            foreach($coachDs as $data){
                $str.=$data['leaveday']."|";
            }
            
            echo substr($str,0,-1);

        
    }catch(PDOException $e){
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>
