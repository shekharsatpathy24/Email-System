<?php
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<title>OpenMail</title>
<style>

body{
	font: Arial;
	background-image:url("7.png");
)}
.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.coupon {
  border: 5px dotted #666;
  width: 80%;
  border-radius: 15px;
  margin: 0 auto;
  max-width: 600px;
}

.container {
  padding: 2px 16px;
  background-color: #f1f1f1;
}
</style>
</head>

<body>
<div class="navbar">
  <a href="adminhomepage.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Options 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="Profile.php">My Profile</a>
      <a href="logoutconn.php">Logout</a>
    </div>
  </div> 
  <a>Mail</a>
  </div>
<div class="coupon">
  <div class="container">
  <?php
   $conn=mysql_connect("localhost","root","");
  mysql_select_db("office",$conn);
  
  $sql=("select * from mail where status=0 or status=1 order by timestamp desc limit $_SESSION[rownum],1");
  $result=mysql_query($sql,$conn);

  while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	  echo "<h2><strong>{$row['subject']}</strong> </h2>";
	  echo "<a><strong>To: {$row['reciever']}</strong> </a><br>";
	  echo "<a>From:{$row['sender']}</a>" ;
    echo"<p style=text-align:right;>Time sent:{$row['timestamp']}</p>";
	  
   
     echo "<p>{$row['message']} </p>";
	  $filepath=$row['filepath'];
	  $filename=$row['filename'];
	  $fileid=$row['file_id'];
    }
	  
   if($filepath)
   {
		 echo"<a><strong>Document Attached: </strong></a>";
		 echo"<a href=\"$filepath\" download=\"$fileid\"><button><i class=\"fa fa-download\"></i>$fileid</button></a>";
   }
	  
  ?>
  </div>
</div>
</body>
</html>