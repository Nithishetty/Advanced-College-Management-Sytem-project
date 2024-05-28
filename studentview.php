<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "UPDATE student SET status='Deleted' WHERE studentid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Student record deleted successfully...');</SCRIPT>";
	}
}

if(isset($_GET['status']))
{
	$sql = "UPDATE student SET status='$_GET[status]' WHERE studentid='$_GET[studentid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		if($_GET['status'] == "Inactive")
		{
			echo "<SCRIPT>alert('Student record deactivated successfully...');</SCRIPT>";
		}
		
		if($_GET['status'] == "Active")
		{
			echo "<SCRIPT>alert('Student record activated successfully...');</SCRIPT>";
		}
			
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>View Student Accounts</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Image</th>
						<th>Student&nbsp;name</th>
						<th>Course</th>
						<th>Semester</th>
						<th>Gender</th>
						<th>Roll&nbsp;No.</th>
						<th>Email id</th>
						<th>Address</th>
						<th>Contact no</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM student LEFT JOIN course ON student.courseid=course.courseid where ";
					if(isset($_GET['st']))
					{
						$sql .=  "  student.status='Pending' AND student.status!='TC issued'";
					}
					else
					{
						$sql .= " student.status<>'Deleted' AND student.status!='TC issued'";
					}
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						if(file_exists("imgstudent/$rs[img]"))
						{
							$imgname = "imgstudent/$rs[img]";
						}
						else
						{
							$imgname = "images/noimage.png";
						}
						
						echo "<tr>
							<td><img src='$imgname' width='70' height='100'></td>
							<td>$rs[studentname]</td>
							<td>$rs[course]</td>
							<td>$rs[semesterid]</td>
							<td>$rs[gender]</td>
							<td>$rs[rollno]</td>
							<td>$rs[emailid]</td>
							<td>$rs[address]</td>
							<td>$rs[contactno]</td>
							<td>$rs[11]<br>";
							if($rs[11] == "Pending" || $rs[11] == "Inactive")
							{
								echo "<a href='studentview.php?status=Active&studentid=$rs[studentid]'>Activate</a>";
							}
							
							if($rs[11] == "Active")
							{
								echo "<a href='studentview.php?status=Inactive&studentid=$rs[studentid]'>Deactivate</a>";
							}
														
							echo "</td>
							<td><a href='student.php?editid=$rs[studentid]'>Edit</a> | <a href='studentview.php?delid=$rs[studentid]' onclick='return deleteconfirmation()'>Delete</a></td></td>
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