<?php
try{
	require_once("../connectcd102g1.php");
        $content = $_REQUEST["content"];
        $ans = $_REQUEST["ans"];
		$sql = "INSERT INTO bot(bot_num,content,ans)values(null,'$content','$ans')";
		$pdo->exec($sql);
	$sql2="select * from messages";
	$message=$pdo->query($sql2);
	$messages=$message->fetchAll(PDO::FETCH_ASSOC);
	echo "<ul>";
	foreach($messages as $data){
		echo "<li class='mess'>".$data['message_content']."</li>";
	}
	echo "</ul>";
	}catch(PDOException $e){
		echo "錯誤原因 : " , $e->getMessage(), "<br>";
		echo "錯誤行號 : " , $e->getLine(), "<br>";
	}
	
?>