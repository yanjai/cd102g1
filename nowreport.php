<?php 
try{
    require_once("connectcd102g1.php");
    $commentNo = $_REQUEST['commentNo'];
    $sql = "select * from coachcomment where commentNo = $commentNo";
    $renum = $pdo->query($sql);
    while($renums=$renum->fetch(PDO::FETCH_ASSOC)){
        $num = (int)$renums['report'];
    }
    $num+=1;
    $sql2 = "UPDATE  coachcomment set report = :report where commentNo = :commentno";
    $reportcomment = $pdo->prepare($sql2);
    $reportcomment->bindParam(':commentno',$commentNo);
    $reportcomment->bindParam(':report',$num);
    $reportcomment->execute();
}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";
}
?>