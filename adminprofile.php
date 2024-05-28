<?php
include("header.php");
if(isset($_POST['submit']))
{
		//Update statement starts here
		$sql = "UPDATE admin SET adminname='$_POST[adminname]',loginid='$_POST[loginid]' WHERE adminid='$_SESSION[adminid]'" ;
	    $qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Admin profile updated successfully..');</script>";
		}
}
	$sqledit = "SELECT * FROM admin WHERE adminid='$_SESSION[adminid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);

?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Admin form</h3>
			<form action="" method="post"name="frm" onsubmit="return validateform()">
					<div class="gaps">
						<p>Employee type</p>
						<input type="text" name="usertype" value="<?php echo $rsedit['usertype'];?>" readonly style="font-size:20px;" disabled   />
					</div>
					<div class="gaps">
						<p>Admin name</p>
						<input type="text" name="adminname" value="<?php echo $rsedit['adminname'];?>"  autocomplete="off" placeholder="Enter Admin name"  />
					</div>
					<div class="gaps">
						<p>Login ID</p>
						<input type="text" name="loginid" value="<?php echo $rsedit['loginid'];?>" placeholder="Enter Login ID" />
					</div>
					<input type="submit" name="submit" value="Update profile">
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
		if(document.frm.adminname.value == "")
		{
			alert("Admin name should not be empty..");
			return false;
		}
	if(document.frm.loginid.value == "")
		{
			alert("Login ID should not be empty..");
			return false;
		
		}
	
	}
	</script>