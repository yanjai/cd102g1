<?php 
try{
    ob_start();
    session_start();
    require_once("../connectcd102g1.php");
    $actoNo = $_REQUEST['actOrderNo'];
    if(isset($_REQUEST["attend"])){
        $actNo = $_REQUEST["actOrderNo"];
        $attend = $_REQUEST["attend"];
        $sql2 = "UPDATE  actorderlist set attendStatus = :attend where ActOrderNo = :actNo";
        $upbot = $pdo->prepare($sql2);
        $upbot->bindParam(':actNo',$actNo);
        $upbot->bindParam(':attend', $attend);
        $upbot->execute();
    }
    $sql="SELECT * FROM `actorderlist` al left OUTER join member m on al.memNo = m.memNo LEFT OUTER join activitycategory act on al.actNo = act.actNo LEFT OUTER join coach c on al.coachNo  = c.coachNo where al.ActOrderNo = $actoNo";
    $actOrder = $pdo->query($sql);
    $actOrders = $actOrder->fetch(PDO::FETCH_ASSOC);
    if($actOrders['attendStatus']==0){
        $actOrders['attendStatus']='未簽到';

    }else{
        $actOrders['attendStatus']='已簽到';
    }

    
?>
    <div class="actOrderNo"><h1>活動訂單編號:<?php echo $actOrders['ActOrderNo'];?></h1></div>
    <div class="membox">
        <div class="Title">會員資訊</div>
        <div class="QRImg"><img src="../images/<?php echo $actOrders['memImg'];?>"></div>
        <div class="QRName"><p>會員姓名:<?php echo $actOrders['memName'];?></p><p>會員電話:<?php echo $actOrders['memTel'];?></p></div>
    </div>
    <div class="coachbox">
        <div class="Title">負責教練</div>
        <div class="QRImg"><img src="../back_images/s-<?php echo $actOrders['coachImg'];?>"></div>
        <div class="QRName"><p>教練姓名:<?php echo $actOrders['coachName'];?></p></div>
    </div>
    <div class="actbox">
        <div class="Title">活動資訊</div>
        <div class="QRName"><p>活動名稱:<?php echo $actOrders['actName'];?></p><p>活動地點:<?php echo $actOrders['actLoc'];?></p><p>活動價錢:<?php echo $actOrders['actPrice'];?>元</p><P>下單日期:<?php echo $actOrders['orderdate'];?></P><P>活動日期:<?php echo $actOrders['ActOrderDate'];?></P><P>簽到狀態:<?php echo $actOrders['attendStatus'];?></P></div>
    </div>
    <button id='confirm'>確認簽到</button>

<?php 
}catch(PDOException $e){
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>