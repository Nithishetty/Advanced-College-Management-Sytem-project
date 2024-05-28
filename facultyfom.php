<?php
include("header.php");
$img="images/noimage.png";
if(isset($_POST['submit']))
{
	$filename = rand() . $_FILES['img']['name'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"imgfaculty/".$filename);
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE faculty SET facultyname='$_POST[facultyfname] $_POST[facultylname]',facultycode='$_POST[facultycode]'";
		if($_FILES['img']['name'] != "")
		{
		$sql = $sql. ", img='$filename' " ;
		}
		$sql = $sql . " ,password='$_POST[password]',emailid='$_POST[emailid]',contactno='$_POST[contactno]',status='$_POST[status]'WHERE facultyid='$_GET[editid]'" ;
	    $qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Faculty record updated successfully..');</script>";
		}
	}
	else
	{
		$sqlfaculty = "SELECT * FROM faculty WHERE facultycode='$_POST[facultycode]'";
		$qsqlfaculty = mysqli_query($con,$sqlfaculty);
		if(mysqli_num_rows($qsqlfaculty) >= 1)
		{
			echo "<script>alert('Faculty record already exists...');</script>";
		}
		else
		{
			$sql = "INSERT INTO faculty(facultyname,facultycode,gender,password,emailid,contactno,img,status) VALUES('$_POST[facultyfname] $_POST[facultylname]','$_POST[facultycode]','$_POST[gender]','$_POST[password]','$_POST[emailid]','$_POST[contactno]','$filename','$_POST[status]')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<SCRIPT>alert('Faculty record inserted successfully..');</script>";
			}
		}
	}
}
if(isset($_GET['editid']))	
{
	$sqledit = "SELECT * FROM faculty WHERE facultyid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	$img = "imgfaculty/".$rsedit['img']; 
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-7 book-appointment">
				<h3>Faculty form</h3>
				<form action="" method="post" enctype='multipart/form-data' name="frm" onsubmit="return validateform()">
					<div class="gaps col-md-6">
						<p>First Name</p>
						<input type="text" name="facultyfname" value="<?php echo $rsedit['facultyname']; ?>" placeholder="Enter faculty name" autocomplete="off"/>
					</div>
					<div class="gaps col-md-6">
						<p>Last name</p>
						<input type="text" name="facultylname" value="<?php echo $rsedit['facultyname']; ?>" placeholder="Enter faculty name"autocomplete="off" />
					</div>
					<div class="gaps col-md-12">
						<p>Faculty code</p>
						<input type="text" name="facultycode" value="<?php echo $rsedit['facultycode'];?>" placeholder="Enter faculty code" autocomplete="off"/>
					</div>
					<div class="gaps col-md-12">
						<p>Gender</p>
						<input type="radio" checked name="gender" value="Male"
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
					
					<div class="gaps col-md-12">
					<p>Password</p>
						<input type="password" name="password" value="<?php echo $rsedit['password'];?>" placeholder="Enter password" />
					</div>
					<div class="gaps col-md-12">
					<p>Confirm Password</p>
						<input type="password" name="cpassword" value="<?php echo $rsedit['password'];?>" placeholder="Re-enter password" />
					</div>
					<div class="gaps col-md-12">
						<p>Email id</p>
						<input type="mail" name="emailid" value="<?php echo $rsedit['emailid'];?>" placeholder="Enter email id" autocomplete="off"/>
						
					
					</div>
					<div class="gaps col-md-12">
						<p>Contact no</p>
						<input type="text" name="contactno" placeholder="Enter contact no" value="<?php echo $rsedit['contactno']; ?>" autocomplete="off" />
					</div>
					<div class="gaps col-md-12">
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
					<div class="gaps col-md-12">
					<input type="submit" name="submit" value="Submit">
					</div>
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
		var alphaspaceExp = /^[a-zA-Z\s]+$/;
		var alphaExp = /^[a-zA-Z]+$/;
		var alphaNumericExp = /^[0-9a-zA-Z]+$/;
		var numericExpression = /^[0-9]+$/;
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		
		if(document.frm.facultyfname.value == "")
		{
			alert("Faculty first name should not be empty..");
			return false;
		}
		if(!document.frm.facultyfname.value.match(alphaspaceExp))
		{
			alert("Faculty first name should contain only characters..");
			return false;			
		}
		if(document.frm.facultylname.value == "")
		{
			alert("Faculty last name should not be empty..");
			return false;
		}
		 
		 if(!document.frm.facultyfname.value.match(alphaspaceExp))
		{
			alert("Faculty last name should contain only characters..");
			return false;			
		}
		 if(!document.frm.facultylname.value.match(alphaspaceExp))
		{
			alert("Faculty last name should contain only characters..");
			return false;			
		}
		 if(document.frm.facultycode.value=="")
		{
			alert("Kindly enter valid faculty code..");
			return false;			
		}
		else if(!document.frm.facultycode.value.match(alphaNumericExp))
		{
			alert("Kindly enter valid faculty code..");
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