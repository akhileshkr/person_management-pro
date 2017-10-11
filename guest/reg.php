<?php
$con=mysqli_connect("localhost","root","","db_personmanage");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register</title>




<style type="text/css">


table {
	border-collapse:collapse;
	width:120%;
}
th,td {
	text-align:center;
	padding:8px;
}
tr:nth-child(even){background-color:#FFF;
color:#000;
}
th{background-color:#336;
color:white;
}
.form-style-5{
    max-width: 800px;
    padding: 10px 20px;
    background: #f4f7f8;
    margin: 10px auto;
    padding: 20px;
    background:#FFF;
    border-radius: 8px;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 input[type="password"],
.form-style-5 textarea,
.form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 16px;
    margin: 0;
    outline: 0;
    padding: 7px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #1abc9c;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color:#000;
    margin: 0 auto;
    background:#69F;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #16a085;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
    background:#FF9;
}




</style>


<script>



function LoadDist(str)
{
	var xmlhttp;
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.open("GET","AjaxDist.php?stateID="+str,true);
xmlhttp.send();

xmlhttp.onreadystatechange=function() 
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("divDistrict").innerHTML=xmlhttp.responseText;

}
}
}



function loadplace(str)
{
var xmlhttp;
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.open("GET","ajaxplace.php?districtid="+str,true);
xmlhttp.send();

xmlhttp.onreadystatechange=function() 
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("divplace").innerHTML=xmlhttp.responseText;

}
}
}


</script>



</head>

<body>
<div class="form-style-5">
<form method="post">
<table>
<tr><td align="center"><font size="+2">REGISTER HERE</font></td></tr>
<tr><td><select name="type" required  >
      
      <option value="">..select Type..</option>
      <?php

$sel=mysqli_query($con,"select * from tbl_type ");

while($r=mysqli_fetch_array($sel))
{
?>

<option value="<?php echo $r['type_id']; ?>" 
 > <?php echo $r['type_name'];?> </option>

<?php
}
?>
      
      
      </select></td></tr>
      <tr><td><input type="text" name="txtlicence" placeholder="Enter Licence id" required /></td></tr>
     <tr>
 <td>
      <select name="ddlstate" id="ddlstate" onChange="LoadDist(this.value)"  required> 
<option value="sel">..select..</option>
<?php
	
	$sel=mysqli_query($con,"select * from tbl_state");

	while($row=mysqli_fetch_array($sel))
	{
?>

	<option value="<?php echo $row['state_id']; ?>" 
	<?php 
	if($row['state_id']==$st){ ?> selected="selected" <?php } ?> > <?php echo $row['state_name'];?> </option>

	<?php
}
?>
</select>    </td>
        <tr>
        </tr>
        
     <td><div id="divDistrict">
     
   <select name="ddldist" id="ddldist">
<option>---select---</option>
<?php 


$sel=mysqli_query($con,"select * from tbl_district where state_id=".$st."");
while($row=mysqli_fetch_array($sel))
{

?>
<option value="<?php echo $row['dist_id']; ?>" 
<?php 
if($row['dist_id']==$l){ ?> selected="selected" <?php } ?> > <?php echo $row['dist_name'];?> </option>

<?php 
}
?>
</select>
   
   
   
   </div>
   </td>
        <tr>
        </tr>
        <tr>
         
          <td>
          <div id="divplace">
          
          <select name="ddlplace" id="ddlplace">
<option>---select---</option>
<?php 


$sel=mysqli_query($con,"select * from tbl_place where dist_id=".$l." ");
while($row=mysqli_fetch_array($sel))
{

?>
<option value="<?php echo $row['place_id']; ?>" 
<?php 
if($row['place_id']==$pp){ ?> selected="selected" <?php } ?> > <?php echo $row['place_name'];?> </option>

<?php 
}
?>
</select>
          
        
   </div>
    </tr>
<tr><td><input type="email" name="txtemail" placeholder="Enter email" required /></td></tr>
<tr><td><input type="password" name="txtpwd"  placeholder="Enter Password" required/></td></tr>
<tr><td><input type="submit" name="btnsav" value="Save" /></td></tr>
</table>
</form>
</div>
</body>

</html>
<?php
$state=$_POST['ddlstate'];
$dist=$_POST['ddldist'];
$place=$_POST['ddlplace'];
$email=$_POST['txtemail'];
$type=$_POST['type'];
$uname=$_POST['txtemail'];
$pwd=$_POST['txtpwd'];
$licence=$_POST['txtlicence'];
if(isset($_POST['btnsav']))
{
$q=mysqli_query($con,"insert into tbl_reg values('0','$licence','$type','$email','$pwd','$state','$dist','$place','0')");

}?>