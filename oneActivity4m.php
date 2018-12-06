
<?php
try {
	require_once("connectcd102g1.php");
	$NewPage = $_REQUEST['NewPage'];
	$sql = "select * from coach c join coachact cc on c.coachNo = cc.coachNo left outer join activitycategory acg on cc.actNo = acg.actNo where acg.actName ='{$NewPage}'";
	$Activitys = $pdo->query($sql);
	$actCoachRows = $Activitys->fetchAll(PDO::FETCH_ASSOC);
	
					    // echo  $coachPic;
?>
					
					    

					 

			

				<ul class="actCHLeftSelect">
				
					 <?php 
  
					    foreach($actCoachRows as $k=>$actCoachRow){
					    $coachPic = $actCoachRow['coachName'];
					    $coachPic2 = $actCoachRow['coachImg'];
					    // echo  $coachPic;
					   ?>
					    
					    <ul class="actCHLeftSelect main-carousel">
					
						 <?php 
	  
						    foreach($actCoachRows as $k=>$actCoachRow){
						    $coachPic = $actCoachRow['coachName'];
						    $coachPic2 = $actCoachRow['coachImg'];
						    // echo  $coachPic;
						   ?>
						    
						    <li class="actCoachSmall carousel-cell" style="background-image: url('images/s-<?php echo $coachPic2; ?>"')";><?php $coachPic; ?>
						     <input type="hidden" value="<?php echo $coachPic; ?>">
						     <input type="hidden" name="" value="<?php echo $coachPic2; ?>";>
						    </li>
						   <?php 

						  

						   }
						    ?>
					
					</ul>

					  

					   }
					    ?>
				
				</ul>
				

		

	
	

<?php		

	
} catch (PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
<!--footer end-->	
