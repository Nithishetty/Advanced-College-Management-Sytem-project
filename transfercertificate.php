<?php
include("header.php");
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>VIEW TRANSFER CERTIFICATE REQUEST</h3>
					<table class="table table-striped table-bordered">
						<tr>
							<th>Student Name</th>
							<th>Roll No.</th>
							<th>Course</th>
							<th>Semester</th>
							<th>Request Date</th>
							<th>Date of Leaving</th>
							<th>Reason</th>
							<th>Request Status</th>
							<th>Action</th>
						</tr>
						<?php
						$sql_transfer_certificate = "SELECT transfer_certificate.*,student.studentname, student.rollno, course.course, student.semesterid FROM transfer_certificate LEFT JOIN student ON student.studentid=transfer_certificate.studentid LEFT JOIN course ON course.courseid=student.courseid";
						$qsql_transfer_certificate = mysqli_query($con,$sql_transfer_certificate);
						while($rs_transfer_certificate = mysqli_fetch_array($qsql_transfer_certificate))
						{
						?>
						<tr>
							<td><?php echo $rs_transfer_certificate['studentname']; ?></td>
							<td><?php echo $rs_transfer_certificate['rollno']; ?></td>
							<td><?php echo $rs_transfer_certificate['course']; ?></td>
							<td><?php echo $rs_transfer_certificate['semesterid']; ?></td>
							<td><?php echo date("d-m-Y",strtotime($rs_transfer_certificate['request_date'])); ?></td>
							<td><?php echo date("d-m-Y",strtotime($rs_transfer_certificate['date_of_leaving'])); ?></td>
							<td><?php echo $rs_transfer_certificate['tc_reason']; ?></td>
							<td><?php echo $rs_transfer_certificate['tc_status']; ?></td>
							<td>								
								<a href='transfercertificatedetail.php?transfer_certificate_id=<?php echo $rs_transfer_certificate[0]; ?>' target='_blank' class="btn btn-info">View</a>
							</td>
						</tr>
						<?php
						}
						?>
					</table>
			</div>			
		</div>
	</div>
	<!-- //register -->


	<?php
include("footer.php")
?>
<script>
function validateform()
{ 
	if(document.frm.date_of_leaving.value == "")
	{
		alert("Date of Leaving should not be empty..");
		return false;
	}
	 else if(document.frm.tc_reason.value == "")
	{
		alert("Kindly select the reason..");
		return false;
	}		
}
</script>
<script type="text/javascript">
function funcancelrequest()
{
	if(confirm("Are you sure want to cancel this TC Request") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>