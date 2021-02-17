<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<head>
<title>SignupForm</title>
<style>
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
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}
body{
	background-image:url("7.png");
}
form{
	background:#6CC;
	border : 1px solid #000;
padding : 5px;
}
h1{
	background-color: MediumSeaGreen;
}
.button {
  background-color: #555555; /* Green */
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
  border: 2px solid #555555;
}
.button:hover {
  background-color: #555555;
  color: white;
}
</style>
</head>
<body>
<div class="navbar">
  <a>Signup</a>
  <a href="LoginPage.php">Login</a>
</div>
<form method="post" action="connection2.php"> 
        <h3 style="text-align:center">Create New Account</h3>
        <p style="text-align:center;" title="name"> 
			<label for="nam"><b>Name:</b></label>
            <br><input type="text" name="nam" required> 
        </p> 
        <p style="text-align:center;" title="DOB"> 
			<label for="dob"><b>Date of Birth:</b></label>
            <br>   <input type="date" name="dob" required> 
        </p> 
        <p style="text-align:center;" title="phone"> 
			<label for="phone"><b>Phone No:</b></label>
            <br>   <input type="number" name="phone" required> 
        </p>
	    <p style="text-align:center">
			<label for="sector"><b>Sector:</b></label>
			<br><select name="sector" required>
			<option>------Select Sector------</option>;
  		<option value="Jaduguda">Jaduguda</option>
  		<option value="Narwa">Narwa</option>
  		<option value="Turamdih">Turamdih</option>
		</select>
	    </p>
		<p style="text-align:center">
			<label for="dept"><b>Department:</b></label>
			<br><select name="dept" required>
			<option>---Select Department---</option>;
  		<option value="EDP">EDP</option>
  		<option value="Mill">Mill</option>
  		<option value="Time Office">Time Office</option>
		</select>
	    </p>
        <p style="text-align:center;" title="username"> 
			<label for="uid"><b>Create Username:</b></label>
            <br>   <input type="text" name="uid" required> 
        </p>
        <p style="text-align:center;" title="Password"> 
			<label for="pass"><b>Create Password:</b></label>
            <br>   <input type="password" name="pass" required> 
        </p> 
        <p style="text-align:center;" title="Password"> 
			<label for="pass1"><b>Confirm Password:</b></label>
            <br>   <input type="password" name="pass1" required> 
        </p> 
        <p style="text-align:center;" title="Submit">
        <button type="submit" name="submit" class="button">Submit</button>
        </p> 
    </form> 
    <p style="text-align:center;">Already Registered?</p>
    <div style="text-align:center">
    <a href="LoginPage.php">Login</a>
    </div>
</body>
</html>