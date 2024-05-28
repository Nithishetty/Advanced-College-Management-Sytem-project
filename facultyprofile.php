<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand() . $_FILES['img']['name'];
	move_uploaded_file($_FILES['img']['tmp_name'],"imgfaculty/".$filename);
	
	//Update statement starts here
		$sql = "UPDATE faculty SET facultyname='$_POST[facultyname]',facultycode='$_POST[facultycode]',emailid='$_POST[emailid]'";
		if($_FILES['img']['name'] != "")
		{
		$sql = $sql. ", img='$filename' " ;
		}
		$sql = $sql . " WHERE facultyid='$_SESSION[facultyid]'" ;
	    $qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Faculty record updated successfully..');</script>";
		}
	}
	
$sqledit = "SELECT * FROM faculty WHERE facultyid='$_SESSION[facultyid]'";
$qsqledit = mysqli_query($con,$sqledit);
$rsedit = mysqli_fetch_array($qsqledit);
$img = "imgfaculty/".$rsedit['img']; 

?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-7 book-appointment">
				<h3>Faculty Profile</h3>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="gaps">
						<p>Faculty Name</p>
						<input type="text" name="facultyname" value="<?php echo $rsedit['facultyname'];?>" placeholder="Enter faculty name" />
					</div>
					<div class="gaps">
						<p>Faculty code</p>
						<input type="text" name="facultycode" value="<?php echo $rsedit['facultycode'];?>" placeholder="Enter faculty code" />
					</div>
					<div class="gaps">
						<p>Email id</p>
						<input type="mail" name="emailid" value="<?php echo $rsedit['emailid'];?>" placeholder="Enter email id" />
					</div>
					 
					<input type="submit" name="submit" value="Update Profile">
			</div>
			<div class="col-md-1 book-appointment">
			</div>
			<div class="col-md-4 book-appointment">
					<h3> &nbsp; </h3>
				    <div class="gaps">
						<p>Faculty Photo</p>
<input type="file" name="img" onchange="previewFile()"/>
<img id="img" src="<?php echo $img; ?>" style="width:150px;height: 200px;"  >
						
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