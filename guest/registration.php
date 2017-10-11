<?php
$con=mysqli_connect("localhost","root","","db_personmanage");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.css" charset="utf-8"/>
<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />
<script src="css/jquery.min.js"></script>
<script src="css/jquery.validate.js"></script>
<script src="css/bootstrap.min.js"></script>
<title>Person managing</title>





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
<div class="bgg">
<h1 class="hed">PERSON MANAGING </h1>
<p class="pf"><i></i></p>  
	<nav class="navbar navbar-default">
    <div class="container-fluid pull-right">
        <ul class="nav navbar-nav" style="margin-left:70px;">
            
         <li><a href="index.php">Home</a></li>

       
            <li><a href="#">About us</a></li
        ></ul>
        
    </div>
    </nav>
</div>
 <div class="container-fluid">
    <div class="row">
     <div class="col-md-12  ">
     
             <div class="col-sm-3">
          <img src="images/login.jpg" width="1300px" height="450px" />
    </div>
 
     <div class="col-sm-5 panel panel-body logbox">
   
                
             
                
                
                <h5 style="margin-left:120px"><font size="+2">SIGN UP</font></h5>
                  	<form class="form-horizontal "   method="post" name="reg_form">
                     
                    
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">Type</label>
                    <div class="col-sm-9">
                         <select name="type" required class="form-control book1"  >
      
      <option value="">..select Type..</option>
      <?php

$sel=mysqli_query($con,"select * from tbl_type ");

while($r=mysqli_fetch_array($sel))
{
$ty=$r['type_id'];
$tn=$r['type_name'];
?>

<option value="<?php echo $ty; ?>" 
 > <?php echo $tn;?> </option>

<?php
}
?>
      
      
      </select>
               
                    </div></div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2">Licence</label>
                    <div class="col-sm-9">
                      <input type="text" name="txtlicence" required="required" id="txtlicence" class="form-control book1" placeholder="Enter Licence id">
                    </div>
                  </div>
                    
                    
                     <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">State</label>
                    <div class="col-sm-9">
                         
      <select name="ddlstate" id="ddlstate" onChange="LoadDist(this.value)" class="form-control book1"  required> 
<option value="sel">..select..</option>
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
</select> 
               
                    </div></div>
                     <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">District</label>
                    <div class="col-sm-9">
                         <div id="divDistrict">
     
   <select name="ddldist" id="ddldist"  class="form-control book1"  required="required">
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
                    </div></div>
                     <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">place</label>
                    <div class="col-sm-9">
                         <div id="divplace">
          
          <select name="ddlplace" id="ddlplace"  class="form-control book1"  required="required">
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
               
                    </div></div>
             <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2">Email</label>
                    <div class="col-sm-9">
                      <input type="email" name="txtemail"  required="required" id="txtemail" class="form-control book1" placeholder=" Your Email">
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">PASSWORD</label>
                    <div class="col-sm-9">
                      <input type="password"  required="required" name="txtpwd" id="password" class="form-control book1" placeholder="password">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" id="btnsav" name="btnsav">SUBMIT</button>
                      <button type="button" class="btn btn-default" id="login"  name="login" ><a href="index.php">LOGIN</a></button>
                    </div>
                 </div>
                <div class="forgot"> <ul>
               <!-- <li ><a href="recovery.php">Forgot password need help...?</a></li>--></ul>
      </div>
               
                </form>
                </div>
               
                </div>
      </div></div></div>

</body>
    <script>
    $(document).ready(function () {
    // Function Executes On Submit Button's Click
            $("#submit").click(function () {
                var fname = $("#username").val();
                var lname = $("#password").val();
                if (fname != '' && lname != '') {
                    return true;
                } else {
                    alert("Please enter username and password..");
                    return false;
                }
            });
        });
        
    </script>
  
</html>

<?php

if(isset($_POST['btnsav']))
{
$state=$_POST['ddlstate'];
$dist=$_POST['ddldist'];
$place=$_POST['ddlplace'];
$email=$_POST['txtemail'];
$type=$_POST['type'];
$uname=$_POST['txtemail'];
$pwd=$_POST['txtpwd'];
$licence=$_POST['txtlicence'];
$q=mysqli_query($con,"insert into tbl_reg values('0','$licence','$type','$email','$pwd','$state','$dist','$place','0')");

if($q>0)
{?>
<script>alert("Sucessfully Registered ->Wait 4 Response");</script>
<?php
}
	
}?>