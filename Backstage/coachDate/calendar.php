<?php 
    ob_start();
    session_start();
    try{
        require_once("../connectcd102g1.php");
        $changeCoach =$_REQUEST["chgcoach"];

            $sql="select * from coach c left outer join coachact cht on c.coachNo = cht.coachNo left OUTER join activitycategory act on cht.actNo = act.actNO where c.coachNo = $changeCoach";
            $cgcoach = $pdo->query($sql);
            $cgcoachs = $cgcoach->fetchAll(PDO::FETCH_ASSOC);
            echo '<select id="chActOption" name="chActOption">';
            echo '<option>--選擇活動--</option>';
            foreach($cgcoachs as $data){
                echo '<option value="'.$data['actNo'].'">'.$data['actName'].'</option>';
            }
            echo '</select>';
        
    }catch(PDOException $e){
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>