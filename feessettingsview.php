<?php
include("header.php");
/*error_reporting(0);*/
if(isset($_GET['delid']))
{
	$sql = "UPDATE fees_setting SET fees_status='Deleted' WHERE fees_setting_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Fees Setting record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>View Fees Settings</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Course</th>
						<th>Semester</th>
						<th>Fees Type</th>
						<th>Fees Amount</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM fees_setting left join course ON fees_setting.courseid=course.courseid where fees_setting.fees_status <>'Deleted'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[course]</td>
							<td>$rs[semesterid]</td>
							<td>$rs[fees_type]</td>
							<td>$rs[fees_amt]</td>
							<td>$rs[fees_status]</td>
							<td><a href='feessettings.php?editid=$rs[fees_setting_id]' class='btn btn-info'>Edit</a> | <a href='feessettingsview.php?delid=$rs[fees_setting_id]' onclick='return deleteconfirmation()' class='btn btn-danger'>Delete</a></td>
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