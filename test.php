<!doctype html>
<html>
<head>
<title>Determine Click Position on click of a table cell</title>
<!--CSS -->
<style>
table, th, td {
    border: 1px solid black;
	
}
 
    #result{
        font-weight:bold;
        font-size:16pt;
    }
</style>
<!--JAVASCRIPT -->
<script  src="http://code.jquery.com/jquery-1.9.1.min.js" ></script>     
<script>

$(function() {
            $('tr').hover(function() {
                $(this).css('background-color', '#eee');
                $(this).contents('td').css({'border': '0px solid red', 'border-left': 'none', 'border-right': 'none'});
                $(this).contents('td:first').css('border-left', '0px solid red');
                $(this).contents('td:last').css('border-right', '0px solid red');
            },
            function() {
                $(this).css('background-color', '#FFFFFF');
                $(this).contents('td').css('border', '1px solid black');
                
            });
        });
    $(document).ready(function(){
        $("#myTable td").click(function() {     
            var row_num = parseInt( $(this).parent().index() )+1;    
 
            $("#result").html( "Row_num =" + row_num);
			document.cookie = row_num;   
        });
    });
</script>
</head>
<body>
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
  
  $pw=$_POST['pw'];
  $fid="Empty!";
  $sql="select * from mail,user_login where user_login.Password='$_POST[pw]' and user_login.Username=mail.sender";
  mysql_select_db('office');
  
  $result=mysql_query($sql,$conn);
  $count=mysql_num_rows($result);
  echo"<h3>Recieved Mail</h3>";
    echo"<div id=\"result\"> </div>";
    echo"<table id=\"myTable\" border=\"1\" style=\"border-collapse: collapse;\" cellpadding=\"8\">";
        while($row = mysql_fetch_array($result,MYSQL_ASSOC))
          {
          echo "<tr onclick=\"selectID('" . $row['id'] . "')\">
		  <td>" . $row['sender'] . "</td>
		  <td> " . $row['reciever'] . "</td>
		  <td>" . $row['subject'] . "</td>
		  <td> " . $row['message'] . "</td> 
		  <td> " . $row['timestamp'] . " </td>
		  </tr>";
          }
 		   
    echo "</table>";
	?>
</body>
</html>