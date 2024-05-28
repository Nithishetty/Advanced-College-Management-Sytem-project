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
	  	$sql = "DELETE FROM exam WHERE courseid='$_POST[courseid]' AND semester='$_POST[semesterid]'";
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
				<form action="" method="post">
				
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
<?php
$sqlexam = "SELECT * FROM exam WHERE  courseid='$_GET[courseid]' AND semester='$_GET[semesterid]' AND examtype='$_GET[examtype]'";
$qsqlexam =mysqli_query($con,$sqlexam);
$examstatus =mysqli_num_rows($qsqlexam);
if($examstatus ==0)
{
	echo "<table  id='example' class='table table-striped table-bordered' cellspacing='0' width='100%'>
				<thead>
					<tr>
					    <th><center>Exam not scheduled yet..</center></th>						
					</tr>
				</thead>
			</table>";
}
else
{
?>
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
		echo mysqli_error($con);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlexam1 = "SELECT * FROM exam WHERE subjectid='$rs[subjectid]'  AND courseid='$_GET[courseid]' AND semester='$_GET[semesterid]' AND examtype='$_GET[examtype]'";
			$qsqlexam1 =mysqli_query($con,$sqlexam1);
			echo mysqli_error($con);
			$rsexam = mysqli_fetch_array($qsqlexam1);
			$examdt = date("d-m-Y",strtotime($rsexam['examdttim']));
			$examtim = date("H:i A",strtotime($rsexam['examdttim']));
			$note = $rsexam['note'];
			$exid = $rsexam[0];
			echo "<tr>
					<td>$rs[subject] <input type='hidden' name='subjectid[]' value='$rs[subjectid]'></td>
					<td>" . $examdt . " </td>
					<td>" .  $examtim . " </td>
				</tr>";
		}
			?>
</table>
<?php
}
?>	
				</div>
<?php					
if($examstatus !=0)
{
?>
				<div class="gaps">
						<b>Notification:</b><br>
					<?php echo $note; ?>
					</div>
<hr>
	<?php
	if( isset($_SESSION["facultyid"]))
	{
	?>
	<center><a href='examresult.php?courseid=<?php echo $_GET['courseid']; ?>&semesterid=<?php echo $_GET['semesterid']; ?>&examtype=<?php echo $_GET['examtype']; ?>&examid=<?php echo $exid; ?>'><input type="button" value="Publish Exam Result" class="form-control" style="width:300px;"></a></center>
	<?php
	}
	?>
<?php
}
?>					
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
	window.location='examview.php?courseid='+ courseid +'&semesterid='+semesterid;
}
function loadexamtype(courseid,semesterid,examtype)
{
	window.location='examview.php?courseid='+ courseid +'&semesterid='+semesterid+'&examtype='+examtype;
}
</scripT>