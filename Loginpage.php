<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
	  
    <style>
	  *{
  font-family: "montserrat",sans-serif;
}
body{
  margin: 0;
  padding: 0;
  background-image:url("7.png");
}
.navbar {
  overflow: hidden;
  background-color: #333;
}
.navbar div {
  top: auto;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.login-box{
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100vh;
  background-image: linear-gradient(45deg,#9fbaa8,#31354c);
  transition: 1s;
}
.login-form{
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
  text-align: center;
}


.login-form h1{
  font-weight: 400;
  margin-top: 0;
}
.signup-form h1{
  font-weight: 400;
  margin-top: 0;
}
.txtb{
  display: block;
  box-sizing: border-box;
  width: 240px;
  background: #ffffff28;
  border: 1px solid white;
  padding: 10px 20px;
  color: white;
  outline: none;
  margin: 10px 0;
  border-radius: 6px;
  text-align: center;
	
}
.txt{
  
  box-sizing: border-box;
  width: 240px;
  background: #ffffff28;
  border: 1px solid black;
  padding: 10px 20px;
  color: black;
  outline: none;
  margin: 10px 0;
  border-radius: 6px;
  text-align: center;
	
}

.login-btn{
  width: 240px;
  background: #2c3e50;
  border: 0;
  color: white;
  padding: 10px;
  border-radius: 6px;
  cursor: pointer;
}
.signup-btn{
  width: 240px;
  background: #2c3e50;
  border: 0;
  color: white;
  padding: 10px;
  border-radius: 6px;
  cursor: pointer;
}
.hide-login-btn{
  color: #000;
  position: absolute;
  top: 40px;
  right: 40px;
  cursor: pointer;
  font-size: 24px;
  opacity: .7;
}
.show-login-btn{
  border-right: 1px solid white;
  width: 80px;
  color: white;
  cursor: pointer;
}
.showed{
  left: 0;
}

	  </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  </head>
  <body>
 <div class="navbar">
  <div class="show-login-btn"><i class="fas fa-sign-in-alt"></i> Login</div> 
</div>
	  
    <div class="login-box">
      <div class="hide-login-btn"><i class="fas fa-times"></i></div>
    <form class="login-form" action="connection1.php" method="post">

      <h1>Welcome</h1>
      <input class="txtb" type="text" name="u" placeholder="Username">
      <input class="txtb" type="password" name="p" placeholder="Password">
      <input class="login-btn" type="submit" name="Login" value="Login">
    </form>
    </div>

    
	
		<form  action="connection2.php" method="post">
		<h1 style="text-align:center;">Create Account</h1>
		<p style="text-align:center;"><input class="txt" type="text" name="nam" placeholder="Enter Full Name"><br>
        <input class="txt" type="date" name="dob" placeholder="Date of Birth"><br>
		<input class="txt" type="number" name="phone" placeholder="Contact No."><br>
		<select class="txt" name="sector" required>
		<option style="color: black">Select Sector</option>;
  		<option value="Burla" style="color: black">Burla</option>
  		<option value="Sambalpur" style="color: black">Sambalpur</option>
  		<option value="Bargarh" style="color: black">Bargarh</option>
			</select><br>
		<select class="txt" name="dept" required>
		<option style="color: black">Select Department</option>;
  		<option value="EDP" style="color: black">EDP</option>
  		<option value="Mill" style="color: black">Mill</option>
  		<option value="Time Office" style="color: black">Time Office</option>
			</select><br>
		<input class="txt" type="text" name="uid" placeholder="Create Username"><br>
		<input class="txt" type="password" name="pass" placeholder="Create Password"><br>
		<input class="txt" type="password" name="pass1" placeholder="Confirm Password"><br>
        <input class="signup-btn" type="submit" name="submit" value="Signup">
	    </p>
	  </form>
    <script type="text/javascript">
    $(".show-login-btn").on("click",function(){
      $(".login-box").toggleClass("showed");
    });
    $(".hide-login-btn").on("click",function(){
      $(".login-box").toggleClass("showed");
    });
		
	
		
		
    </script>

  </body>
</html>
