<?php
include("header.php");
if(isset($_POST['submit']))
{
	$feedback  = mysqli_real_escape_string($con,$_POST['feedback']);
	$sql = "INSERT INTO feedback(studentid,subjectid,facultyid,feedback,rating ,feedbackdate,status) VALUES('$_SESSION[studentid]','$_POST[subjectid]','$_POST[facultyid]','$feedback','$_POST[rating]','$dt','Active')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Feedback record inserted successfully..');</script>";
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM feedback WHERE feedbackid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Feedback form</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">		
				

	<div class="gaps">
		<p>Feedback type</p>
		<select name="feedbacktype" class="form-conrol" onchange="window.location='feedback.php?feedbacktype='+this.value">
			<option value=''>Select</option>
			<?php
			$arr = array("Subject","Faculty","Others");
			foreach($arr as $val)
			{
				if($val == $_GET['feedbacktype'])
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
	
	<?php
	if($_GET['feedbacktype'] == "Faculty")
	{
	?>
		<div class="gaps">
			<p>Faculty</p>
			<select name="facultyid" id="facultyid">
			<option value=''>Select subject</option>
			<?php 
			$sqlfaculty="SELECT * From faculty WHERE status='Active'";
			$qsqlfaculty = mysqli_query($con,$sqlfaculty);
			while($rsfaculty=mysqli_fetch_array($qsqlfaculty))
			{
				echo "<option value='$rsfaculty[facultyid]'>$rsfaculty[facultyname] ($rsfaculty[facultycode])</option>";
			}
			?>
			</select>
		</div>
	<?php
	}
	?>	

	<?php
	if($_GET['feedbacktype'] == "Subject")
	{
	?>
	
		<div class="gaps">
			<p>Faculty</p>
			<select name="facultyid" id="facultyid">
			<option value=''>Select faculty</option>
			<?php 
			$sqlfaculty="SELECT * From faculty WHERE status='Active'";
			$qsqlfaculty = mysqli_query($con,$sqlfaculty);
			while($rsfaculty=mysqli_fetch_array($qsqlfaculty))
			{
				echo "<option value='$rsfaculty[facultyid]'>$rsfaculty[facultyname] ($rsfaculty[facultycode])</option>";
			}
			?>
			</select>
		</div>
	
		<div class="gaps">
			<p>Subject</p>
			<select name="subjectid" id="subjectid">
			<option value=''>Select subject</option>
			<?php 
			$sqlsubject="SELECT * From subject WHERE status='Active' AND semesterid='$rsstudentprofile[semesterid]' and courseid='$rsstudentprofile[courseid]'";
			$qsqlsubject=mysqli_query($con,$sqlsubject);
			while($rssubject=mysqli_fetch_array($qsqlsubject))
			{
				if($_GET['subjectid'] == $rssubject['subjectid'])
				{
					echo "<option selected value='$rssubject[subjectid]'>$rssubject[subject]</option>";
				}
				else
				{
					echo"<option value='$rssubject[subjectid]'>$rssubject[subject]</option>";
				}
			}
			?>
			</select>
		</div>
	<?php
	}
	?>
				
	
	<div class="gaps">
		<p>Feedback</p>
		<textarea name="feedback" placeholder="Give your feed back"><?php echo $rsedit['feedback'];?></textarea>
	</div>
			
<?php
if($_GET['feedbacktype'] != "Others")
{
?>
	
	<div class="col-md-11">Rating
<input type="range" name="rating" id="points" value="50" min="0" max="100" data-show-value="true" onchange="changerating(this.value)" >
	</div>
	<div class="col-md-1">
<input type="text" name="rating1" id="rating1" readonly value="50%">
	</div>
<?php
}
?>
<br>
<center><div class="gaps" style="width:250px;"><input type="submit" name="submit" value="Post Feedback" ></div></center>
				
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
		if(document.frm.feedback.value == "")
		{
			alert("Feedback should not be empty..");
			return false;
		}
		else
		{
			return true;
		}
	}
	function changerating(rating)
	{
		document.getElementById("rating1").value =  rating + "%";
	}
</script>