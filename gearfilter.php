 
<?php
ob_start();
session_start();

try {
require_once("connectcd102g1.php");
// echo $gearTypeNo;
if(isset($_REQUEST['gearTypeNo'])){   // when isset() 
	$gearTypeNo = $_REQUEST['gearTypeNo']; 
	$sql="select * from gearlist where gearTypeNo='$gearTypeNo' AND gearStatus='1'";
     }
else{
    $sql="select * from gearlist where gearStatus='1'";
 }
	$gearlist = $pdo->query($sql);  //gearlist 是 PDOStatement物件
	$gearRow = $gearlist->fetchAll(PDO::FETCH_ASSOC);
	foreach($gearRow as $data){
		echo '<form method="post" action="viewSingleGear.php" class="gItem">
		        <lable>
		            <div class="gearDetails">
					     <input type="hidden" name="CartgearNo"  value="',$data["gearNo"],'">
					     <div class="gearPic">
					         <img src="images/',$data["gearPic"],'">
					     </div>
						 <div class="gearName">',$data["gearName"],'</div> 
				         <div>
				         <span class="gearPrice">$',$data["gearPrice"],'</span>
				         <span class="viewinfo">查看詳情</span>
				         </div>
					</div>
		        </lable>
		            <div>
						 <input type="submit" value="" class="addGearCart" >
		            </div>
		        <div class="clearfix" style="clear:both"></div>
			</form>

          ';
	}
}catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>