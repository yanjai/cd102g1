 <?php 

 $gearStatus = $_REQUEST["gearStatus"];
 $gearNo = $_REQUEST["gearNo"];
    
 require_once("../connectcd102g1.php");
	$sql = "UPDATE gearlist 
	     SET gearStatus = $gearStatus where gearNo = $gearNo";

	$bot = $pdo->exec($sql);
?>