<?php
$con=mysqli_connect("localhost","root","","db_personmanage");
$editsname='';
//$pname=$_POST['txtdpla'];
//$ddlstate=$_POST['ddlstate'];
//$ddldist=$_POST['ddldist'];
$flag=0;

if(isset($_GET['edit']))
{

$idno=$_REQUEST['id'];
$sel=mysqli_query($con,"select * from tbl_place p,tbl_district d where p.dist_id=d.dist_id and p.place_id=".$idno);

if($row=mysqli_fetch_array($sel))
{
	$editsname=$row['place_name'];
	
}
$flag=1;
$k=$row['state_id'];
$l=$row['dist_id'];
}
if(isset($_POST['btnsave']))
{
	$place_name=$_POST['txtplacename'];
	$ddldist=$_POST['ddldist'];
	$ddlstate=$_POST['ddlstate'];
	$idno=$_REQUEST['id'];
	
if($flag==1)
{


mysqli_query($con,"update tbl_place set place_name='".$place_name."'  where place_id='".$idno."'");
echo "<b>Values updated successfully!</b>";
$flag=0;
header("location:place.php");
}
else
{

 
mysqli_query($con,"insert into tbl_place(place_name,dist_id) values('$place_name','$ddldist')");
header("location:place.php");
}
}

if(isset($_GET['del']))
{
$idno=$_REQUEST['id'];
$delQuery="delete from tbl_place where place_id='".$idno."'";
mysqli_query($con,$delQuery);
header("location:place.php");


}
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>

table {
	border-collapse:collapse;
	width:100%;
	
}
th,td {
	text-align:center;
	padding:8px;
	height:30px;
}
tr:nth-child(even){
color:#000;
}
th{background-color:#336;
color:white;
text-align:center;
}

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
</script>
</head>

<?php include("head.php");?>
<body>

<form name="frmplace" method="post">
<table width="452"  align="center">
<tr>
<td width="201">state</td>
<td width="235">
<select name="ddlstate" id="ddlstate" onChange="LoadDist(this.value)" class="textbox"> 
<option value="sel">---select---</option>
<?php

$sel=mysqli_query($con,"select * from tbl_state");

while($row=mysqli_fetch_array($sel))
{
$st=$row['state_name'];
$k=0;
?>

<option value="<?php echo $row['state_id']; ?>" 
<?php 
if($row['state_id']==$k){ ?> selected="selected" <?php } ?> > <?php echo $st;?> </option>

<?php
}
?>
</select> 
</td>
</tr>
<tr>
<td width="201">district</td>
<td>
<div id="divDistrict" name="divDistrict" >
<select name="ddldist" id="ddldist" class="textbox">
<option>---select---</option>
<?php 
$sel=mysqli_query($con,"select * from tbl_district where state_id=".$k."");
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
</tr>
<tr>
<td>place</td>
<td><input type="text" name="txtplacename" value="<?php echo $editsname?>" class="textbox"/></td>
</tr>
<tr>
  <td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnsave" value="save" class="button"/>
&nbsp; &nbsp; &nbsp; &nbsp;</td>

</tr>
</table>
<table border="1" align="center">
<th>STATE</th><th>DISTRICT</th><th>PLACE</th><th colspan="2"></th>
<?php

$s=mysqli_query($con,"select * from tbl_place p,tbl_district d,tbl_state s where d.dist_id=p.dist_id and d.state_id=s.state_id") or die(mysql_error());
while($row=mysqli_fetch_array($s) or die(mysql_error()))
{
?>
<tr>
<td>
<?php
echo $row['state_name'];
?>
</td>
<td>
<?php
echo $row['dist_name'];
?>
</td>
<td>
  <?php
echo $row['place_name'];
?>
</td>
<td><a href="place.php?del=1&id=<?php echo $row['place_id'];?>">Delete</a></td>
<td><a href="place.php?edit=1&id=<?php echo $row['place_id'];?>">Edit</a></td>
</tr>



<?php
}
?>
</table>


</form>

</body>
<?php include("foot.php");?>
</html>


