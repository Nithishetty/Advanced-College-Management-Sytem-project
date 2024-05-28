<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE exam SET courseid='$_POST[courseid]',semesterid='$_POST[semesterid]',exammonth='$_POST[exammonth]',examtype='$_POST[examtype]',status='$_POST[status]'WHERE examid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Exam record updated successfully..');</script>";
		}
	}
	else
	{
	  $subjectid  = $_POST['subjectid'];
	  $examdate  =$_POST['examdate'];
	  $examtime =$_POST['examtime'];
	  $sql = "DELETE FROM exam WHERE courseid='$_POST[courseid]' AND semester='$_POST[semesterid]' AND examtype='$_POST[examtype]'";
	  $qsql = mysqli_query($con,$sql);
		for($c=0;$c<count($subjectid); $c++)
		{
		$sql = "INSERT INTO exam(courseid,semester,subjectid ,examdttim,examtype,note,status) VALUES('$_POST[courseid]','$_POST[semesterid]','$subjectid[$c]','$examdate[$c] $examtime[$c]','$_POST[examtype]','$_POST[note]','Active')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		}
		echo "<SCRIPT>alert('Exam record inserted successfully..');</script>";
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM exam WHERE examid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Exam form</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
				
	<div class="gaps col-md-4">
						<p>Course</p>
			<select name="courseid" id='courseid' onchange="loadsubject(courseid.value,semesterid.value)">
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

	<div class="gaps col-md-4">
			<p>Semester</p>
			<select name="semesterid" id="semesterid"  onchange="loadsubject(courseid.value,this.value)" >
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
	
	<div class="gaps col-md-4">
		<p>Exam type</p>
			<select name="examtype" id="examtype"   onchange="loadexamtype(courseid.value,semesterid.value,examtype.value)">
			<option value=''>Select</option>
			<?php
			$arr = array("First Internal","Second Internal","Third Internal","Semester");
			foreach($arr as $val)
			{
				if($val == $_GET['examtype'])
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
					

				<div class="gaps">
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>Subject</th>
						<th>Date</th>
						<th>Time</th>						
					</tr>
				</thead>
<tbody>
	<?php
					$sql = "SELECT * FROM subject where subject.status <>'Deleted' AND courseid='$_GET[courseid]' AND semesterid='$_GET[semesterid]'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						$sqlexam = "SELECT * FROM exam WHERE subjectid='$rs[subjectid]'  AND courseid='$_GET[courseid]' AND semester='$_GET[semesterid]' AND examtype='$_GET[examtype]'";
						$qsqlexam =mysqli_query($con,$sqlexam);
						$rsexam = mysqli_fetch_array($qsqlexam);
						if($rsexam['examdttim'] != "")
						{
							$examdt = date("Y-m-d",strtotime($rsexam['examdttim']));
						}
						else
						{
							$examdt = date("Y-m-d");
						}
						if($rsexam['examdttim'] != "")
						{
							$examtim = date("H:i:s",strtotime($rsexam['examdttim']));
						}
						else
						{
							$examtim = date("Y-m-d");
						}
						$note = $rsexam['note'];
						echo "<tr>
								<td>$rs[subject] <input type='hidden' name='subjectid[]' value='$rs[subjectid]'></td>
								<td><input type='date' required name='examdate[]' value='$examdt' style='width:300px;'></td>
								<td><input type='time' required name='examtime[]' value='$examtim'></td>
							</tr>";
					}
					?>
</table>
				
				</div>
					
				<div class="gaps">
						<p>Any note</p>
					<textarea name="note"><?php echo $note; ?></textarea>
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
function loadsubject(courseid,semesterid)
{
	window.location='exam.php?courseid='+ courseid +'&semesterid='+semesterid;
}
function loadexamtype(courseid,semesterid,examtype)
{
	window.location='exam.php?courseid='+ courseid +'&semesterid='+semesterid+'&examtype='+examtype;
}
</script>
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
	if(document.frm.examtype.value == "")
	{
		alert("Kindly select the exam type..");
		return false;
	}
}
</script>