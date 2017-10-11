
<?php
$con=mysqli_connect("localhost","root","","db_personmanage"); 


if(isset($_POST['btnsave']))
{
	
	$name=$_POST['txtname'];
	$address=$_POST['txtaddress'];
	$phone=$_POST['txtphn'];
	$state=$_POST['ddlstate'];
	$dist=$_POST['ddldist'];
	$place=$_POST['ddlplace'];
	$email=$_POST['txtemail'];
	$fname=$_FILES["fup"]["name"];
move_uploaded_file($_FILES["fup"]["tmp_name"],"../personimage/" . $fname);
	
	mysqli_query($con,"insert into tbl_survey(name,address,phno,email,state_id,dist_id,place_id,img) values('$name','$address','$phone','$email','$state','$dist','$place','$fname')");
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



<style type="text/css">
.form-style-5{
    max-width: 700px;
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
    color: #FFF;
    margin: 0 auto;
    background:#F00;
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
table {
	border-collapse:collapse;
	width:100%;
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



function uexist(str)
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
		xmlhttp.open("GET","ajaxuexist.php?uname="+str,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function() 
		{
			if(xmlhttp.readyState==4)
			{
				var v;
				v=xmlhttp.responseText;
				if(v==1)
				document.getElementById("spn_uname").innerHTML="already exist";
				else
				document.getElementById("spn_uname").innerHTML="";
			}
		}
}



function val_length(str)
{
	if(str.length<6 || str.length>18 )
	{
		document.getElementById("spn_pwd").innerHTML="password shoud be 6 to 18 character length";
		return false;
	}
	else
	{
		document.getElementById("spn_pwd").innerHTML="";
		return true;
	}
	
}

function val_moblength(str)
{
	if(str.length==10 )
	{
		
		document.getElementById("spn_mob").innerHTML="";
		return true;
	}
	else
	{
		document.getElementById("spn_mob").innerHTML="mobile number should contain 10 digitz";
		return false;
		
	}
	
}



</script>


</head>

<body>


<div class="form-style-5">
<form id="form1" name="form1" method="post" action="">
  <table width="497"   align="center" >
  <tr><td colspan="2" align="center"><b><font size="+2">Register Here</font></b></td></tr>
    <tr>
      <td width="136"><div align="center"><strong>Name</strong></div></td>
      <td width="345"><input type="text" name="txtname" id="txtname" required />
      </td>
    </tr>
    <tr>
      <td><div align="center"><strong>Address</strong></div></td>
      <td><textarea name="txtaddress" id="textarea" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td><div align="center"><strong>State</strong></div></td><td>
      <select name="ddlstate" id="ddlstate" onChange="LoadDist(this.value)"  required> 
<option value="sel">sel</option>
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
          <td><div align="center"><strong>District </strong></div></td>
     <td><div id="divDistrict">
     
   <select name="ddldist" id="ddldist" onchange="loadplace(this.value)">
<option>---select---</option>

</select>
   
   
   
   </div>
   </td>
        <tr>
        </tr>
        <tr>
          <td><div align="center"><strong>Place</strong></div></td>
          <td>
          <div id="divplace">
          
          <select name="ddlplace" id="ddlplace">
<option>---select---</option>

</select>
          
        
   </div>
    </tr>
    <tr>
      <td><div align="center"><strong>Email</strong></div></td>
      <td><label for="textfield"></label>
        <input type="email" name="txtemail" id="txtemail"  required/></td>
    </tr>
    
    
  
    
    
    <tr>
      <td><div align="center"><strong>Contact</strong></div></td>
      <td><input type="number" name="txtphn"  required   onblur="val_moblength(this.value)" ><span id="spn_mob"></span></td>
    </tr>
    
    <tr><td>image</td><td><input type="file" name="fup" /></td></tr>
    
    
 
   <tr><td align="center"  colspan="2"><input type="submit" name="btnsave" id="btnsave" /></td></tr>
  </table>
</form>
</div>
</body>


</html>