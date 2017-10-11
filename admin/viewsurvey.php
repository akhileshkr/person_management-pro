<?php

$con=mysqli_connect("localhost","root","","db_personmanage");

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>employee details</title>
<style type="text/css">


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
text-align:center;
}
th{
color:black;
text-align:center;
}
</style>
</head>
<?php include("head.php");?>
<body>

<table   cellpadding="0" cellspacing="0" border="0"  align="center" width="60%" >
<tr>


<?php 
$s=mysqli_query($con,"select * from tbl_survey r,tbl_state s,tbl_district d,tbl_place p,tbl_casedetail c,tbl_passport j where s.state_id=d.state_id and d.dist_id=p.dist_id and p.place_id=r.place_id and r.adhar=c.adhar and c.adhar=j.adhar");
$counter=0;
while($r=mysqli_fetch_array($s))
{ if(($counter==0)||($counter>1))echo "<tr>";

 ?><font size="+2">  
 <td>
 <table width="100%" border="1">
<tr><th colspan="2" rowspan="14" width="30%"><img src="../personimage/<?php echo $r['img'];?> " width="340" height="340" /></th></tr>
<tr><td align="center" colspan="2" bgcolor="#FFCCFF">Personal details</tr>
<tr><td>Adhar card number</td><td><?php echo $r['adhar'];?> </td></tr>
<tr><td> Name</td><td><?php echo $r['name'];?> </td></tr>
<tr><td>Address</td><td><?php echo $r['address'];?> </td></tr>
<tr><td>Email</td><td><?php echo $r['email'];?></td></tr>
<tr><td>Phone </td><td><?php echo $r['phno'];?></td></tr>
<tr><td>state</td><td><?php echo $r['state_name'];?></td></tr>
<tr><td>District</td><td><?php echo $r['dist_name'];?></td></tr>
<tr><td>Place</td><td><?php echo $r['place_name'];?></td></tr>
<tr><td align="center" colspan="2" bgcolor="#FFCCFF">Case details</tr>
<tr><td>case</td><td><?php if($r['casesection']==""){ echo "No Case"; }else{ echo $r['casesection']; }?></td></tr>
<tr><td align="center" colspan="2" bgcolor="#FFCCFF">Passport details</tr>
<tr><td>passport</td><td><?php if($r['passportnum']==""){ echo "No passport"; }else{ echo $r['passportnum']; }?></td></tr>
<tr><td colspan="4"><a href="update.php?ad=<?php echo $r['adhar'];?>"><font size="+2">Update</font></a></td></tr>
</table>
</td>
</font>
<?php 	$counter++;
 if($counter==1){echo "</tr>";$counter=0; }
} ?>

</tr>
</table>
</body>
<?php include("foot.php");?>
</html>
