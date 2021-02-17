<?php
session_start();
$conn=mysql_connect("localhost","root","");
  mysql_select_db("office",$conn);
$cooky=$_COOKIE["rcookie"];
$_SESSION['delrow']=$cooky;
$sql1="select Username from user_login limit $_SESSION[delrow],1";
$result1=mysql_query($sql1,$conn);
$row = mysql_fetch_array($result1,MYSQL_ASSOC);
$c=$row['Username'];
$sql=mysql_query("delete from user_login where Username='$c' ") or die('data not deleted');
			   echo "<script type='text/javascript'>alert(\"User Deleted!\");
               </script>";
echo "<script>window.location.href='adminalluser.php'</script>";
?>