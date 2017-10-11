

<?php
$con=mysqli_connect("localhost","root","","db_personmanage"); 
session_start();
$email=$_SESSION['email'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.textbox { 
    background: white; 
    border: 1px solid #ffa853; 
    border-radius: 5px; 
    
    color:#000;
    outline: none; 
    height:43px; 
    width: 900px; 
  } 
  table
  {
	  width:800px;
  }
  td
  {
	  
	  height:65px;
  }
  .button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<?php include("head.php");?>
<body>
<form method="post">
<table align="center">
<tr><td>
  <input list="type" name="type" class="textbox" placeholder="enter adhar number" required />
                     
                      <datalist id="type">
                      
                            <?php

                        $sel=mysqli_query($con,"select * from tbl_survey ");

                     while($r=mysqli_fetch_array($sel))
                           {
                          ?>

                           <option value="<?php echo $r['adhar']; ?>" 
                            > <?php echo $r['adhar'];?> </option>

                             <?php
                               }
                            ?>
                      
                      
                      </datalist>
        </td></tr>
<tr><td><input type="text" name="txtreport" placeholder="enter report" class="textbox" required></td></tr>
<tr><td align="center"><input type="submit" name="add" value="send" class="button"></td></tr>




</table>
</form>
</body>
<?php include("foot.php");?>
</html>
<?php

if(isset($_POST['add']))
{
	
	$adhar=$_POST['type'];
	$date=date('Y-m-d');
	$report=$_POST['txtreport'];
	$sel=mysqli_query($con,"select * from tbl_survey where adhar='$adhar'");
	$count=mysqli_num_rows($sel);
	if($count=0)
	{
		?><script>alert("Adhar number not valid");</script><?php
	}
	else
	{
	$q=mysqli_query($con,"insert into tbl_medicalhistory values('0','$adhar','$date','$email','$report','0');");

if($q>0)
{?><script>alert("Notification Send");</script><?php
}
	}
}

?>
