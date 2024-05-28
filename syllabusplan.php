<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "DELETE FROM discussion WHERE status='SPlan' AND datetime='$_POST[monthid]:01 00:00:00' AND studentid='$_POST[courseid]' AND notesid='$_POST[semesterid]' AND subjectid='$_POST[subjectid]'";
	$qsql = mysqli_query($con,$sql);	
	
	$sql = "INSERT INTO discussion(studentid,notesid,subjectid,discussiontitle, discussionmsg,datetime,status) VALUES('$_POST[courseid]','$_POST[semesterid]','$_POST[subjectid]','$_POST[syllabusstatus]','$_POST[syllabusplan]','$_POST[monthid]:01 00:00:00','SPlan')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Syllabus Plan added successfully..');</script>";
	}
}
$sqldiscussion = "SELECT * FROM discussion WHERE status='SPlan' AND datetime='$_GET[monthid]:01 00:00:00' AND studentid='$_GET[courseid]' AND notesid='$_GET[semesterid]' AND subjectid='$_GET[subjectid]'";
$qsqldiscussion = mysqli_query($con,$sqldiscussion);
$rsdiscussion = mysqli_fetch_array($qsqldiscussion);
?>
<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Syllabus plan</h3>
				<form action="" method="post" name="frm1" onsubmit="return validateform()" >
				
<div class="col-md-3 gaps">
			<p>Course</p>
			<select name="courseid" onchange="window.location='syllabusplan.php?courseid='+this.value">
			<option value=''>Select</option>
			<?php
			$sqlcourse = "SELECT * FROM course WHERE status='Active'";
			$qsqlcourse = mysqli_query($con,$sqlcourse);
			while($rscourse = mysqli_fetch_array($qsqlcourse))
			{
				if($rscourse['courseid'] == $_GET['courseid'])
				{
				echo "<option value='$rscourse[courseid]' selected>$rscourse[course]</option>";
				}
				else
				{
				echo "<option value='$rscourse[courseid]'>$rscourse[course]</option>";
				}
			}
			?>
		   </select>
</div>

<div class="col-md-3 gaps">
		<p>Semester</p>
		<select name="semesterid" id="semesterid" onchange="window.location='syllabusplan.php?courseid='+courseid.value+'&semesterid='+semesterid.value">
			<option value=''>Select</option>
			<?php
			$arr = array("1","2","3","4","5","6","7","8");
			foreach($arr as $val)
			{
				if($val == $_GET['semesterid'])
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
				


<div class="col-md-3 gaps">
		<p>Subject</p>
		<select name="subjectid" id="subjectid"  onchange="window.location='syllabusplan.php?courseid='+courseid.value+'&semesterid='+semesterid.value+'&subjectid='+subjectid.value">
		<option value=''>Select subject</option>
		<?php
		$sqlsubject="SELECT * From subject WHERE status='Active' AND semesterid='$_GET[semesterid]' and courseid='$_GET[courseid]'";
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
<div class="col-md-3 gaps">
	<p>Month</p>
	<input type="month" name="monthid" id="monthid"   onchange="window.location='syllabusplan.php?courseid='+courseid.value+'&semesterid='+semesterid.value+'&subjectid='+subjectid.value+'&monthid='+monthid.value" value="<?php echo $_GET['monthid']; ?>"> 
</div>

<?php
if(isset($_SESSION["facultyid"]) )
{
?>
<div class="col-md-12 gaps">
	<p>Syllabus plan</p>
	<textarea name="syllabusplan" placeholder="Give the syllabus plan" ><?php echo $rsdiscussion['discussionmsg']; ?></textarea>
</div>

<div class="col-md-12 gaps">
	<p>Syllabus status</p>
	<textarea name="syllabusstatus" placeholder="Give the syllabus plan" ><?php echo $rsdiscussion['discussiontitle']; ?></textarea>
</div>

<input type="submit" name="submit" value="Submit">
<?php
}
?>
					
<hr>
<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
				<tr>
						<th style="width:75%;">
						<center>
	<?php
		$sqledit = "SELECT * FROM subject WHERE subjectid='$_GET[subjectid]'";
		$qsqledit = mysqli_query($con,$sqledit);
		$rsedit = mysqli_fetch_array($qsqledit);
			if($rsedit['syllabus'] != "")
			{
				if(file_exists("syllabusfile/$rsedit[syllabus]"))
				{
echo "<a href='syllabusfile/$rsedit[syllabus]' download><b>Download Syllabus Plan</b></a>";
				}
			}
	?></center>
	
					</th>						
				</tr>
	</thead>
</table>
	
<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th style="width:75%;">Syllabus Plan</th>	
                        <th>Month</th>						
                        <th>Syllabus status</th>						
					</tr>
				</thead>
<?php
$sqldiscussions = "SELECT * FROM discussion WHERE status='SPlan'  AND studentid='$_GET[courseid]' AND notesid='$_GET[semesterid]' AND subjectid='$_GET[subjectid]' AND datetime='$_GET[monthid]=01 00:00:00' ORDER BY datetime ASC";
$qsqldiscussions = mysqli_query($con,$sqldiscussions);
while($rsdiscussions = mysqli_fetch_array($qsqldiscussions))
{
?>				
<tbody>
	<tr>
		<td style="width:75%;"><?php echo $rsdiscussions['discussionmsg']; ?></td>	
		<td><?php echo date("Y M",strtotime($rsdiscussions['datetime'])); ?></td>	
		<td><?php 
		echo $rsdiscussions['discussiontitle']; 
		?></td>						
	</tr>
</tbody>
<?php
}
?>

</table>

</div>	
	</div>
	</form>
	</div>
	
<?php
include("footer.php");
?>	
<script>
function validateform()
	{
        var alphaspaceExp = /^[a-zA-Z\s]+$/;	
    	if(document.frm1.courseid.value == "")
		{
			alert("Kindly select the course..");
			return false;
		}
		else if(document.frm1.semesterid.value == "")
		{
			alert("Kindly select the semester..");
			return false;
		}
		if(document.frm1.subjectid.value == "")
		{
			alert("Kindly select the subject..");
			return false;
		}
		if(document.frm1.monthid.value == "")
		{
			alert("Month should not be empty..");
			return false;
		}
		 if(document.frm1.syllabusplan.value == "")
		{
			alert("Syllabus plan should not be empty..");
			return false;
		}
		if(document.frm1.syllabusstatus.value == "")
		{
			alert("Syllabus status should not be empty..");
			return false;
		}
		else if(document.frm1.status.value == "")
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