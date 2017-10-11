
<?php

$con=mysqli_connect("localhost","root","","db_personmanage");


$adhar=$_REQUEST['ad'];
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
<?php 
$s=mysqli_query($con,"select * from tbl_survey r,tbl_state s,tbl_district d,tbl_place p,tbl_casedetail c,tbl_passport j where s.state_id=d.state_id and d.dist_id=p.dist_id and p.place_id=r.place_id and r.adhar=c.adhar and c.adhar=j.adhar and r.adhar='$adhar'");
$counter=0;
while($r=mysqli_fetch_array($s))
{ if(($counter==0)||($counter>1))echo "<tr>";

 ?>
 <tr><td><input type="text" name="txtname" value="<?php echo $r['name'];?>" class="textbox" /></td></tr>
   <tr><td><input type="text" name="txtaddress" value="<?php echo $r['address'];?>" class="textbox"  /></td></tr>
    <tr><td><input type="text" name="txtemail" value="<?php echo $r['email'];?>" class="textbox"  /></td></tr>
     <tr><td><input type="text" name="txtphno" value="<?php echo $r['phno'];?>" class="textbox"  /></td></tr>
        <tr><td align="center"><input type="submit" name="update" value="Update" class="button" /></td></tr>
         
 <?php
}
?>

</form>
</body>
<?php include("foot.php");?>
</html>
<?php
if(isset($_POST['update']))
{
	$name=$_POST['txtname'];
	$address=$_POST['txtaddress'];
	$email=$_POST['txtemail'];
	$phno=$_POST['txtphno'];
	
	$q=mysqli_query($con,"update  tbl_survey  set name='$name',address='$address',phno='$phno',email='$email' where adhar='$adhar'");

if($q>0)
{?>

<script>alert("data updated");
window.location="adminhome.php"</script><?php
}
}


?>