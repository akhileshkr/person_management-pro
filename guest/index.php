
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
</head>
<body>
<div class="bgg">
<h1 class="hed">PERSON MANAGING </h1>
<p class="pf"><i></i></p> 
	<nav class="navbar navbar-default">
    <div class="container-fluid pull-right">
        <ul class="nav navbar-nav" style="margin-left:70px;">
            
         <li><a href="#">Home</a></li>

       
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
   
                
                <h1 style="margin-left:80px">LOGIN</h1>
                  	<form class="form-horizontal "   method="post" name="login_form">
                     
                    
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2" >USER/ADMIN NAME</label>
                    <div class="col-sm-9">
                      <input type="text"  name="txtusername" required="required" class="form-control book1" id="username" placeholder="username" autofocus="autofocus";>
                    </div></div>
            
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">PASSWORD</label>
                    <div class="col-sm-9">
                      <input type="password" name="txtpassword" required="required" id="password" class="form-control book1" placeholder="password">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" id="btnlogin" name="btnlogin">SUBMIT</button>
                    </div>
                 </div>
                <div class="forgot"> <ul>
               <!-- <li ><a href="recovery.php">Forgot password need help...?</a></li>--></ul>
      </div>
               
                </form>
                </div>
                <div class="col-sm-2">
                <a href="registration.php">
                <img src="images/want29404-1GnJBq1437506316.jpg" width="100px" height="100px" style="margin-left:-230px; margin-top:130px" /></a></div>
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
$con=mysqli_connect("localhost","root","","db_personmanage"); 



if(isset($_POST['btnlogin']))
	{
	
	    $selQry="select * from tbl_admin where admin_uname='".$_POST['txtusername']."' and admin_pwd='".$_POST['txtpassword']."'";
        $rsLogin=mysqli_query($con,$selQry);
        $count=mysqli_num_rows($rsLogin);
		
		 $selQry1="select * from tbl_reg where email='".$_POST['txtusername']."' and pwd='".$_POST['txtpassword']."' and status='1'";
        $rsLogin1=mysqli_query($con,$selQry1);
        $count1=mysqli_num_rows($rsLogin1);
	
		
		
		
		 if($count>0)
         {
              session_start();
			  ob_start();
			  $row=mysqli_fetch_array($rsLogin);
              $_SESSION['username']=$row['admin_uname'];
			 
              header('location:../admin/adminhome.php');
         }
		  if($count1>0)
         {
			 
			 
			 session_start();
			  ob_start();
			  $row=mysqli_fetch_array($rsLogin1);
              $_SESSION['email']=$row['email'];
			    $_SESSION['type_id']=$row['type_id'];
				if($row['type_id']=="1")
				{
			    $_SESSION['email']=$row['email'];
              header('location:../police/policehome.php');
			
				}
				if($row['type_id']=="2")
				{
			    $_SESSION['email']=$row['email'];
              header('location:../hospital/hospitalhome.php');
			
				}
				if($row['type_id']=="3")
				{  $_SESSION['email']=$row['email'];
			  
              header('location:../passport/passporthome.php');
			
				}
				if($row['type_id']=="4")
				{  $_SESSION['email']=$row['email'];
			  
              header('location:../emigration/emigrationhome.php');
			
				}
		 }
		   
			 
			 
             
		 
		
		 else
		 {
			 ?>
             
             <script>
			 
			 alert("invalid username or password");
			 </script>
             <?php
		 }
		 
		
		
	}
		?>