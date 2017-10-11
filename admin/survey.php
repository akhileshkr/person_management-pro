
<?php
$con=mysqli_connect("localhost","root","","db_personmanage"); 


if(isset($_POST['btnsave']))
{
	$adharnum=$_POST['txtadhar'];
	$name=$_POST['txtname'];
	$address=$_POST['txtaddress'];
	$phone=$_POST['txtphn'];
	$state=$_POST['ddlstate'];
	$dist=$_POST['ddldist'];
	$place=$_POST['ddlplace'];
	$email=$_POST['txtemail'];
	$passport=$_POST['txtpassport'];
	$case=$_POST['txtcasenum'];
	$fname=$_FILES["fup"]["name"];
move_uploaded_file($_FILES["fup"]["tmp_name"],"../personimage/" . $fname);
	
	$q=mysqli_query($con,"insert into tbl_survey(adhar,name,address,phno,email,state_id,dist_id,place_id,img) values('$adharnum','$name','$address','$phone','$email','$state','$dist','$place','$fname')");
	$m=mysqli_query($con,"insert into tbl_passport values('0','$adharnum','$passport','0')");
	$e=mysqli_query($con,"insert into tbl_casedetail values('0','$adharnum','$case','0')")
	
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

<script>

function loadnocase(str)
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

xmlhttp.open("GET","ajaxnocase.php?stateID="+str,true);
xmlhttp.send();

xmlhttp.onreadystatechange=function() 
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("divcase").innerHTML=xmlhttp.responseText;

}

}
}

function loadcase(str)
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

xmlhttp.open("GET","ajaxcase.php?stateID="+str,true);
xmlhttp.send();

xmlhttp.onreadystatechange=function() 
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("divcase").innerHTML=xmlhttp.responseText;

}

}
}

function loadnull(str)
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

xmlhttp.open("GET","ajaxnull.php?stateID="+str,true);
xmlhttp.send();

xmlhttp.onreadystatechange=function() 
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("divnum").innerHTML=xmlhttp.responseText;

}

}
}


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

xmlhttp.open("GET","ajaxnum.php?stateID="+str,true);
xmlhttp.send();

xmlhttp.onreadystatechange=function() 
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("divnum").innerHTML=xmlhttp.responseText;

}

}
}

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
<?php include("head.php");?>
<body>


<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="497"  align="center" >
  <tr><td  align="center"><b><font size="+1">Common Details</font></b></td></tr>
   <tr><td align="center"><input type="file" name="fup" placeholder="choose image" /></td></tr>
    <tr>
        <td width="345"><input type="text" name="txtadhar" id="txtadhar" class="textbox" placeholder="enter adhar number" required />
   </td></tr><tr>
      <td width="345"><input type="text" name="txtname" id="txtname" placeholder="enter name" class="textbox" required />
      </td>
    </tr>
    <tr>
    
      <td><textarea name="txtaddress" class="textbox" id="textarea" placeholder="enter Address"  cols="45" rows="5" name="enter address" required></textarea></td>
    </tr>
    <tr>
     <td>
      <select name="ddlstate" id="ddlstate" onChange="LoadDist(this.value)" class="textbox"  required> 
<option value="sel">..select state..</option>
<?php
	
	$sel=mysqli_query($con,"select * from tbl_state");

	while($row=mysqli_fetch_array($sel))
	{
	$k=0;
	$st=$row['state_name'];
?>

	<option value="<?php echo $row['state_id']; ?>" 
	<?php 
	if($row['state_id']==$k){ ?> selected="selected" <?php } ?> > <?php echo $st;?> </option>

	<?php
}
?>
</select>    </td>
        <tr>
        </tr>
      
     <td><div id="divDistrict">
     
   <select name="ddldist" id="ddldist" onChange="loadplace(this.value)" class="textbox">
<option>---select district---</option>

</select>
   
   
   
   </div>
   </td>
        <tr>
        </tr>
        <tr>
         
          <td>
          <div id="divplace">
          
          <select name="ddlplace" id="ddlplace" class="textbox">
<option>---select place---</option>

</select>
          
        
   </div>
    </tr>
    <tr>
     
      <td><label for="textfield"></label>
        <input type="email" name="txtemail" id="txtemail" placeholder="enter email" class="textbox"  required/></td>
    </tr>
    
    
  
    
    
    <tr>
      
      <td><input type="number" name="txtphn" class="textbox"  required placeholder="enter number"   onblur="val_moblength(this.value)" ><span id="spn_mob"></span></td>
    </tr>
    <tr><td  align="center">..............................................................................................................................................................................................................................................................</td></tr>
    
    <tr><td  align="center"><b><font >Passport Details                      :</font> <input type="radio" name="txtpassport" value="1" onClick="loadnum(this.value)" />already passport<input type="radio" name="passport" value="0" onClick="loadnull(this.value)" />No passport </b></td></tr>
   
    <tr><td><div id="divnum"></div></td></tr>
        <tr><td  align="center">..................................................................................................................................................................................................................................................................</td></tr>
    
     <tr><td  align="center"><b><font>Case Details                          :<input type="radio" name="txtcasenum" value="1" onClick="loadcase(this.value)" />In a case<input type="radio" name="case" value="0" onClick="loadnocase(this.value)" />No Case</font></b></td></tr>
 
    <tr><td><div id="divcase"></div></td></tr>
    
     <tr><td  align="center">..............................................................................................................................................................................................................................................................</td></tr>
   <tr><td align="center" ><input type="submit" name="btnsave" class="button" id="btnsave" value="Save" /></td></tr>
  </table>
</form>

</body>
<?php include("foot.php");?>

</html>