<html>
<body>
<?php
  
  $conn=mysqli_connect("localhost","root","");
  if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysqli_select_db($conn,"office");
	
  $na=$_POST['nam'];
  $dob=$_POST['dob'];
  $ph=$_POST['phone'];
  $un=$_POST['uid'];
  $pw=md5($_POST['pass']);
  $pw1=md5($_POST['pass1']);
  $fid="Data Not Filled Properly!";
  $fid1="Account Created";
	$sec=$_POST['sector'];
	$dept=$_POST['dept'];
	$sq=mysqli_query($conn,"select * from user_login where Username='$un'") or die('data not feched');
	if(mysqli_num_rows($sq)>=1)
   {
    echo "<script>alert(\"Username already present! Choose a different one\")</script>";
		echo "<script>window.location.href='Signupform.php'</script>";
   }
	else
	{
		if($pw==$pw1)
	       {
	           $sql1="insert into user_login(Username,Password) values('$un','$pw')";
				if (!mysqli_query($conn,$sql1))
  				{

  					die('Error: ' . mysqli_error());
				}
				 $sql="insert into employee(Name,Date_of_Birth,Contact_No,Sector,Department) values('$_POST[nam]','$_POST[dob]',$_POST[phone],'$sec','$dept')";
			   if (!mysqli_query($conn,$sql))
  				{

  					die('Error: ' . mysqli_error());
				}
			   echo "<script type='text/javascript'>alert('$fid1');
				    </script>";
			    echo "<script>window.location.href='Loginpage.php'</script>";
		   }
	}       
			   echo "<script type='text/javascript'>alert('$fid');
               </script>";
			   echo "<script>window.location.href='Signupform.php'</script>";
			   
	
		 
?>
</body>
</html>