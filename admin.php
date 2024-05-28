<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE admin SET adminname='$_POST[adminname]',loginid='$_POST[loginid]',password='$_POST[password]',usertype='$_POST[usertype]',status='$_POST[status]'WHERE adminid='$_GET[editid]'" ;
	    $qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Admin record updated successfully..');</script>";
		}
	}
	else
	{
     $sql = "INSERT INTO admin(adminname,loginid,password,usertype,status) VALUES('$_POST[adminname]','$_POST[loginid]','$_POST[password]','$_POST[usertype]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Admin record inserted successfully..');</script>";
	}
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM admin WHERE adminid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Admin form</h3>
				<form action="" method="post"  name="frm" onsubmit="return validateform()">
					<div class="gaps">
						<p>Admin name</p>
						<input type="text" name="adminname" value="<?php echo $rsedit['adminname'];?>"autocomplete="off" placeholder="Enter Admin name" autocomplete="off" />
					</div>
					<div class="gaps">
						<p>Login ID</p>
						<input type="text" name="loginid" value="<?php echo $rsedit['loginid'];?>" placeholder="Enter Login ID" autocomplete="off"/>
					</div>
					<div class="gaps">
						<p>Password</p>
						<input type="password" name="password" value="<?php echo $rsedit['password'];?>" placeholder="Enter Password" id="password1"  />
					</div>
					<div class="gaps">
						<p>Confirm Password</p>
						<input type="password" name="cpassword" placeholder="Enter Confirm password" id="password1" />
					</div>
					<div class="gaps">
						<p>User type</p>
						<select name="usertype">
						<option value=''>Select</option>
						<option value='Employee'>Employee</option>
						<option value='Admin'>Admin</option>
						</select>
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


	<?php
include("footer.php")
?>
<script>
function validateform()
{
		var alphaspaceExp = /^[a-zA-Z\s]+$/;
		var alphaNumericExp = /^[0-9a-zA-Z]+$/;
		if(document.frm.adminname.value == "")
		{
			alert("Admin name should not be empty..");
			return false;
		}
		if(!document.frm.adminname.value.match(alphaspaceExp))
		{
			alert("Admin name should contain only characters..");
			return false;			
		}
		if(document.frm.loginid.value == "")
		{
			alert("Admin login id should not be empty..");
			return false;
		}
	    else if(!document.frm.loginid.value.match(alphaNumericExp))
		{
			alert("Kindly enter login..");
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
		else if(document.frm.usertype.value == "")
		{
			alert("Kindly select the user type..");
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