<?php
  
  session_start();
  
  $conn=mysqli_connect("localhost","root","");
  mysqli_select_db($conn,"office");
  
  $un=$_POST['u'];
  $pw=md5($_POST['p']);
  $_SESSION['userid']=$un;
  
  $fid="Incorrect Username or Password";
  $qw=mysqli_query($conn,"select * from user_login where Username='$un' and Password='$pw'") or die("data not selected");
  $sql="select user_type from employee,user_login where user_login.Username='$un' and employee.emp_ID=user_login.emp_ID";
  $result=mysqli_query($conn,$sql);
  $row = mysqli_fetch_array(MYSQL_ASSOC,$result);
  $_SESSION['usertype']=$row['user_type'];
  $count=mysqli_num_rows($qw);
  if(!empty($un))
    {
     if(!empty($pw))
       {
		   if($count>0)
           {
			   if($row['user_type']=="admin")
			   {
				   echo "<script>window.location.href='adminhomepage.php'</script>";
			   }
			   else{
				    echo "<script>window.location.href='logout.php'</script>";
			   }
			    
		   }
		  
			     
	   }
	   
	}
	echo "<script type='text/javascript'>alert('$fid');
               </script>";
			   echo "<script>window.location.href='Loginpage.php'</script>";
	  
?>