<?php
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<style>
body{
	font: Arial;
	background-image:url("7.png");
}
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

.button {
  background-color: #555555;
  border: none;
  color: white;
  padding: 6px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button{
  background-color: grey;
  color: white;
  border: 1px solid #555555;
}
.button:hover {
  background-color: #555555;
  color: white;
}
.coupon {
  border: 5px dotted #666;
  width: 80%;
  border-radius: 15px;
  margin: 0 auto;
  max-width: 400px;
}

.container {
  padding: 2px 16px;
  background-color: #f1f1f1;
}
</style>
</head>

<body>
	<?php
  
  $conn=mysql_connect("localhost","root","");
  mysql_select_db("office",$conn);
echo"<div class=\"navbar\">";
	if($_SESSION['usertype']=="admin")
	{
		echo "<a href=\"adminhomepage.php\">Home</a>";
	}
	else{
		echo "<a href=\"Logout.php\">Home</a>";
	}
  echo"<div class=\"dropdown\">
    <button class=\"dropbtn\">Options 
      <i class=\"fa fa-caret-down\"></i>
    </button>
    <div class=\"dropdown-content\">
      <a href=\"logoutconn.php\">Logout</a>
    </div>
  </div> 
  <a>My Profile</a>
</div>
<div class=\"coupon\">
  <div class=\"container\">";
  
  
  $pw=$_POST['pw'];
  $fid="Password does not Match!";
  $sql="select Name,Contact_No,employee.emp_ID,Username from employee,user_login where user_login.Username='$_SESSION[userid]' and employee.emp_ID=user_login.emp_ID";
  mysql_select_db('office');
  $result=mysql_query($sql,$conn);
  
    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "<h2 style=text-align:center;>{$row['Name']}</h2>" ;
		echo "<p style=text-align:center;>Employee ID: {$row['emp_ID']} </p>";
       echo "<p style=text-align:center;>Contact No: {$row['Contact_No']} </p>";
	   echo "<p style=text-align:center;>Username: {$row['Username']} </p>";
    }
		  
		
	?>
  </div>
</div>
</body>
</html>