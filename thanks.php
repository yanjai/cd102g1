<?php
    require_once("connectcd102g1.php");
	$sql2="select gearOrderNo , orderDate from gearorders order by gearOrderNo desc limit 1";
    $gearorderlist = $pdo->query($sql2);  //gearlist 是 PDOStatement物件
	$gearorderRow = $gearorderlist->fetchAll(PDO::FETCH_ASSOC);
	     foreach ( $gearorderRow as $gearValue){
   ?>
         <span>THANK YOU</span>
		<span>謝謝你的訂購</span>    	
			訂單編號:<p id="gearOrderNo"><?php echo $gearValue['gearOrderNo'];?></p> 
			下單日期:<p id="gearOrderDate"><?php echo $gearValue['orderDate'];?></p> 

		<div>
			<a href="divinggear.php">繼續購買</a>
		</div>

<?php
}  
?>	