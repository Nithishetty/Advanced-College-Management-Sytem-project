<?php
include("header.php");
if(isset($_SESSION['studentid']))
{
	echo "<script>window.location='studentaccount.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql = "SELECT * FROM student where rollno='$_POST[rollno]' AND password='$_POST[password]' and status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION["studentid"] = $rslogin['studentid'];
		$_SESSION["courseid"] = $rslogin['courseid'];
		$_SESSION["semesterid"] = $rslogin['semesterid'];
		echo "<script>window.location='studentaccount.php';</script>";
	}
	else
	{
		echo "<SCRIPT>alert('Invalid login credentials entered...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 col-sm-offset-3 book-appointment">
				<h3>Student Login Panel</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
					
					<div class="gaps">
						<p>Roll no</p>
						<input type="text" name="rollno" value="<?php echo $rsedit['rollno']; ?>" placeholder="Enter student roll no" autocomplete="off"  />
					</div>
					<div class="gaps">
					<p>Password</p>
						<input type="password" name="password" value="<?php echo $rsedit['password']; ?>" placeholder="Enter password" autocomplete="off" />
					</div>
					
					<input type="submit" name="submit" value="Log in">
				</form>
				<hr>
				<b><a href="forgotpassword.php">Did you forget password?</a></b>
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
		if(document.frm.rollno.value == "")
		{
			alert("Roll no should not be empty..");
			return false;
		}
		else if(document.frm.password.value== "")
		{
			alert("Please enter the password..");
			return false;
		}
	
	}
	</script>