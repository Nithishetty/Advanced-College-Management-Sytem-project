<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
	echo"<script>window.location='adminlogin.php';</script>";
}
/*error_reporting(0);*/
if(isset($_GET['delid']))
{
	$sql = "UPDATE faculty SET status='Deleted' WHERE facultyid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Faculty record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Faculty form</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Image</th>
						<th>Faculty name</th>
						<th>Faculty code</th>
						<th>Email ID</th>
						<th>Gender</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM faculty where status <>'Deleted'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td><img src='imgfaculty/$rs[img]' style='width:150px;'></td>
							<td>$rs[facultyname]</td>
							<td>$rs[facultycode]</td>
							<td>$rs[emailid]</td>
							<td>$rs[gender]</td>
							<td>$rs[status]</td>
							<td><a href='facultyfom.php?editid=$rs[facultyid]'>Edit</a> | <a href='viewfaculty.php?delid=$rs[facultyid]' onclick='return deleteconfirmation()'>Delete</a></td>
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