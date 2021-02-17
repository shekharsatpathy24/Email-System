<?php
session_start();
$conn=mysql_connect("localhost","root","");
  mysql_select_db("office",$conn);
$cook=$_COOKIE["mycookie"];
$_SESSION['rownum']=$cook;
$sq="select Count from mail,user_login where user_login.Username='$_SESSION[userid]' and mail.reciever='$_SESSION[userid]'  order by timestamp desc limit $_SESSION[rownum],1";
$res=mysql_query($sq,$conn);
$row=mysql_fetch_array($res,MYSQL_ASSOC);
$c=$row['Count'];
$sql="update mail set status=1 where Count='$c' ";
$result=mysql_query($sql,$conn);
echo "<script>window.location.href='openrecievedmail.php'</script>";
?>