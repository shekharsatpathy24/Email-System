<?php
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script  src="http://code.jquery.com/jquery-1.9.1.min.js" ></script> 
<script>
	$(function() {
            $('tr').hover(function() {
                $(this).css('background-color', '#eee');
                $(this).contents('td').css({'border': '0px solid red', 'border-left': 'none', 'border-right': 'none'});
                $(this).contents('td:first').css('border-left', '0px solid red');
                $(this).contents('td:last').css('border-right', '0px solid red');
            },
            function() {
                $(this).css('background-color', '#FFFFFF');
                $(this).contents('td').css('border', '1px solid black');
                
            });
        });
fcookie='rcookie';
    $(document).ready(function(){
        $("#myTable td").hover(function() {
          var row_num = parseInt( $(this).parent().index() )-1;
          document.cookie=fcookie+"=" + row_num;
        });
		 $('.delbtn').click(function(){
        window.location.href=('deleteuser.php'); 
        });
    });	
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<title>AllUsers</title>
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
  <a>All Users</a>
  </div>
<div class="coupon">
  <div class="container">
  <?php
  class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
  
  $conn=mysql_connect("localhost","root","");
  mysql_select_db("office",$conn);

  $sql="select employee.emp_ID,employee.name,user_login.Username from employee,user_login where employee.emp_ID=user_login.emp_ID and employee.user_type='user'";
  $result=mysql_query($sql,$conn);
  echo "<h3>All User Data</h3>";
  echo "<table id=\"myTable\" border=\"1\" style=\"border-collapse: collapse;\" cellpadding=\"8\"><tr>
 		<th>emp_ID</th>
		<th>Name</th>
		<th>Username</th>
		<th>Delete</th>
		</tr>";
		while($row = mysql_fetch_array($result,MYSQL_ASSOC))
          {
          echo "<tr onclick=\"selectID('" . $row['id'] . "')\">
		  <td>" . $row['emp_ID'] . "</td>
		  <td> " . $row['name'] . "</td>
		  <td>" . $row['Username'] . "</td>
		  <td><button class=\"delbtn\">&#x2716;</button></td>
		  </tr>";
          }
 		   
 echo "</table>"; 
?>
</div>
</div>
</body>
</html>