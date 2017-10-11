<?php
$con=mysqli_connect("localhost","root","","db_personmanage");



if(isset($_GET['Accept']))
{
$idno=$_REQUEST['id'];
$email=$_REQUEST['email'];
	$updQuery="update tbl_reg set status='1' where reg_id='".$idno."'";
	 mysqli_query($con,$updQuery) or mysql_error("error"); 
	 
	 
	 
$from="";//put the from mail address
$account="";//put the account mail address
$password="";//put the mail address password

$to=$email;
$fromc="";//put the from mail address
$from_name="Person Managing";
$msg="<strong>Your account has been verified and accepted<br />
</strong>"; // HTML message
$subject="Accept Verification";


//error_reporting(0);
include("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
//$mail->Host = "www.vtrio.com";
$mail->SMTPAuth= true;
$mail->Port = 465; // Or 587
$mail->Username= $account;
$mail->Password= $password;
$mail->SMTPSecure = 'ssl';
$mail->From = $fromc;
$mail->FromName= $from_name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->addAddress($to);
//$mail->AddAttachment("Scan5.pdf");

//$mail->AddAttachment("logo.gif");
if(!$mail->send()){
 echo "Mailer Error: " . $mail->ErrorInfo;
}else{
?>
<script>
//alert("Message send to the Mail ID");
//window.location="inbox.php"; 
</script>
<?php
echo "E-Mail has been sent";
}
	 
	 
	

}
	if(isset($_GET['Reject']))
{
$idno=$_REQUEST['id'];
$updQuery="update tbl_reg set status='2' where reg_id='".$idno."'";
mysqli_query($con,$updQuery) or mysql_error("error");

}

?>
<html>
<head>
<style>
table {
	border-collapse:collapse;
	width:100%;
}
th,td {
	text-align:justify;
	padding:8px;
	height:40px;
}
tr:nth-child(even){background-color:#CFF;
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
<th> TYPE</th><th>LICENCE</th><th>EMAIL</th><th> STATE</th><th>DISTRICT</th><th> PLACE</th><th></th><th></th><th></th></br>

<?php
$sel="select * from tbl_reg r,tbl_state s,tbl_district d,tbl_place p,tbl_type t where r.type_id=t.type_id and s.state_id=d.state_id and d.dist_id=p.dist_id and p.place_id=r.place_id";
$s=mysqli_query($con,$sel) or die(mysql_error());
while($row=mysqli_fetch_array($s) or die(mysql_error()))
{
?>
<tr>
<td>
<?php
echo $row['type_name'];
?>
</td>
<td>
<?php
echo $row['licence_id'];
?>
</td>
<td>
<?php
echo $row['email'];
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


<?php  if($row['status']==1) {?>
<td><a href="#"><font color="#66FF00">Accepted</font></a></td>
<?php }else{?>
<td><a href="accept.php?Accept=1&id=<?php echo $row['reg_id'];?>&email=<?php
echo $row['email'];
?>">Accept</a></td>
<?php }?>
<?php if($row['status']==2) {?>
<td><a href="#"><font color="#FF0000">Rejected</font></a></td>
<?php }else{?>
<td><a href="accept.php?Reject=1&id=<?php echo $row['reg_id'];?>">Reject</a></td>
<?php }?>
</tr>



<?php
}
?>
</table>

</body>
<?php include("foot.php");?>
</html>