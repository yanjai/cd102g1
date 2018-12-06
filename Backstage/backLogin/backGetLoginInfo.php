<?php 
ob_start();
session_start();
if(isset($_SESSION["adminName"])===true){
	echo $_SESSION["adminName"];
}else{
	echo "";
}
?>