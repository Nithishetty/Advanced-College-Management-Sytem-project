<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "UPDATE transfer_certificate SET tc_status='" . $_POST['tc_status'] . "', staff_message = '$_POST[staff_message]',tc_date='$dt', general_conduct='$_POST[general_conduct]' where transfer_certificate_id='$_POST[transfer_certificate_id]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Transfer Certificate process $_POST[tc_status] ...');</script>";
		if($_POST['tc_status'] == "Approved")
		{
			$sqlstudent = "UPDATE student SET status='TC issued' WHERE studentid='$_POST[studentid]'";
			$qsqlstudent = mysqli_query($con,$sqlstudent);
			echo "<script>window.location='tccertificatereport.php?transfer_certificate_id=$_POST[transfer_certificate_id]';</script>";
		}
		else
		{
			echo "<script>window.location='transfercertificatedetail.php?transfer_certificate_id=$_POST[transfer_certificate_id]';</script>";
		}
	}
}
$sql_transfer_certificate = "SELECT transfer_certificate.*,student.studentid,student.studentname, student.rollno, course.course, student.semesterid FROM transfer_certificate LEFT JOIN student ON student.studentid=transfer_certificate.studentid LEFT JOIN course ON course.courseid=student.courseid WHERE transfer_certificate.transfer_certificate_id='$_GET[transfer_certificate_id]'";
$qsql_transfer_certificate = mysqli_query($con,$sql_transfer_certificate);
$rs_transfer_certificate = mysqli_fetch_array($qsql_transfer_certificate)
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>TRANSFER CERTIFICATE</h3>
					<table class="table table-striped table-bordered">
						<tr>
							<th>Student Name</th>
							<td><?php echo $rs_transfer_certificate['studentname']; ?></td>
						</tr>
						<tr>
							<th>Roll No.</th>
							<td><?php echo $rs_transfer_certificate['rollno']; ?></td>
						</tr>
						<tr>
							<th>Course</th>
							<td><?php echo $rs_transfer_certificate['course']; ?></td>
						</tr>
						<tr>
							<th>Semester</th>
							<td><?php echo $rs_transfer_certificate['semesterid']; ?></td>
						</tr>
						<tr>
							<th>Request Date</th>
							<td><?php echo date("d-m-Y",strtotime($rs_transfer_certificate['request_date'])); ?></td>
						</tr>
						<tr>
							<th>Date of Leaving</th>
							<td><?php echo date("d-m-Y",strtotime($rs_transfer_certificate['date_of_leaving'])); ?></td>
						</tr>
						<tr>
							<th>Reason</th>
							<td><?php echo $rs_transfer_certificate['tc_reason']; ?></td>
						</tr>
						<tr>
							<th>Student Note</th>
							<td><?php echo $rs_transfer_certificate['student_message']; ?></td>
						</tr>
						<tr>
							<th>Fees Payment</th>
							<td>No dues</td>
						</tr>
						<tr>
							<th>Request Status</th>
							<td><?php echo $rs_transfer_certificate['tc_status']; ?></td>
						</tr>
						<?php
						if ($rs_transfer_certificate['tc_status'] != "Pending") 
						{
						?>
						<tr>
							<th>Staff Message</th>
							<td><?php echo $rs_transfer_certificate['staff_message']; ?></td>	
						</tr>					
						<?php
						}
						?>
					</table>						
					<?php
						if($rs_transfer_certificate['tc_status'] == "Approved")
						{
					?>
						<center><a class="btn btn-info" href="tccertificatereport.php?transfer_certificate_id=<?php echo $rs_transfer_certificate['transfer_certificate_id']; ?>" >View / Download Report</a></center>
					<?php
						}
						if ($rs_transfer_certificate['tc_status'] == "Pending") 
						{
					?>
					<hr>
					<form method="post" action="">
						<input type="hidden" name="studentid" id="studentid" value="<?php echo $rs_transfer_certificate['studentid']; ?>" >
						<input type="hidden" name="transfer_certificate_id" id="transfer_certificate_id" value="<?php echo $_GET['transfer_certificate_id']; ?>" >

						<div class="gaps col-md-12">
							<p>Any Note or Message  </p>
							<textarea name="staff_message" id="staff_message" placeholder="Enter Any Note or Message"></textarea>
						</div>

						<div class="gaps col-md-6">
							<p>General Conduct</p>
							<input type="text" name="general_conduct" id="general_conduct">
						</div>
						<div class="gaps col-md-6">
							<p>TC Request Status</p>
							<select name="tc_status" id="tc_status">
							<option value=''>Select</option>
							<?php
							$arr = array("Approved","Rejected");
							foreach($arr as $val)
							{
								echo "<option value='$val'>$val</option>";
							}
							?>
							</select>
						</div>
						<div class="gaps col-md-12"><hr>
							<input type="submit" name="submit" value="Submit" style="width: 50%;">
						</div>
					</form>
					<?php
						}
					?>
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
	if(document.frm.staff_message.value == "")
	{
		alert("Kinldy enter the message or reason..");
		return false;
	}
	 else if(document.frm.general_conduct.value == "")
	{
		alert("Kindly select the General Conduct detail..");
		return false;
	}		
	 else if(document.frm.tc_status.value == "")
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