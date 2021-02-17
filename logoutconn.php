<?php
session_start();
echo "<script type='text/javascript'>alert(\"Logout Successful!\");
               </script>";
			   echo "<script>window.location.href='Loginpage.php'</script>";
session_destroy();
?>