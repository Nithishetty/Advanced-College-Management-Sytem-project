<?php
include("header.php");
$sql_transfer_certificate = "SELECT transfer_certificate.*,student.studentname,student.gender, student.rollno, course.course, student.semesterid FROM transfer_certificate LEFT JOIN student ON student.studentid=transfer_certificate.studentid LEFT JOIN course ON course.courseid=student.courseid WHERE transfer_certificate.transfer_certificate_id='$_GET[transfer_certificate_id]'";
$qsql_transfer_certificate = mysqli_query($con,$sql_transfer_certificate);
$rs_transfer_certificate = mysqli_fetch_array($qsql_transfer_certificate)
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment" id="print_receipt">
				
					<table class="table table-striped table-bordered">
                            <tr>
                                <td width="30%" style="padding: 20px;"><img src="<?php echo $_SESSION['collegelogo']; ?>" style="height: 60px;width: 200px;"></td>
                                <td align="right" width="70%" style="padding: 20px;"><?php echo $_SESSION['collegeaddress']; ?>,<br><?php echo $_SESSION['collegeemail']; ?>, <?php echo $_SESSION['collegecontactno']; ?></td>
                            </tr>
						<tr>
							<th colspan="2"><br><center><h3>TRANSFER CERTIFICATE</h3></center></th>
						</tr>
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
							<th>Gender</th>
							<td><?php echo ucfirst($rs_transfer_certificate['gender']); ?></td>
						</tr>
						<tr>
							<th>Reason for TC</th>
							<td><?php echo $rs_transfer_certificate['tc_reason']; ?></td>
						</tr>
						<tr>
							<th>Date of Application of TC Certificate</th>
							<td><?php echo date("d-m-Y",strtotime($rs_transfer_certificate['request_date'])); ?></td>
						</tr>
						<tr>
							<th>Date of Issue of TC Certificate</th>
							<td><?php echo date("d-m-Y",strtotime($rs_transfer_certificate['tc_date'])); ?></td>
						</tr>
						<tr>
							<th>Fees Payment</th>
							<td>No dues</td>
						</tr>
						<tr>
							<th>General Conduct</th>
							<td><?php echo $rs_transfer_certificate['general_conduct']; ?></td>
						</tr>
						<tr>
							<th>Remark</th>
							<td><?php echo $rs_transfer_certificate['staff_message']; ?></td>
						</tr>
					</table>		
			</div>	
<br>
				<center><button class="btn btn-info" onclick="print_receipt('print_receipt')" >Print Receipt</button></center>
<br>
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
<script>
	function print_receipt(divName)
	{
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	}
</script>