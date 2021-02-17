<?php
session_start();
$cook=$_COOKIE["mycookie"];
$_SESSION['rownum']=$cook;
			   echo "<script>window.location.href='open.php'</script>";
?>