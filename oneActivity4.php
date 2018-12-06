
<?php
try {
	require_once("connectcd102g1.php");
	$NewPage = $_REQUEST['NewPage'];
	$sql = "select * from coach c join coachact cc on c.coachNo = cc.coachNo left outer join activitycategory acg on cc.actNo = acg.actNo where acg.actName ='{$NewPage}'";
	$Activitys = $pdo->query($sql);
	$actCoachRows = $Activitys->fetchAll(PDO::FETCH_ASSOC);
	foreach($actCoachRows as $k=>$actCoachRow){
			
		$coachPic = $actCoachRow['coachName'];
		$coachPic2 = $actCoachRow['coachImg'];
					    // echo  $coachPic;
?>
					
					    

					 

			

				<li class="actCoachSmall" style="background-image: url('images/s-<?php echo $coachPic2; ?>"')";>
					  <input type="hidden" value="<?php echo $coachPic; ?>">
					  <input type="hidden" value="<?php echo $coachPic2; ?>";>
				</li>
				

		

	
	

<?php		
}	
	
} catch (PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
<!--footer end-->	
