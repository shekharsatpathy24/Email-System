<?php
session_start();
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<head>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
		var fileName;
		$(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $("#file-filename").html( fileName);
        });
    });
		
	</script>
<title>Homepage</title>
<style>
body{
	font: Arial;
	background-image:url("7.png");
}
	.container{
		text-align: center;
		position: absolute;
		top: 25%;
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

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 500px;
  padding: 10px;
  background-color:aliceblue;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.navbar {
	
        top: 0;
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
	.inputfile {
	
	opacity: 0;
	
	position: absolute;
	z-index: -1;
}
	.inputfile + label {
   padding: 6px 15px;
    font-weight: 1000;
    color: black;
    background-color: grey;
    display: inline-block;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: tomato;
}
	.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}
	.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}
	.inputfile + label * {
	pointer-events: none;
}
	.txt{
  
  box-sizing: border-box;
  width: 350px;
  
  border: 1px solid black;
  padding: 10px 20px;
  color: black;
  outline: none;
  margin: 10px 0;
  border-radius: 6px;
  text-align: center;
	
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
	<?php
		$conn=mysqli_connect("localhost","root","");
  mysqli_select_db($conn,"office");
$sql2="SELECT status FROM mail,user_login WHERE user_login.Username='$_SESSION[userid]' and user_login.Username=mail.reciever and status = 0";
	$result=mysqli_query($conn,$sql2);
	$count=mysqli_num_rows($result);
	if($count>0)
	      {
      echo "<a href=\"recievedmail.php\" class=\"notification\">
		  <span>Inbox</span>
          <span class=\"badge\">$count</span>
			</a>";
		}
	else{
		echo "<a href=\"recievedmail.php\" class=\"notification\">
		  <span>Inbox</span>
          <span class=\"badge\"></span>
			</a>";
	}
		  ?>
  <a href="alluser.php">All Users</a>
</div>
	<div class="container">
	<span class="text1">Welcome</span>
    <span class="text2"><?php
	$conn=mysqli_connect("localhost","root","");
  mysqli_select_db($conn,"office");
	$sql="select Name from employee,user_login where user_login.Username='$_SESSION[userid]' and employee.emp_ID=user_login.emp_ID";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)) {
		echo "{$row['Name']}!" ;
	}
	?></span>
	</div>
	
<button class="open-button" onclick="openForm()">Compose Mail</button>

<div class="form-popup" id="myForm">
  <form method="post" action="mail.php" id="myform" class="form-container" enctype="multipart/form-data"> 
        <h1 style="text-align:center">Mail</h1>
         
        <label for="sendto"><b>Send To:</b></label>
	  <?php
	    $conn=mysqli_connect("localhost","root","");
  		mysqli_select_db($conn,"office");
	    
	    $qw="select * from employee where user_type='user' and Name!=(select Name from employee,user_login where user_login.Username='$_SESSION[userid]' and employee.emp_ID=user_login.emp_ID)";
	    $res=mysqli_query($conn,$qw);
	   
	    echo "<select class=\"txt\" name=\"send\" required>
	    <option>---Select User--</option>";
	  while($row= mysqli_fetch_array( $res))
	   {
		    echo '<option value="'.$row['emp_ID'].'"><a>Emp ID: </a>'.$row['emp_ID'].' <a>Name: </a>'.$row['Name'].'</option>';
	   }
	  echo '</select>';
			?>
        
        <br><br><label for="subject"><b>Subject:</b></label>
        <input type="text" placeholder="Enter Subject" name="subject" required> 
        <label for="mail"><b>Body:</b></label>
        <textarea rows="8" cols="51" name="body" placeholder="Body....." form="myform" required></textarea>
	  
	    <p><input type="file" name="file" id="file" class="inputfile">
	    <label for="file"><strong>Upload &#x21ea;</strong></label><div id="file-filename" style="background-color:lightblue"></div></p>
	  
        <button type="submit" name="submit" class="btn">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
</form> 
</div>

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