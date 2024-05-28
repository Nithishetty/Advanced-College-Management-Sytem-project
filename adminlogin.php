<?php
include("header.php");
if(isset($_SESSION['adminid']))
{
	echo "<script>window.location='dashboard.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql="SELECT * FROM admin where loginid='$_POST[loginid]' AND password='$_POST[password]' AND status='Active'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	
	if(mysqli_num_rows($qsql)==1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION['adminid'] = $rslogin['adminid'];
		$_SESSION['usertype'] = $rslogin['usertype'];
		echo "<script>window.location='dashboard.php';</script>";
	}
	else
	{
		echo"<script>alert('Invalid credentials entered..');</script>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-3"></div>
			<div class="col-md-6 book-appointment">
				<center>
						<h3>ADMIN LOGIN PANEL</h3>
						<form action="" method="post" name="frm" onsubmit="return validateform()">
							<div class="gaps">
								<p style="text-align: left;">Login ID</p>
								<input type="text" name="loginid"  autocomplete="off" placeholder="Enter Login ID" />
							</div>
							<div class="gaps">
								<p style="text-align: left;">Password</p>
								<input type="password" name="password" placeholder="Enter Password" id="password1"/>
								<input type="submit" name="submit" value="Login">
							</div>
						</form>
				</center>
			</div>
			<div class="col-md-3"></div>
		</div>
	<!-- //register -->


	<?php
include("footer.php")
?>
<script>
function validateform()
{
	if(document.frm.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		return false;
	}
	else if(document.frm.password.value == "")
	{
		alert("Please enter the password..");
		return false;
	}

}
</script>