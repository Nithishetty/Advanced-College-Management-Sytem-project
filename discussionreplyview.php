<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "UPDATE discussion_reply SET status='Deleted' WHERE discussion_replyid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Discussion reply record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Discussion reply form</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>Discussion</th>
						<th>Student</th>
						<th>Faculty</th>
						<th>Discussion Reply</th>
						<th>Date/Time</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM discussion_reply LEFT JOIN discussion ON discussion_reply.discussionid = discussion.discussionid  LEFT JOIN student ON discussion.studentid = student.studentid LEFT JOIN faculty ON student.facultyid = faculty.facultyid where discussion_reply.status <>'Deleted'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[discussiontitle]</td>
							<td>$rs[studentname](Roll No. $rs[rollno])</td>
							<td>$rs[facultyname](Faculty code. $rs[facultycode])</td>
							<td>$rs[discussionreply]</td>
							<td>$rs[datetime]</td>
							<td>$rs[status]</td>
							<td><a href='discussionreply.php? editid=$rs[discussion_replyid]'>Edit</a> | <a href='discussionreplyview.php?delid=$rs[discussion_replyid]' onclick='return deleteconfirmation()'>Delete</a></td>
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