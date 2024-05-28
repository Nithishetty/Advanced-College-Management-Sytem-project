<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql ="UPDATE discussion_reply SET discussion_id='$_POST[discussion_id]' ,studentid='$_POST[studentid]',facultyid='$_POST[facultyid]',discussionreply='$_POST[discussionreply]',datetime='$_POST[datetime]',status='$_POST[status]'WHERE discussion_replyid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Discussion reply record updated successfully..');</script>";
		}
	}
	else
  {

	$sql = "INSERT INTO discussion_reply(discussion_id ,studentid,facultyid,discussionreply,datetime,status) VALUES('$_POST[discussion_id]','$_POST[studentid]','$_POST[facultyid]','$_POST[discussionreply]','$_POST[datetime]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Discussion reply record inserted successfully..');</script>";
	}
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM discussion_reply WHERE discussion_replyid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	echo mysqli_error($con);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Discussion reply form</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
					<div class="gaps">
						<p>Discussion id</p>
						<select name="discussionid">
						<option value=''>Select</option>
						<?php
						$sqlsubject="SELECT * From discussion WHERE status='Active'";
						$qsqlsubject=mysqli_query($con,$sqlsubject);
						while($rssubject=mysqli_fetch_array($qsqlsubject))
						{
							echo"<option value='$rssubject[discussionid]'>$rssubject[discussiontitle]</option>";
						}
						?>
						</select>
						</div>
						
					<div class="gaps">
						<p>Student</p>
						<select name="studentid">
						<option value=''>Select</option>
						<?php
						$sqlsubject="SELECT * From student WHERE status='Active'";
						$qsqlsubject=mysqli_query($con,$sqlsubject);
						while($rssubject=mysqli_fetch_array($qsqlsubject))
						{
							echo"<option value='$rssubject[studentid]'>$rssubject[studentname]</option>";
						}
						?>
						</select>
						</div>
					
					<div class="gaps">
						<p>Faculty</p>
						<select name="facultyid">
						<option value=''>Select</option>
						<?php
						$sqlsubject="SELECT * From faculty WHERE status='Active'";
						$qsqlsubject=mysqli_query($con,$sqlsubject);
						while($rssubject=mysqli_fetch_array($qsqlsubject))
						{
							echo"<option value='$rssubject[facultyid]'>$rssubject[facultyname]</option>";
						}
						?>
						</select>
						
					</div>
					<div class="gaps">
						<p>Discussion reply</p>
						<textarea name="discussionreply"><?php echo $rsedit['discussionreply'];?> </textarea>
					</div>
					
					<div class="gaps">
						<p>Discussion reply date and time</p>
						<input type="date_time_set" name="datetime" value="<?php echo $rsedit['datetime'];?>" placeholder="Enter the date time" />
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
		if(document.frm.discussionid.value == "")
		{
			alert("Kindly select the discussion id..");
			return false;
		
		}
		if(document.frm.studentid.value == "")
		{
			alert("Kindly select the student..");
			return false;
		}
	    
		else if(document.frm.facultyid.value == "")
		{
			alert("Kindly select the faculty..");
			return false;
		
		}
		 if(document.frm.discussionreply.value == "")
		{
			alert("Discussion reply should not be empty..");
			return false;
		
		}
		
		else if(document.frm.datetime.value == "")
		{
			alert("Date time should not be empty..");
			return false;
		
		}
		else if(document.frm.status.value == "")
		{
			alert("Kindly select the status..");
			return false;
		
		}
	
	}
	</script>