<?php
include("header.php");
$img="images/noimage.png";
if(isset($_POST['submit']))
{
	$stname = "$_POST[studentfname] $_POST[studentlname]";
	$studentname  = mysqli_real_escape_string($con,$stname);
    $filename = rand() . $_FILES['img']['name'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"imgstudent/".$filename);
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE student SET studentname='$studentname',gender='$_POST[gender]'";		
		if($_FILES['img']['name'] != "")
		{
		$sql = $sql. ",img='$filename' " ;
		}		
		$sql = $sql. ",rollno='$_POST[rollno]',semesterid='$_POST[semesterid]',password='$_POST[password]',emailid='$_POST[emailid]',address='$_POST[address]',contactno='$_POST[contactno]',courseid='$_POST[courseid]' WHERE studentid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Student record updated successfully..');</script>";
		}
		//Update statement ends here
	}
	else
	{
		$sqlvalidate = "SELECT * FROM student WHERE rollno='$_POST[rollno]' AND status<>'Deleted'";
		$qsqlvalidate = mysqli_query($con,$sqlvalidate);
		if(mysqli_num_rows($qsqlvalidate) >= 1)
		{
				echo "<SCRIPT>alert('Student record already exists...');</script>";
		}
		else
		{
			//Insert statement starts here
			$sql = "INSERT INTO student(studentname,gender,img,rollno,semesterid,password,emailid,address,contactno,status,courseid) VALUES('$studentname','$_POST[gender]','$filename','$_POST[rollno]','$_POST[semesterid]','$_POST[password]','$_POST[emailid]','$_POST[address]','$_POST[contactno]','Pending','$_POST[courseid]')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<SCRIPT>alert('Registration Completed successfully. Admin needs to verify your account..');</script>";
				echo "<SCRIPT>window.location='index.php';</script>";
			}
			//Insert statement ends here
		}
	}
}

if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM student WHERE studentid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	$img = "imgstudent/".$rsedit['img'];
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Student form</h3>
				<form action="" method="post" enctype='multipart/form-data' name="frm" onsubmit="return validateform()">
					<div class="gaps col-md-6">
						<p>First Name</p>
						<input type="text" name="studentfname" value="<?php echo $rsedit['studentname']; ?>" placeholder="Enter student name" autocomplete="off"/>
					</div>
					<div class="gaps col-md-6">
						<p>Last name</p>
						<input type="text" name="studentlname" value="<?php echo $rsedit['studentname']; ?>" placeholder="Enter student name"autocomplete="off" />
					</div>
					
					<div class="gaps col-md-12">
						<p>Course</p>
						<select name="courseid">
							<option value=''>Select course</option>
							<?php
							$sqlcourse ="SELECT * From course WHERE status='Active'";
							$qsqlcourse=mysqli_query($con,$sqlcourse);
							while($rscourse=mysqli_fetch_array($qsqlcourse))
							{
								echo"<option value='$rscourse[courseid]'>$rscourse[course]</option>";
							}
							?>
						</select>
					</div>
					<div class="gaps col-md-12">
						<p>Semester</p>
						<select name="semesterid">
							<option value=''>Select</option>
							<?php
							$arr = array("1","2","3","4","5","6");
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
					
					
					<div class="gaps col-md-12">
						<p>Gender</p>
						<input type="radio" name="gender" checked value="Male"
<?php
if($rsedit['gender'] == "Male")
{
	echo " checked ";
}
?>
						/>Male
						
						&nbsp;&nbsp;
						<input type="radio" name="gender" value="Female"
