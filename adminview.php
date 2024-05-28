<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "UPDATE admin SET status='Deleted' WHERE adminid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Admin record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Admin form</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Admin Name</th>
						<th>Login ID</th>
						<th>User Type</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM admin where status<>'Deleted'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[adminname]</td>
							<td>$rs[loginid]</td>
							<td>$rs[usertype]</td>
							<td>$rs[status]</td>
							<td><a href='admin.php?editid=$rs[adminid]'>Edit</a>  | <a href='adminview.php?delid=$rs[adminid]' onclick='return deleteconfirmation()'>Delete</a></td></td>
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