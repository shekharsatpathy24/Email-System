<?php
   if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
      $extensions= array("docx","pdf","docm");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"Uploads/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "file" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['file']['name'];  ?>
            <li>File size: <?php echo $_FILES['file']['size'];  ?>
            <li>File type: <?php echo $_FILES['file']['type'] ?>
			<li><?php echo"<embed src=\"Uploads/cv.doc\" width=\"550px\" height=\"700px\" />";?>
         </ul>
			
      </form>
	   
	   
      
   </body>
</html>