<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "UPDATE exam_result SET status='Deleted' WHERE exam_resultid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Exam reply record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>View Exam Result</h3>
				
	<?php
	/*
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
	<?php echo $rsstudentprofile['courseid']; ?>
	courseid semesterid examtype
	*/
	?>
<form method="get" action="">	
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
			<select name="examtype" id="examtype" >
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
	
	<div class="gaps col-md-4">
		<br>
		<input type="submit" name="submit" value="Select" >
	</div>
</form>

<table class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Subject</th>	 
			<?php
			if($_GET['examtype'] == "Semester")
			{
			?>
			<th>Internal marks</th>
			<th>External marks</th>
			<?php
			}
			?>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$scoredmark =0;
	$sql = "SELECT * FROM exam_result LEFT JOIN exam ON exam_result.examid=exam.examid LEFT JOIN subject ON subject.subjectid=exam_result.subjectid where exam_result.status <>'Deleted' AND exam_result.studentid='$_SESSION[studentid]' AND exam.courseid='$rsstudentprofile[courseid]' AND examtype='$_GET[examtype]'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
	?>
		<tr>
			<td><?php echo $rs['subject']; ?></td>
			<?php
			if($_GET['examtype'] == "Semester")
			{
			?>			
			<td><?php echo $rs['scoredinternalmark']; ?></td>
			<td><?php echo $rs['scoredextmark']; ?></td>
			<?php
			}
			?>
			<td><?php echo $rs['scoredinternalmark'] +$rs['scoredextmark']; ?></td>
			<?php $maxtotmark = $maxtotmark + ($rs['maxinternalmark'] +$rs['maxextmark']); ?>
		</tr>
	<?php
		
		$scoredmark = $scoredmark + ($rs['scoredinternalmark'] +$rs['scoredextmark']);
	}
	?>
	</tbody> 
	<tfoot>
		<tr>
					<?php
			if($_GET['examtype'] == "Semester")
			{
			?>	
			<th></th>	 
			<th> </th>
			<?php
			}
			?>
			<th> Total Marks</th>
			<th> <?php echo $scoredmark; ?></th>
		</tr>
		<tr>
			<?php
			if($_GET['examtype'] == "Semester")
			{
			?>	
			<th></th>	 
			<th> </th>
			<?php
			}
			?>
			<th> Percentage</th>
			<th> <?php  $percentage = (100 * $scoredmark)/$maxtotmark; 
		echo	sprintf('%0.2f', $percentage);
			?>%</th>
		</tr>
		<tr>
			<?php
			if($_GET['examtype'] == "Semester")
			{
			?>	
			<th></th>	 
			<th> </th>
			<?php
			}
			?>
			<th> Grade</th>
			<th>  <?php 
			if($percentage >75)
			{
			echo "Distinction"; 
			}
			else if($percentage > 60)
			{
			echo "First class"; 
			}
			else if($percentage >= 35)
			{
			echo "Second class"; 
			}
			else
			{
				echo "Failed";
			}
			?></th>
		</tr>
	</tfoot>	
</table>

			</div>
			
		</div>
	</div>
	<!-- //register -->
<script>
function deleteconfirmation()
{
	if(confirm("Are you sure want to delete this record??") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<?php
include("datatable.php");
include("footer.php")
?>