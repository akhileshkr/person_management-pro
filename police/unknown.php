
<?php
$con=mysqli_connect("localhost","root","","db_personmanage"); 


if(isset($_POST['submit']))
{
	$fname=$_FILES["fup"]["name"];
move_uploaded_file($_FILES["fup"]["tmp_name"],"../unknown/" . $fname);
	
	$q=mysqli_query($con,"insert into tbl_unknown values('0','$fname','n','0')");

	
	?>
    <script>
	alert("Sucessfully registerd");
	
	</script>
    <?php
	
	
}





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>

function loadnum(str)
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

xmlhttp.open("GET","ajaxviewall.php?ID="+str,true);
xmlhttp.send();

xmlhttp.onreadystatechange=function() 
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("divall").innerHTML=xmlhttp.responseText;

}

}
}
</script>


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


<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="497"  align="center" >
  <tr><td  align="center"><b><font size="+1">User Image</font></b></td></tr>
   <tr><td align="center"><input type="file" name="fup" placeholder="choose image" /></td></tr>
   <tr align="center"><td ><input type="submit" name="submit" value="search" /></td><td><input type="submit" name="view" value="View" /></td></tr>
    <tr></tr>
	<tr></tr>
	</table>


<?php
if (isset($_POST['view']))
{
$re=mysqli_query($con,"select * from tbl_unknown where `status`= 'y';");
$result = mysqli_fetch_array($re);
$s=mysqli_query($con,"select * from tbl_survey r, tbl_unknown u,tbl_state s,tbl_district d,tbl_place p,tbl_casedetail c,tbl_passport j where r.img= '$result[result]' and s.state_id= d.state_id and d.dist_id = p.dist_id and p.place_id=r.place_id and r.adhar=c.adhar and c.adhar=j.adhar");

if($r=mysqli_fetch_array($s))
{ ?>
 <table align="left" border="1">
<tr><th colspan="2"><img src="../personimage/<?php echo $r['img'];?> " width="200" height="200" /></th></tr>
<tr><td align="center" colspan="2" bgcolor="#9966FF">Personal details</tr>
<tr><td>Adhar card number</td><td><?php echo $r['adhar'];?> </td></tr>
<tr><th> Name</th><th><?php echo $r['name'];?> </th></tr>
<tr><td>Address</td><td><?php echo $r['address'];?> </td></tr>
<tr><th>Email</th><th><?php echo $r['email'];?></th></tr>
<tr><td>Phone </td><td><?php echo $r['phno'];?></td></tr>
<tr><th>state</th><th><?php echo $r['state_name'];?></th></tr>
<tr><th>District</th><th><?php echo $r['dist_name'];?></th></tr>
<tr><td>Place</td><td><?php echo $r['place_name'];?></td></tr>
<tr><td align="center" colspan="2" bgcolor="#9966FF">Case details</tr>
<tr><td>case</td><td><?php if($r['casesection']==""){ echo "No Case"; }else{ echo $r['casesection']; }?></td></tr>
<tr><td align="center" colspan="2" bgcolor="#9966FF">Passport details</tr>
<tr><td>passport</td><td><?php if($r['passportnum']==""){ echo "No passport"; }else{ echo $r['passportnum']; }?></td></tr>
</table>
</td>
<?php 
mysqli_query($con,"UPDATE `tbl_unknown` SET `status`='r' where `status`= 'y';");
}
} 
?>

</table>
   
</form>

</body>
<?php include("foot.php");?>

</html>