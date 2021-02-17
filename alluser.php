<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<title>AllUsers</title>
<style>
table, th, td {
    border: 1px solid black;
	
}
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
  <a href="Logout.php">Home</a>
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

  $sql="select employee.emp_ID,employee.name,user_login.Username from employee,user_login where employee.emp_ID=user_login.emp_ID;";
  $result=mysql_query($sql,$conn);
  echo "<h3>All User Data</h3>";
  echo "<table><tr>
 		<th>emp_ID</th>
		<th>Name</th>
		<th>Username</th>
		</tr>";
		while($row = mysql_fetch_array($result,MYSQL_ASSOC))
          {
          echo "<tr>
		  <td>" . $row['emp_ID'] . "</td>
		  <td> " . $row['name'] . "</td>
		  <td>" . $row['Username'] . "</td>
		  </tr>";
          }
 		   
 echo "</table>"; 
?>
</div>
</div>
</body>
</html>