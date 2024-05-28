<?php
include("header.php");
/*error_reporting(0);*/
if(isset($_GET['delid']))
{
	$sql = "UPDATE subject SET status='Deleted' WHERE subjectid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Subject record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Subject form</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Subject</th>
						<th>Course</th>
						<th>Semester</th>
						<th>Subject Description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM subject LEFT JOIN course ON subject.courseid = course.courseid where subject.status <>'Deleted'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[subject]</td>
							<td>$rs[course]</td>
							<td>$rs[semesterid]</td>
							<td>$rs[subjectdescription]</td>
							<td>$rs[status]</td>
							<td><a href='subject.php?editid=$rs[subjectid]'>Edit</a> | <a href='subjectview.php?delid=$rs[subjectid]' onclick='return deleteconfirmation()'>Delete</a></td>
						</tr>";
					}
					?>
				</tbody>
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