<?php
if($rsedit['gender'] == "Female")
{
	echo " checked ";
}
?>
						/>Female
						<br>&nbsp;&nbsp;&nbsp;
					</div>
					<div class="gaps col-md-12">
						<p>Roll no</p>
						<input type="text" name="rollno" value="<?php echo $rsedit['rollno']; ?>" placeholder="Enter student roll no" autocomplete="off" />
					</div>
					<div class="gaps col-md-12">
					<p>Password</p>
						<input type="password" name="password" value="<?php echo $rsedit['password']; ?>" placeholder="Enter password" />
					</div>
					<div class="gaps col-md-12">
					<p>Confirm Password</p>
						<input type="password" name="cpassword" value="<?php echo $rsedit['password']; ?>" placeholder="Re-enter password" />
					</div>
					
					<div class="gaps col-md-12">
						<p>Email id</p>
						<input type="mail" name="emailid" value="<?php echo $rsedit['emailid']; ?>" placeholder="Enter email id" autocomplete="off" />
					</div>
					<div class="gaps col-md-12">
						<p>Address</p>
						<textarea name="address" placeholder="Enter address" /><?php echo $rsedit['address']; ?></textarea>
					</div>
					<div class="gaps col-md-12">
						<p>Contact no</p>
						<input type="text" name="contactno" placeholder="Enter contact no" value="<?php echo $rsedit['contactno']; ?>" autocomplete="off"/>
					</div>
					
					<input type="submit" name="submit" value="Click here to Register">
			
			</div>
			<div class="col-md-1 book-appointment">
			</div>
			<div class="col-md-4 book-appointment">
					<h3> &nbsp; </h3>
				    <div class="gaps">
						<p>Photo</p>
						<input type="file" name="img" onchange="previewFile()"/>
						<img id="img" src="<?php echo $img; ?>" style="width:100%;"  >
						
<script>
   function previewFile(){
       var preview = document.querySelector('img'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }
 // previewFile();  //calls the function named previewFile()
</script>
</div>
					
				</form>
			</div>
		</div>
	</div>
	<!-- //register -->


	<?php
include("footer.php")
?>
<script>
	function validateform()
	{
		var alphaExp = /^[a-zA-Z]+$/;
		var alphaNumericExp = /^[0-9a-zA-Z]+$/;
		var numericExpression = /^[0-9]+$/;
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		
		if(document.frm.studentfname.value == "")
		{
			alert("Student first name should not be empty..");
			return false;
		}
		else if(!document.frm.studentfname.value.match(alphaExp))
		{
			alert("Student first name should contain only characters..");
			return false;			
		}
		else if(document.frm.studentlname.value == "")
		{
			alert("Student last name should not be empty..");
			return false;
		}
		else if(!document.frm.studentlname.value.match(alphaExp))
		{
			alert("Student first name should contain only characters..");
			return false;			
		}
		else if(document.frm.courseid.value == "")
		{
			alert("Kindly select the course..");
			return false;
		}
		else if(document.frm.semesterid.value == "")
		{
			alert("Kindly select the semester..");
			return false;
		}
		else if(document.frm.rollno.value == "")
		{
			alert("Roll number should not be empty..");
			return false;
		}
		else if(!document.frm.rollno.value.match(alphaNumericExp))
		{
			alert("Kindly enter valid roll number..");
			return false;			
		}
		else if(document.frm.password.value == "")
		{
			alert("Password should not be empty..");
			return false;
		}
		else if(document.frm.password.value.length < 6)
		{
			alert("Password should contain more than 6 characters..");
			return false;
		}
		else if (document.frm.password.value != document.frm.cpassword.value)
		{
			alert("Password and confirmation password not matching....");
			return false;			
		}
		else if(document.frm.emailid.value == "")
		{
			alert("Email ID  should not be empty..");
			return false;
		}
		else if(!document.frm.emailid.value.match(emailExp))
		{
			alert("Kindly enter valid Email Id..");
			return false;			
		}
		else if(document.frm.address.value == "")
		{
			alert("Kindly enter the address..");
			return false;
		}
		else if(document.frm.contactno.value == "")
		{
			alert("Contact number should  not be empty..");
			return false;
		}
		else if(document.frm.contactno.value.length !=10)
		{
			alert("Contact number should contain 10 digits.");
			return false;
		}
		else if(!document.frm.contactno.value.match(numericExpression))
		{
			alert("Kindly enter valid contact number...");
			return false;
		}
		else if(document.frm.img.value == "")
		{
			alert("Kindly upload the image....");
			return false;
		}
		else
		{
			return true;
		}
	}
</script>