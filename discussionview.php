<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "UPDATE discussion SET status='Deleted' WHERE discussionid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Discussion record deleted successfully...');</SCRIPT>";
	}
}

?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Discussion form</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Student</th>
						<th>Notes</th>
						<th>Subject</th>
						<th>Discussion Title</th>
						<th>Discussion msg</th>
						<th>Date/Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM discussion LEFT JOIN student ON discussion.studentid = student.studentid LEFT JOIN notes ON discussion.notesid = notes.notesid LEFT JOIN subject ON notes.subjectid =subject.subjectid where discussion.status ='Active'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[studentname](Roll No. $rs[rollno])</td>
							<td>$rs[notestitle]</td>
							<td>$rs[subject]</td>
							<td>$rs[discussiontitle]</td>
							<td>$rs[discussionmsg]</td>
							<td>$rs[datetime]</td>
							<td> <a href='discussionview.php?delid=$rs[discussionid]' onclick='return deleteconfirmation()'>Delete</a></td>
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