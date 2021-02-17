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
				$(this).css('cursor', 'pointer');
                $(this).contents('td').css({'border': '0px solid red', 'border-left': 'none', 'border-right': 'none'});
                $(this).contents('td:first').css('border-left', '0px solid red');
                $(this).contents('td:last').css('border-right', '0px solid red');
            },
            function() {
                $(this).css('background-color', '#FFFFFF');
                $(this).contents('td').css('border', '1px solid black');
                
            });
        });
        fcookie='mycookie';
    $(document).ready(function(){
        $("#myTable td").hover(function() {
          var row_num = parseInt( $(this).parent().index() )-1;
          document.cookie=fcookie+"=" + row_num;
        });
        $("#myTable td").click(function() {   
            window.location.href=('rownum1.php'); 
        });
    });

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<title>Read Mail</title>
<style>
table, th, td {
    border: 1px solid black;
	
}
body{
	font: Arial;
	background-image:url("7.png");
}
	td{
		text-align: center;
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
  max-width: 700px;
}

.container {
  padding: 2px 16px;
  background-color: #f1f1f1;
}
		.sidenav {
  width: 175px;
  position: fixed;
  z-index: 1;
  top: 150px;
  left: ;
  
  overflow-x: hidden;
  padding: 8px 0;
}
	.sidenav a {
	background-color: #333;
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 16px;
  color: white;
  display: block;
}
.sidenav a:hover {
  background-color: red;
}
	.button{
		background-color: gold;
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
  <a>Inbox</a>
  </div>
	<div class="sidenav">
  <a>Recieved Mails</a>
  <a href="readpm.php">Sent Mails</a>
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
  
  
  
  
		 echo "<h3>Recieved Mail</h3>";
   echo"<div id=\"result\"> </div>";
 echo"<table id=\"myTable\" border=\"1\" style=\"border-collapse: collapse;\" cellpadding=\"8\"><tr>   <th>Status</th>
 		<th>Sender</th>
		<th>Reciever</th>
		<th>Subject</th>
		<th>Time</th>
		
		</tr>";


$sql1="select * from mail,user_login where user_login.Username='$_SESSION[userid]' and user_login.Username=mail.reciever order by timestamp desc";
$result1=mysql_query($sql1,$conn);


        while($row = mysql_fetch_array($result1,MYSQL_ASSOC))
          {
			if($row['status']==0)
			{
				echo "<tr  onhover=\"selectID('" . $row['id'] . "')\">
				<td> <button class=\"button\">&#x2709;</button></td>
      			<td>" . $row['sender'] . "</td>
      			<td> " . $row['reciever'] . "</td>
      			<td>" . $row['subject'] . "</td> 
      			<td> " . $row['timestamp'] . " </td>
      			</tr>";
			}
			else{
				echo "<tr onhover=\"selectID('" . $row['id'] . "')\">
		<td> <button>&#x2709;</button></td>
      <td>" . $row['sender'] . "</td>
      <td> " . $row['reciever'] . "</td>
      <td>" . $row['subject'] . "</td> 
      <td> " . $row['timestamp'] . " </td>
      </tr>";
			}
          
          }
       
    echo "</table>";

	?>
  </div>
</div>
</body>
</html>