
<?php
$con=mysqli_connect("localhost","root","","db_personmanage"); 
$id=$_REQUEST['ID'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>viewall</title>
</head>

<body>
<table  align="center" >
<tr>

<?php
$id=$_REQUEST['ID']; 
$s=mysqli_query($con,"select * from tbl_survey r,tbl_state s,tbl_district d,tbl_place p,tbl_casedetail c,tbl_passport j where s.state_id=d.state_id and d.dist_id=p.dist_id and p.place_id=r.place_id and r.adhar=c.adhar and c.adhar=j.adhar and r.adhar='$id'");

while($r=mysqli_fetch_array($s))
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

} ?>

</tr>
</table>

</body>
</html>