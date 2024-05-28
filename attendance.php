<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE attendance SET attendancetype='$_POST[attendancetype]',studentid='$_POST[studentid]',attendancedate='$_POST[attendancedate]',remark='$_POST[remark]',status='$_POST[status]'WHERE attendanceid='$_GET[editid]'" ;
	    $qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Attendance Report submitted successfully..');</script>";
		}
	}
	else
	{
		$studentid = $_POST['studentid'];
		$attendancestatus = $_POST['attendancestatus'];
		$remark = $_POST['remark'];
		
		$sql= "DELETE FROM attendance WHERE subjectid='$_POST[subjectid]' and attendancedate='$_POST[attendancedate]' ";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		
		for($i=0;$i<count($_POST['studentid']);$i++)
		{
			$sql = "INSERT INTO attendance(attendancetype,studentid,subjectid,attendancedate,remark,status) VALUES('$attendancestatus[$i]','$studentid[$i]','$_POST[subjectid]','$_POST[attendancedate]','$remark[$i]','Active')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		}
		echo "<SCRIPT>alert('Attendance Report submitted successfully..');</script>";
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM attendance WHERE attendanceid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	echo mysqli_error($con);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
		
		
<div class="col-md-12 book-appointment" >			
<h3>Attendance form</h3>				
<form action="" method="post" name="frm" onsubmit="return validateform()">



<div class="col-md-3 gaps">
<p>Course</p>
			<select name="courseid" onchange="window.location='attendance.php?courseid='+this.value">
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
	<select name="semesterid" id="semesterid" onchange="window.location='attendance.php?courseid='+courseid.value+'&semesterid='+semesterid.value">
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
		<select name="subjectid" id="subjectid"  onchange="window.location='attendance.php?courseid='+courseid.value+'&semesterid='+semesterid.value+'&subjectid='+subjectid.value">
		<option value=''>Select subject</option>
		<?php
		$sqlsubject="SELECT * From subject WHERE status='Active' AND semesterid='$_GET[semesterid]'";
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
	<p>Attendance date</p>
	<input type="date" name="attendancedate" value="<?php 
	if(isset($_GET['attendancedate']))
	{
		echo $_GET['attendancedate'];
	}
	else
	{
		echo date("Y-m-d"); 
	}
	?>"    onchange="window.location='attendance.php?courseid='+courseid.value+'&semesterid='+semesterid.value+'&subjectid='+subjectid.value+'&attendancedate='+attendancedate.value"/>
</div>
<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>Student Rollno</th>
						<th>Student name</th>
						<th>Attendance Status</th>
						<th>Remark</th>
					</tr>
				</thead>
<tbody>
<?php
$i=0;
					$sql = "SELECT * FROM student  where student.status <>'Deleted' AND courseid='$_GET[courseid]' AND semesterid ='$_GET[semesterid]'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						$sqlattendance = "SELECT * FROM attendance WHERE studentid ='$rs[studentid]' AND subjectid ='$_GET[subjectid]' AND attendancedate ='$_GET[attendancedate]' AND status='Active'";
						$qsqlattendance = mysqli_query($con,$sqlattendance);
						$rsattendance = mysqli_fetch_array($qsqlattendance);
						
						echo "<tr><td>$rs[rollno]</td><td>$rs[studentname]</td><td>";
						?>
<input type='hidden' name='studentid[<?php echo $i; ?>]' value="<?php echo $rs['studentid']; ?>">


<input type='radio' name="attendancestatus[<?php echo $i; ?>]" value='Present'
	<?php 
		 if(mysqli_num_rows($qsqlattendance) == 0)
		 {
			 echo " checked ";
		 }
		 else
		 {
			 if($rsattendance['attendancetype'] == "Present" )
			 {
				echo " checked ";
			 }
		 }
	?> > Present
 | 
<input type='radio' name="attendancestatus[<?php echo $i; ?>]" value='Absent' <?php 
		 if($rsattendance['attendancetype'] == "Absent" )
		 {	 
			echo " checked ";
		 }
	?> > Absent
					<?php			
						echo "</td>
						<td>
						<input type='text' name='remark[$i]' ` value='$rsattendance[remark]'>
						</td>
						</tr>";
$i++;
					}
					?>
					
				</table>					

					<center><input type="submit" name="submit" value="Submit" style="width:250px;"></center>
				</form>
			</div>
			
		</div>
	</div>
	<!-- //register -->

	<!-- //register -->
	<?php
include("footer.php")
?>
<script>
function validateform()
{
	if(document.frm.courseid.value == "")
	{
		alert("Kindly select the course..");
		return false;
	}
	if(document.frm.semesterid.value == "")
	{
		alert("Kindly select the semester..");
		return false;

	}
	else if(document.frm.subjectid.value == "")
	{
		alert("Kindly select the subject..");
		return false;

	}
	else if(document.frm.attendancedate.value == "")
	{
		alert("Kindly select the attendance date..");
		return false;

	}
}
</script>`