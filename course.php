<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE course set course='$_POST[course]',coursedescription='$_POST[coursedescription]',status='$_POST[status]'where courseid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Course record updated successfully..');</script>";
		}
	}
	else
	{	
		$sql = "INSERT INTO course(course,coursedescription,status) VALUES('$_POST[course]','$_POST[coursedescription]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Course record inserted successfully..');</script>";
		}
	 } 
	}
	if(isset($_GET['editid']))
	{
		$sqledit="SELECT * FROM course where courseid='$_GET[editid]'";
		$qsqledit=mysqli_query($con,$sqledit);
		$rsedit=mysqli_fetch_array($qsqledit);
	}
?>
	
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment" >
				<h3>Course form</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
					<div class="gaps">
					<p>Course</p>
						<input type="text" name="course" placeholder="Enter course " autocomplete="off" value="<?php echo $rsedit['course'];?>"  />
					</div>
					<div class="gaps">
					<p>Course description  </p>
						
						<textarea name="coursedescription" placeholder="Enter course details"><?php echo $rsedit['coursedescription'];?></textarea>
					</div>
					
					
					<div class="gaps">
						<p>Status</p>
						<select name="status">
						<option value=''>Select</option>
						<?php
						$arr = array("Active","Inactive");
						foreach($arr as $val)
						{
							if($val == $rsedit['status'])
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
		var alphaExp = /^[a-zA-Z]+$/;
		if(document.frm.course.value == "")
		{
			alert("Course should not be empty..");
			return false;
		}
		if(!document.frm.course.value.match(alphaExp))
		{
			alert("Course name should contain only characters..");
			return false;			
		}
	    if(document.frm.coursedescription.value == "")
		{
			alert("Course description should not be empty..");
			return false;
		
		}
		else if(document.frm.status.value == "")
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