<?php

$con=mysqli_connect("localhost","root","","db_personmanage");
$f=0;
$st="";
				
		 if(isset($_GET['edit']))
		{
  			$ide=$_REQUEST['id1'];
  			$sel=mysqli_query($con,"select * from tbl_state where state_id='".$ide."'");
			$row=mysqli_fetch_array($sel);
			$st=$row['state_name'];
			$f=1;
		}
		if(isset($_POST['btnsave']))
		{
			 if($f==1)
			  {
			  		$ide=$_REQUEST['id1'];
				  	$state_name=$_POST['txtstatename'];
			mysqli_query($con,"update tbl_state set state_name='".$state_name."' where state_id='".$ide."'");
			echo "<b>Values updated successfully!</b>";
			$_POST['txtstatename']="";
			  }
			  else
			  {
  				$state_name=$_POST['txtstatename'];
 				
 				//echo $insQuery;
				mysqli_query($con,"insert into tbl_state(state_name)values('$state_name')") or die(mysql_error());
			  }
		}
		
		if(isset($_GET['del']))
		{
 				
 				$idno=$_REQUEST['id'];
 				mysqli_query($con,"delete from tbl_state where state_id='".$idno."'");
 				echo "<b>Values Deleted successfully!"; 

		}
			
	
	

			
		
	 	


?>
<html><head>
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
</head>
<?php include("head.php"); ?>
<body>
 
<form name="frmstate" method="post">
<table width="279"  align="center">
  <tr>
 
    <td align="center"><input type="text" name="txtstatename" class="textbox"  placeholder="Enter state name" value="<?php echo $st;?>"/></td>
  </tr>
  <tr><td align="center">
    &nbsp;<input type="submit" value="save" name="btnsave" class="button"  />  
    &nbsp;&nbsp;&nbsp; 
           </td>
  </tr>
</table>

 <table width="278" border="1" align="center">
  
  <tr>
  	<th align="center" colspan="3"> STATE</th>
    
		<?php
  			
  			$sel=mysqli_query($con,"select * from tbl_state");
  			while($row=mysqli_fetch_array($sel))
   				{
	   ?>
     </tr>
      
       <tr>
       			<td>
       					<?php echo $row['state_name'];?>
       			</td>
       
       			<td> <a href="state.php?del=1&id=<?php echo $row['state_id'];?>">Delete</a></td>
       			<td><a href="state.php?edit=1&id1=<?php echo $row['state_id'];?>">Edit</a></td>
		</tr>
		<?php	
				}
		?>
  </table>
</form>

</body>
<?php include("foot.php");?>
</html>
