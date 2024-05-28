<?php
include("header.php");
include("phpmailer.php");
if(isset($_SESSION['studentid']))
{
	echo "<script>window.location='studentaccount.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql = "SELECT * FROM student where rollno='$_POST[rollno]' and status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$mailname = $rslogin['studentname'];
		$mailto = $rslogin['emailid'];
		$mailsubject = "Password recovery mail from TELLME";
		$mailmsg = "Hello " .  $rslogin['studentname'] . ",<br><br>Login ID :  " .  $rslogin['rollno'] . "<br>Password : " .   $rslogin['password'];
		sendmail($mailname,$mailto, $mailsubject, $mailmsg);
		echo "<script>alert('Password sent to your Mail ID..');</script>";
		echo "<script>window.location='studentlogin.php';</script>";
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
			<div class="col-md-6 book-appointment">
				<h3>Student login form</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
					
					<div class="gaps">
						<p>Roll no</p>
						<input type="text" name="rollno" placeholder="Enter Roll no" autocomplete="off"  />
					</div>
					<input type="submit" name="submit" value="Recover Password">
				</form>
				<hr>
				<b><a href="studentlogin.php">Student Login</a></b>
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