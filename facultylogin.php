<?php
include("header.php");
if(isset($_SESSION["facultyid"]))
{
	echo "<script>window.location='facultyaccount.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql="SELECT * FROM faculty where facultycode='$_POST[facultycode]' AND password='$_POST[password]' AND status='Active'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql)==1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION["facultyid"] = $rslogin['facultyid'];
		echo "<script>window.location='facultyaccount.php';</script>";
	}
	else
	{
		echo"<script>Invalid credentials entered</script>";
	}
}
		
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Faculty Login form</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
					
					<div class="gaps">
						<p>Faculty code</p>
						<input type="text" name="facultycode" value="<?php echo $rsedit['facultycode'];?>" autocomplete="off"  placeholder="Enter faculty code" />
					</div>
					
					<div class="gaps">
						<p>Password</p>
						<input type="password" name="password" value="<?php echo $rsedit['password'];?>" autocomplete="off" placeholder="Enter password" />
					</div>
					
					<input type="submit" name="submit" value="Login">
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
		if(document.frm.facultycode.value == "")
		{
			alert("Faculty code should not be empty..");
			return false;
		}
		else if(document.frm.password.value.length < 6)
		{
			alert("Please enter the password..");
			return false;
		}
	
	}
	</script>