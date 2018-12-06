<?php 
try{
	require_once("connectcd102g1.php");
	$sql="select * from activitycategory";
	$bot = $pdo->query($sql);
    $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
	$i=1;
  ?>
		<div id="chLbselectCh">
			<ul id="chSelectUl">
                <?php foreach($bots as $data){ ?>
                <?php
					$ActImgs= explode("| ", $data["actItemImg"]);
					// echo $ActImgs[0];

						
				;?>
				<li class="chSelectLi"><div class="chbublebox"><div class="chbuble"><img src="images//<?php echo $ActImgs[0] ?>"><input type="hidden" value="<?php echo $data['actNo']; ?>"></div></div><p><?php echo $data['actName']; ?></p></li>
                <?php } ?>
			</ul>
			<input type="hidden" id='coachcgNo' value='1'>
			<select id='chRwdUl'>
				<?php foreach($bots as $data){ ?>
					<option  class="chRwdop" value="<?php echo $data['actNo']; ?>"><?php echo $data['actName']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="chLbcommentBox">
			
		</div>
  <?php
}catch(PDOException $e){
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";
}
?>