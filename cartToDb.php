<?php 
ob_start();
session_start();

	try {
		require_once("connectcd102g1.php");
	    
	    $pdo->beginTransaction();

		$customerName= $_REQUEST['customerName'];
		$customerContact = $_REQUEST['customerContact'];
		$customerAdd = $_REQUEST['customerAdd'];
		$paymentType = $_REQUEST['paymentType'];
		$cartTotal = $_REQUEST['cartTotal'];
		$orderdate = Date("Y-m-d");
		//$gearNo = $_REQUEST['gearNo'];
        //$cartSize=$_REQUEST['cartSize'];
		//get member no
		$memNo = $_SESSION["memNo"];
         

 		$sql = "INSERT INTO gearorders(gearOrderNo,memNo,receiverName,receiverPhoneNo,receiverAddress,orderDate,paymentType,totalAmount)values(null,'$memNo','$customerName' ,'$customerContact','$customerAdd','$orderdate','$paymentType','$cartTotal')";
		$gearorders = $pdo->prepare( $sql );
		$gearorders->execute();
		$orderNo = $pdo->lastInsertId(); 

        $sql = "INSERT INTO gearorderdetails(gearOrderNo,gearNo,gearSize,gearOrderQty,orderSubtotal)values(:gearOrderNo,:gearNo,:gearSize,:gearQty,:cartsubtotal)";
		$orderitems = $pdo->prepare( $sql );
		foreach ($_SESSION["gearList"] as $gearNo => $gearRow){
			$orderitems->bindValue( ":gearOrderNo", $orderNo);
			$orderitems->bindValue( ":gearNo", $gearNo);
			$orderitems->bindValue( ":gearSize", $gearRow["gearSize"]);
			$orderitems->bindValue( ":gearQty", $gearRow['gearQty']);
			$cartsubtotal = $gearRow['gearPrice']*$gearRow['gearQty'];
			$orderitems->bindValue( ":cartsubtotal", $cartsubtotal);
			$orderitems->execute();
		
         }
		$pdo->commit();
		 unset($_SESSION["gearList"]);
  ?>
        
  <?php		 
	   
  } catch(PDOException $e) {			
			echo "錯誤原因 : " , $e->getMessage(), "<br>";
			echo "錯誤行號 : " , $e->getLine(), "<br>";		
	}
 
// header("Location:javascript://history.go(-1)");
// header('Location: ' . $_SERVER["HTTP_REFERER"] );
// exit;
//


    // if (isset($_SERVER["HTTP_REFERER"])) {
    //     header("Location: " . $_SERVER["HTTP_REFERER"]);
    // }

   // header("Location:javascript://history.go(-1)");

?>
