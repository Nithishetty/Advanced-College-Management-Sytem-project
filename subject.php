<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand() . $_FILES["syllabus"]["name"];
	move_uploaded_file($_FILES["syllabus"]["tmp_name"],"syllabusfile/".$filename);
	
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE  subject set subject='$_POST[subject]',courseid='$_POST[courseid]',semesterid='$_POST[semesterid]',subjectdescription='$_POST[subjectdescription]',status='$_POST[status]'";
		if($_FILES["syllabus"]["name"] != "")
		{
		$sql = $sql . ",syllabus='$filename'";
		}
		$sql = $sql . " WHERE subjectid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Subject record updated successfully..');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO subject(subject,courseid,semesterid,subjectdescription,status,syllabus) VALUES('$_POST[subject]','$_POST[courseid]','$_POST[semesterid]','$_POST[subjectdescription]','$_POST[status]','$filename')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Subject record inserted successfully..');</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM subject WHERE subjectid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Subject form</h3>
				<form action="" method="post" name="frm1" onsubmit="return validateform()" enctype="multipart/form-data" >
					<div class="gaps">
					<p>Course </p>
						 <select name="courseid">
			<option value=''>Select</option>
			<?php
			$sqlcourse = "SELECT * FROM course WHERE status='Active'";
			$qsqlcourse = mysqli_query($con,$sqlcourse);
			while($rscourse = mysqli_fetch_array($qsqlcourse))
			{
				if($rscourse['courseid'] == $rsedit['courseid'])
				{
				echo "<option value='$rscourse[courseid]' selected>$rscourse[course]</option>";
				}
				else
				{
				echo "<option value='$rscourse[courseid]'>$rscourse[course]</option>";
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
					<p>Subject</p>
						<input type="text" name="subject" value="<?php echo $rsedit['subject'];?>" placeholder="Enter subject "  />
					</div>

					<div class="gaps">
					<p>Subject description </p>
						<textarea name="subjectdescription"  placeholder="Enter subject description" ><?php echo $rsedit['subjectdescription'];?></textarea>
					</div>
				
<div class="gaps">
	<p>Upload syllabus Plan</p>
	<input type="file" name="syllabus" />
	<?php
	if($rsedit['syllabus'] != "")
	{
		if(file_exists("syllabusfile/$rsedit[syllabus]"))
		{
			echo "<a href='syllabusfile/$rsedit[syllabus]' download><b>Download</b></a>";
		}
	}
	?>
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
        var alphaspaceExp = /^[a-zA-Z\s]+$/;	
    	if(document.frm1.courseid.value == "")
		{
			alert("Kindly select the course..");
			return false;
		}
		else if(document.frm1.semesterid.value == "")
		{
			alert("Kindly select the semester..");
			return false;
		}
		if(document.frm1.subject.value == "")
		{
			alert("Subject should not be empty..");
			return false;
		}
		
		
		 if(document.frm1.subjectdescription.value == "")
		{
			alert("Subject description should not be empty..");
			return false;
		}
		else if(document.frm1.status.value == "")
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