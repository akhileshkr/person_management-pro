<?php

$con=mysqli_connect("localhost","root","","db_personmanage");
?>
<select name="ddldist" id="ddldist" onchange="loadplace(this.value)" class="form-control book1">
  <option>---select---</option>
  	<?php
  				
  				$state_id=$_REQUEST["stateID"];
				$query=mysqli_query($con,"select dist_id,dist_name from tbl_district where state_id=$state_id");
				while($data=mysqli_fetch_array($query))
					{
						$dist_id=$data["dist_id"];
						$dist_name=$data["dist_name"];
				?>
						<option value="<?php echo $dist_id; ?>"><?php echo $dist_name; ?></option>
    <?php
		}
 	 ?>
</select>
<input type="text" onchange="" 

