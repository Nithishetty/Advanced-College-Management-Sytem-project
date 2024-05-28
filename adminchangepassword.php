<?php
include("header.php");
if(isset($_POST['submit']))
{
	 $sql = "UPDATE admin set password='$_POST[npassword]' WHERE password='$_POST[opassword]' AND adminid='$_SESSION[adminid]' ";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)	
		{
			echo "<script>alert('Password changed successfully..');</script>";
		}
		else
		{
			echo "<script>alert('Failed to update password..');</script>";
		}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Change Password</h3>
				<form action="" method="post"name="frm" onsubmit="return validateform()">
				
					<div class="gaps">
					<p>Old Password</p>
						<input type="password" name="opassword" placeholder="Old password" />
					</div>
						
					<div class="gaps">
					<p>New Password</p>
						<input type="password" name="npassword"  placeholder="New password" />
					</div>	
					<div class="gaps">
					<p>Confirm Password</p>
						<input type="password" name="cpassword"  placeholder="Confirm password" />
					</div>
					<input type="submit" name="submit" value="Change Password">
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
		if(document.frm.opassword.value == "")
		{
			alert(" Old Password should not be empty..");
			return false;
		}
		else if(document.frm.opassword.value.length < 6)
		{
			alert("Old Password should contain more than 6 characters..");
			return false;
		}
		 else if(document.frm.npassword.value == "")
		{
			alert("New Password should not be empty..");
			return false;
		}
		else if(document.frm.npassword.value.length < 6)
		{
			alert("New Password should contain more than 6 characters..");
			return false;
		}
		else if (document.frm.npassword.value != document.frm.cpassword.value)
		{
			alert("New Password and confirmation password not matching....");
			return false;			
		}
		
		
		
	}
	</script>