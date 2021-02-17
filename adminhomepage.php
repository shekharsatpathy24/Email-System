<?php
session_start();
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<head>
<title>AdminHomepage</title>
<style>
body{
	font: Arial;
	background-image:url("7.png");
}
	.container{
		text-align: center;
		position: absolute;
		top: 15%;
		left: 50%;
		transform: translate(-50%,-50%);
		width: 100%;
	}
	.container span{
		color: black;
		text-transform: uppercase;
		display: block;
	}
	.text1{
		font-size: 40px;
		font-weight: 700;
		letter-spacing: 6px;
		margin-bottom: 20px;
		background: url("7.png");
		position: relative;
		animation: text 3s 1;
	}
	.text2{
		font-size: 25px;
		font-weight: 400;
		
	}
	@keyframes text {
		0%{
			color: black;
			margin: -40px;
		}
		30%{
			letter-spacing: 20px;
			margin: -40px;
		}
		85%{
			letter-spacing: 8px;
			margin-bottom: -40px;
		}
	}
.notification {
  background-color: #333;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}
.notification .badge {
  position: absolute;
  bottom: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
* {box-sizing: border-box;}


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
	<a href="allmail.php">All Mails</a>
  <a href="adminalluser.php">All Users</a>
</div>
	<div class="container">
	<span class="text1">Welcome</span>
    <span class="text2"><?php
	$conn=mysql_connect("localhost","root","");
  mysql_select_db("office",$conn);
	$sql="select Name from employee,user_login where user_login.Username='$_SESSION[userid]' and employee.emp_ID=user_login.emp_ID";
	$result=mysql_query($sql,$conn);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "{$row['Name']}!" ;
	}
	?></span>
	</div>
<div class="alert alert-success">

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>