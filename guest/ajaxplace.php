<?php

$con=mysqli_connect("localhost","root","","db_personmanage");
?>
<select name="ddlplace" id="ddlplace" class="form-control book1">
  <option>---select---</option>
  	<?php
  				
  				$district_id=$_REQUEST["districtid"];
				echo $district_id;
				$query=mysqli_query($con,"select * from tbl_place where dist_id=$district_id");
				while($data=mysqli_fetch_array($query))
					{
						$placeID=$data["place_id"];
						$placeName=$data["place_name"];
				?>
						<option value="<?php echo $placeID; ?>"><?php echo $placeName; ?></option>
    <?php
		}
 	 ?>
</select>

