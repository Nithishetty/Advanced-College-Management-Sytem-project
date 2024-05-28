<?php
include("header.php");
if(isset($_POST['submit']))
{	
	$filename = rand() . $_FILES['img']['name'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"imgstudent/".$filename);
	//Update statement starts here
		$sql = "UPDATE student SET studentname='$_POST[studentname]',gender='$_POST[gender]'";		
		if($_FILES['img']['name'] != "")
		{
		$sql = $sql. ",img='$filename' " ;
		}		
		$sql = $sql. ",rollno='$_POST[rollno]',password='$_POST[password]',emailid='$_POST[emailid]',address='$_POST[address]',contactno='$_POST[contactno]',status='$_POST[status]' WHERE studentid='$_SESSION[studentid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Student profile updated successfully..');</script>";
			echo "<SCRIPT>window.location='studentprofile.php';</script>";
		}
		//Update statement ends here
	
}
	$sqledit = "SELECT * FROM student LEFT JOIN course ON student.courseid=course.courseid WHERE studentid='$_SESSION[studentid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	$img = "imgstudent/".$rsedit['img']; 
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-7 book-appointment">
				<h3>Student Profile</h3>
				<form action="" method="post" enctype="multipart/form-data" >
					<div class="gaps">
						<p>Student Name</p>
						<input type="text" name="studentname" value="<?php echo $rsedit['studentname']; ?>" placeholder="Enter student name" />
					</div>
					<div class="gaps">
						<p>Course</p>
						<input type="text" name="courseid" value="<?php echo $rsedit['course']; ?>" placeholder="Enter the course" readonly />
					</div>
					<div class="gaps">
						<p>Semester</p>
						<input type="text" name="semesterid" value="<?php echo $rsedit['semesterid']; ?>" placeholder="Enter the semester" readonly />
					</div>
					
					<div class="gaps">
						<p>Gender</p>
						<input type="radio" name="gender" value="Male"
<?php
if($rsedit['gender'] == "Male")
{
	echo " checked ";
}
?>
						/>Male
						<input type="radio" name="gender" value="Female"
<?php
if($rsedit['gender'] == "Female")
{
	echo " checked ";
}
?>
						/>Female
					</div>
					&nbsp;
					<div class="gaps">
						<p>Roll no</p>
						<input type="text" name="rollno" value="<?php echo $rsedit['rollno']; ?>" placeholder="Enter student roll no" />
					</div>
					
					<div class="gaps">
						<p>Email id</p>
						<input type="mail" name="emailid" value="<?php echo $rsedit['emailid']; ?>" placeholder="Enter email id" />
					</div>
					<div class="gaps">
						<p>Address</p>
						<textarea name="address" placeholder="Enter address" ><?php echo $rsedit['address']; ?></textarea>
					</div>
					<div class="gaps">
						<p>Contact no</p>
						<input type="text" name="contactno" placeholder="Enter contact no" value="<?php echo $rsedit['contactno']; ?>" />
					</div>
					<input type="submit" name="submit" value="Update Profile">
			</div>
			<div class="col-md-1 book-appointment">
			</div>
			<div class="col-md-4 book-appointment">
			
				<h3>&nbsp;</h3>
					<div class="gaps">
						<p>Photo</p>
<input type="file" name="img" id="img" onchange="previewFile()"/>
<img id="imgprofile" src="<?php echo $img; ?>" style="width:100%;"  >
						
<script>
	img.onchange = evt => {
	  const [file] = img.files
	  if (file) {
	    imgprofile.src = URL.createObjectURL(file)
	  }
	}
</script>
					
				</form></div>
			</div>
		</div>
	</div>
	<!-- //register -->


	<?php
include("footer.php")
?>