<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE fees_setting set courseid='$_POST[courseid]',semesterid='$_POST[semesterid]',fees_type='$_POST[fees_type]',fees_amt='$_POST[fees_amt]',fees_status='$_POST[fees_status]' where 	fees_setting_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Course record updated successfully..');</script>";
		}
	}
	else
	{	
		$sql = "INSERT INTO fees_setting(courseid,semesterid,fees_type,fees_amt,fees_status) VALUES('$_POST[courseid]','$_POST[semesterid]','$_POST[fees_type]','$_POST[fees_amt]','$_POST[fees_status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('New Fees Setting Record Inserted successfully..');</script>";
			echo "<SCRIPT>window.location='feessettings.php';</script>";
		}
	} 
}
if(isset($_GET['editid']))
{
	$sqledit="SELECT * FROM fees_setting where fees_setting_id='$_GET[editid]'";
	$qsqledit=mysqli_query($con,$sqledit);
	$rsedit=mysqli_fetch_array($qsqledit);
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 col-sm-offset-3 book-appointment" >
				<h3>Fees Settings</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">

					<div class="gaps">
						<p>Course</p>
						<select name="courseid">
							<option value=''>Select course</option>
							<?php
							$sqlcourse ="SELECT * From course WHERE status='Active'";
							$qsqlcourse=mysqli_query($con,$sqlcourse);
							while($rscourse=mysqli_fetch_array($qsqlcourse))
							{
								if($rscourse['courseid'] == $rsedit['courseid'])
								{
								echo"<option value='$rscourse[courseid]' selected>$rscourse[course]</option>";
								}
								else
								{
								echo"<option value='$rscourse[courseid]'>$rscourse[course]</option>";
								}
							}
							?>
						</select>
					</div>
					<div class="gaps">
						<p>Semester</p>
						<select name="semesterid">
							<option value=''>Select</option>
							<?php
							$arr = array("1","2","3","4","5","6","7","8");
							foreach($arr as $val)
							{
								if($val == $rsedit['semesterid'])
								{
									echo "<option value='$val' selected>$val</option>";
								}
								else
								{
									echo "<option value='$val'>$val</option>";
								}
							}
							?>
						</select>
					</div>

					<div class="gaps">
						<p>Enter Fees Type  </p>
						<input type="text" name="fees_type" id="fees_type" value="<?php echo $rsedit['fees_type']; ?>" placeholder="Enter Fees Type" autocomplete="off"/>
					</div>

					<div class="gaps">
						<p>Enter Fees Amount  </p>
						<input type="number" min="1" name="fees_amt" id="fees_amt" value="<?php echo $rsedit['fees_amt']; ?>" placeholder="Enter Fees Amount" autocomplete="off"/>
					</div>
					
					<div class="gaps">
						<p>Status (Enable/Disable)</p>
						<select name="fees_status">
						<option value=''>Select Status</option>
						<?php
						$arr = array("Active","Inactive");
						foreach($arr as $val)
						{
							if($val == $rsedit['fees_status'])
							{
								echo "<option value='$val' selected>$val</option>";
							}
							else
							{
								echo "<option value='$val'>$val</option>";
							}
						}
						?>
						</select>
					</div>
					<input type="submit" name="submit" value="Submit">
					
			 </form>
			</div>
			
		</div>
	</div>
	<!-- //register -->

	<!-- //register -->
	<?php
include("footer.php")
?>
<script>
function validateform()
{
	if(document.frm.courseid.value == "")
	{
		alert("Course should not be empty..");
		return false;
	}
    else if(document.frm.semesterid.value == "")
	{
		alert("Course description should not be empty..");
		return false;
	
	}
	else if(document.frm.fees_type.value == "")
	{
		alert("Kindly select the status..");
		return false;		
	}
	else if(document.frm.fees_amt.value == "")
	{
		alert("Kindly select the status..");
		return false;		
	}
	else if(document.frm.fees_status.value == "")
	{
		alert("Kindly select the status..");
		return false;		
	}
	else
	{
		return true;
	}
}
</script>