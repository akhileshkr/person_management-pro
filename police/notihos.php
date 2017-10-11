<?php
$con=mysqli_connect("localhost","root","","db_personmanage");
?>

<html>
<head>
<style>
table {
	border-collapse:collapse;
	width:100%;
}
th,td {
	text-align:center;
	padding:8px;
	height:40px;
}
tr:nth-child(even){background-color:#FFF;
color:#000;
}
th{background-color:#336;
color:white;
}
</style>

</head>
<?php include("head.php");?>
<body>


<table border="1">
<th width="100"></th><th> ADHAR</th><th>NAME</th><th> STATE</th><th>DISTRICT</th><th> PLACE</th><th>HOSPITAL</th><th>DETAILS</th></br>

<?php
$sel="select * from tbl_state s,tbl_district d,tbl_place p,tbl_survey su,tbl_medicalhistory m where s.state_id=d.state_id and d.dist_id=p.dist_id and p.dist_id=su.dist_id and p.place_id=su.place_id and su.adhar=m.adhar";
$s=mysqli_query($con,$sel) or die(mysql_error());
while($row=mysqli_fetch_array($s) or die(mysql_error()))
{
?>
<tr>
<td><img src="../personimage/<?php
echo $row['img'];
?>" width="100" height="100">

</td>
<td>
<?php
echo $row['adhar'];
?>
</td>
<td>
<?php
echo $row['name'];
?>
</td>
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
<td>
<?php
echo $row['hosuname'];
?>
</td>
<td>
<?php
echo $row['report'];
?>
</td>


</tr>


<?php
}
?>
</table>

</body>
<?php include("foot.php");?>
</html>
