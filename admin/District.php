<?php
$con=mysqli_connect("localhost","root","","db_personmanage");

$editsname="";
 $flag=0;   
		if(isset($_GET['edit']))
		{
			
			$idno=$_REQUEST['id']; 
			
  			$sel=mysqli_query($con,"select * from tbl_district where dist_id=".$idno);
			
			if($row=mysqli_fetch_array($sel))
			{
				$editsname=$row['dist_name'];
			}
			$flag=1;
			$k=$row['state_id'];
		}
  if(isset($_POST['save']))
  {
	 if($flag==1)
	 {
	 $dist_name=$_POST['txtdistrictname'];
		
		 $ddlstate=$_POST['ddlstate'];
		 $idno=$_REQUEST['id']; 
			mysqli_query($con,"update tbl_district set dist_name='".$dist_name."' where dist_id='".$idno."'");
			echo "<b>Values updated successfully!</b>";
			header("location:District.php");
		 }
		 else
		 {
	 $dist_name=$_POST['txtdistrictname'];
	 $ddlstate=$_POST['ddlstate'];
	 mysqli_query($con,"insert into tbl_district(dist_name,state_id) values('$dist_name','$ddlstate')");
	 header("location:District.php");
		 }
	  }

		if(isset($_GET['del']))
			{
 					 $idno=$_REQUEST['id']; 
 					mysqli_query($con,"delete from tbl_district where dist_id='".$idno."'");
					header("location:District.php");


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
       <?php include("head.php");?>  
     <body>  
          
<form name="frmdistrict" method="post">
<br>

<table width="452" align="center">
  <tr>
    <td width="201">state</td>
    <td width="235">
    <select name="ddlstate" class="textbox">
    <option value="sel">select</option>
    <?php
	
  			$sel=mysqli_query($con,"select * from tbl_state");
			
			while($row=mysqli_fetch_array($sel))
			{
			$st=$row['state_name'];
				echo $st;
				$k=0;
				?>
       
       <option value="<?php echo $row['state_id']; ?>"  
				    <?php 
				 	     if($row['state_id']==$k){ ?> selected="selected" <?php } ?> > <?php echo $st; ?> </option>
                       
       <?php
			}
			?>
 </select>   
    </td>
  </tr>
  <tr>
    <td>district</td>
    <td><input type="text" name="txtdistrictname" class="textbox" value="<?php echo $editsname?>"/></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="save" value="save" class="button"/>
    &nbsp; &nbsp; &nbsp; &nbsp;</td>
    
  </tr>
</table>

<table border="1" align="center">
	<th>STATE</th><th>DISTRICT</th><th></th><th></th>
	<?php
	
	$s=mysqli_query($con,"select * from tbl_district d,tbl_state s where s.state_id=d.state_id") ;
	while($r=mysqli_fetch_array($s))
	{
	?>
	<tr>
	<td>
	<?php
	 echo $r['state_name'];
	?>
    </td>
    <td>
	<?php
	 echo $r['dist_name'];
	?>
    </td>
    <td><a href="District.php?del=1&id=<?php echo $r['dist_id'];?>">Delete</a></td>
    <td><a href="District.php?edit=1&id=<?php echo $r['dist_id'];?>">Edit</a></td>
    </tr>
    

   
	<?php
	}
	?>
	</table>


</form>

    


</body>
<?php include("foot.php");?>
</html>
