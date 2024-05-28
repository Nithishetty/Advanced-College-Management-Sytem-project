<?php
include("header.php");
/*error_reporting(0);*/
if(isset($_GET['delid']))
{
	$sql = "UPDATE course SET status='Deleted' WHERE courseid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Course record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Course form</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Course</th>
						<th>Course description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM course where status <>'Deleted'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[course]</td>
							<td>$rs[coursedescription]</td>
							<td>$rs[status]</td>
							<td><a href='course.php?editid=$rs[courseid]'>Edit</a> | <a href='courseview.php?delid=$rs[courseid]' onclick='return deleteconfirmation()'>Delete</a></td>
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