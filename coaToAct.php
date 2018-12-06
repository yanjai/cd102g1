<?php
    ob_start();
    session_start();
    require_once("connectcd102g1.php");
    $a = $_REQUEST['coachDate'];
    $b = $_REQUEST['chOption'];
    $c = $_REQUEST['chActOption'];
	$sql="select * from coach where coachNo = $b";
	$bot = $pdo->query($sql);
    $bots=$bot->fetch(PDO::FETCH_ASSOC);
    
    echo $b;
    $_SESSION['coachDate'] = (string)$_REQUEST['coachDate'];
    $_SESSION['chOption'] = $_REQUEST['chOption'];
    $_SESSION['chImg'] = $bots['coachImg'];
    $_SESSION['chName'] = $bots['coachName'];
    echo $bots['coachName'];
    echo $_REQUEST['coachDate'],$_REQUEST['chOption'],$bots['coachImg'],$bots['coachName'];
    header('Location: oneActivity.php?pageNo='.$c);
?>