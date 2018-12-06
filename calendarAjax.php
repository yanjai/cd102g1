<?php
    ob_start();
    session_start();
    try{
        require_once("connectcd102g1.php");

            $changeCoach =$_REQUEST["chgcoach"];
            $str ="";
            $sql="select * from coach c left outer join coachdate cd on c.coachNo = cd.coachNo where c.coachNo = $changeCoach";
            $coachD = $pdo->query($sql);
            $coachDs = $coachD->fetchAll(PDO::FETCH_ASSOC);
            // if(isset($_REQUEST["chgcat"])){
                // $chgcat = $_REQUEST["chgcat"];
            $sql3="SELECT * FROM `actorderlist` where coachNo = $changeCoach  group by ActOrderDate having count(*)>0";
            $del = $pdo->query($sql3);
            $dels = $del->fetchAll(PDO::FETCH_ASSOC);
            foreach($dels as $item){
                $str.=$item['ActOrderDate']."|";
            }
            // }
            foreach($coachDs as $data){
                $str.=$data['leaveday']."|";
            }
            
            echo substr($str,0,-1);

        
    }catch(PDOException $e){
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>
