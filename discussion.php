<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE  discussion SET studentid='$_POST[studentid]',notesid='$_POST[notesid]',subjectid='$_POST[subjectid]',discussiontitle='$_POST[discussiontitle]',discussionmsg='$_POST[discussionmsg]',datetime='$_POST[datetime]',status='$_POST[status]'WHERE discussionid='$_GET[editid]'";
		
	    $qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Discussion record updated successfully..');</script>";
		}
	}
	else
  {
	$sql = "INSERT INTO discussion(studentid,notesid,subjectid,discussiontitle,discussionmsg,datetime,status) VALUES('$_POST[studentid]','$_POST[notesid]','$_POST[subjectid]','$_POST[discussiontitle]','$_POST[discussionmsg]','$_POST[datetime]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Discussion record inserted successfully..');</script>";
	}
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM discussion WHERE discussionid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Discussion form</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
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
						<p>Notes</p>
						<select name="notesid">
						<option value=''>Select</option>
						<?php
						$sqlsubject="SELECT * FROM notes WHERE status='Active'";
						$qsqlsubject=mysqli_query($con,$sqlsubject);
						while($rssubject=mysqli_fetch_array($qsqlsubject))
						{
							echo"<option value='$rssubject[notesid]'>$rssubject[notestitle]</option>";
						}
						?>
						</select>
					</div>
					<div class="gaps">
						<p>Subject</p>
						<select name="subjectid">
						<option value=''>Select</option>
						<?php
						$sqlsubject="SELECT * From subject WHERE status='Active'";
						$qsqlsubject=mysqli_query($con,$sqlsubject);
						while($rssubject=mysqli_fetch_array($qsqlsubject))
						{
							echo"<option value='$rssubject[subjectid]'>$rssubject[subject]</option>";
						}
						?>
						</select>
					</div>
					<div class="gaps">
						<p>Discussion title</p>
						<input type="text" name="discussiontitle"value="<?php echo $rsedit['discussiontitle'];?>" placeholder="Enter discussion title" />
					</div>
					<div class="gaps">
						<p>Discussion message</p>
						<input type="text" name="discussionmsg"value="<?php echo $rsedit['discussionmsg'];?>" placeholder="Enter discussion msg" />
					</div>
					<div class="gaps">
						<p>Discussion date and time</p>
						<input type="date_time_set" name="datetime"value="<?php echo $rsedit['datetime'];?>" placeholder="Enter the date time" />
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
		if(document.frm.studentid.value == "")
		{
			alert("Kindly select the student..");
			return false;
		}
	    if(document.frm.notesid.value == "")
		{
			alert("Kindly select the notes..");
			return false;
		
		}
		else if(document.frm.subjectid.value == "")
		{
			alert("Kindly select the subject..");
			return false;
		
		}
		 if(document.frm.discussiontitle.value == "")
		{
			alert("Discussion title should not be empty..");
			return false;
		
		}
		
			else if(document.frm.discussionmsg.value == "")
		{
			alert("Discussion message should not be empty..");
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