<?php
session_start();
?>
<?php
$conn=mysql_connect("localhost","root","");
  if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("office",$conn);
  $fr=$_SESSION['userid'];
  $rec=$_POST['send'];
  $sub=$_POST['subject'];
  $body=$_POST['body'];
  $fid="Error occured while Sending Mail!";
$fid1="Mail Sent! Note File ID: ";

  
if(isset($_FILES['file'])){
     
	$errors= array();
      $file_name = $_FILES['file']['name'];
      
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      $qw="select sector_code,dept_code from sector,department,employee where employee.Name=(select Name from employee,user_login where user_login.Username='$_SESSION[userid]' and employee.emp_ID=user_login.emp_ID) and employee.Sector=sector.sector_name and employee.Department=department.dept_name
	";
   
	$res=mysql_query($qw,$conn);
	$row = mysql_fetch_array($res,MYSQL_ASSOC);
	$sec=$row['sector_code'];
	$dept=$row['dept_code'];
	$qo="select max(Count) from mail";
	$resu=mysql_query($qo,$conn);
	$row=mysql_fetch_array($resu,MYSQL_ASSOC);
	$cnt=$row['max(Count)']+1;
	$fileid=$sec.$dept.$cnt.".".$file_ext; 
	$fileid1=$sec.$dept.$cnt;
   $filepath = "Uploads/".$fileid;
      
      $extensions= array("docx","docm","doc","xlsx","xlsm");
      
      
	  if(!$file_name) 
	  {
		  $sql="insert into mail(sender,reciever,subject,message,file_id) values('$_SESSION[userid]',(select Username from user_login where emp_ID='$rec'),'$_POST[subject]','$_POST[body]','$fileid1')";
				   if (!mysql_query($sql,$conn))
  							{
  								die('Error: ' . mysql_error());
							}
				    
		  echo "<script type='text/javascript'>alert('$fid1'+'$fileid1')</script>";
							if($_SESSION['usertype']=="admin")
							{
								echo "<script>window.location.href='adminhomepage.php'</script>";
							}
							else
							{
								echo "<script>window.location.href='Logout.php'</script>";
							}
	  }
	
      else if(empty($errors)==true ) {
         move_uploaded_file($file_tmp,"Uploads/".$fileid);
        
		  
		  $sql="insert into mail(sender,reciever,subject,message,filename,filepath,file_id) values('$_SESSION[userid]',(select Username from user_login where emp_ID='$rec'),'$_POST[subject]','$_POST[body]','$file_name','$filepath','$fileid')";
				   if (!mysql_query($sql,$conn))
  							{
  								die('Error: ' . mysql_error());
							}
				    
		  echo "<script type='text/javascript'>alert('$fid1'+'$fileid')</script>";
							if($_SESSION['usertype']=="admin")
							{
								echo "<script>window.location.href='adminhomepage.php'</script>";
							}
							else
							{
								echo "<script>window.location.href='Logout.php'</script>";
							}
      }
	else{
         print_r($errors);
      }
   }
  
		   
	
?>