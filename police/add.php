<?php

$con=mysqli_connect("localhost","root","","db_personmanage");
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
<tr><td align="center">ADD CASE </td></tr>
<tr><td><input type="text" name="txtadhar" placeholder="enter adharcard number" class="textbox" /> </td></tr>
<tr><td><input type="text" name="txtcase" placeholder="enter case section" class="textbox" /></td></tr>
<tr><td align="center"><input type="submit" name="sav" value="Add" class="button" /></td></tr>
</table>

</form>
</body>
<?php include("foot.php");?>
</html>
<?php
if(isset($_POST['sav']))
{
	$adhar=$_POST['txtadhar'];
	$case=$_POST['txtcase'];
	$s=mysqli_query($con,"select * from tbl_casedetail where adhar='$adhar'");
	$c=mysqli_num_rows($s);
	if($c>0)
	{
		 while($y=mysqli_fetch_array($s))
		 {
			 $n=$y['casesection'];
		 }
		 if($n=="")
		 {
			 $t=mysqli_query($con,"update tbl_casedetail set casesection='$case' where adhar='$adhar'");
		 }
		 else
		 {
			 $m=$n.",".$case;
		$r=mysqli_query($con,"update tbl_casedetail set casesection='$m' where adhar='$adhar'");
	}}
	else
	{
		?>
        <script>
        alert("no Such A data in case details")</script>
        <?php
	}
	
}
?>