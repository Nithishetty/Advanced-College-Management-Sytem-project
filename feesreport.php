<?php
include("header.php");
$sqlstudentprofile = "SELECT * FROM student LEFT JOIN course ON course.courseid=student.courseid where ";
if(isset($_SESSION['studentid']))
{
$sqlstudentprofile .= " student.studentid='$_SESSION[studentid]' ";
}
else
{
$sqlstudentprofile .= " student.studentid='$_GET[studentid]' ";	
}
$qsqlstudentprofile = mysqli_query($con,$sqlstudentprofile);
$rsstudentprofile = mysqli_fetch_array($qsqlstudentprofile);
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>View Fees Report</h3>

				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<tr>
						<th>Student Name</th>
						<td><?php echo $rsstudentprofile['studentname']; ?></td>
						<th>Roll No.</th>
						<td><?php echo $rsstudentprofile['rollno']; ?></td>
					</tr>
					<tr>
						<th>Course</th>
						<td><?php echo $rsstudentprofile['course']; ?></td>
						<th>Semester</th>
						<td><?php echo $rsstudentprofile['semesterid']; ?></td>
					</tr>
				</table>
<hr>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>SL No.</th>
						<th>Particulars</th>
						<th class="text-right">Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT * FROM fees_setting WHERE fees_status='Active' AND courseid='" . $rsstudentprofile['courseid'] . "' AND semesterid='" . $rsstudentprofile['semesterid'] . "'";
					$qsql = mysqli_query($con,$sql);
					$slno =1;
					$totfees_amt = 0;
					while($rs = mysqli_fetch_array($qsql))
					{
				?>
					<tr>
						<td><?php echo $slno++; ?>)</td>
						<td><?php echo $rs['fees_type']; ?></td>
						<td class="text-right">₹<?php echo $rs['fees_amt']; ?></td>
					</tr>
				<?php
					$totfees_amt += $rs['fees_amt'];
					}
				?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2" class="text-right">Total Fees Amount</th>
						<th class="text-right">₹<?php echo $totfees_amt; ?></th>
					</tr>
					<tr>
						<th colspan="2" class="text-right">Paid Amount</th>
						<th class="text-right">₹<?php 
						$sqlpayment = "SELECT ifnull(sum(paid_amt),0) as paid_amt from fees_payment where courseid='" . $rsstudentprofile['courseid'] . "' and semesterid='" . $rsstudentprofile['semesterid'] . "' and studentid='" . $rsstudentprofile['studentid'] . "'";
						$qsqlpayment = mysqli_query($con,$sqlpayment);
						$rspayment = mysqli_fetch_array($qsqlpayment);
						echo $paidamt = $rspayment['paid_amt'];
						 ?></th>
					</tr>
					<tr>
						<th colspan="2" class="text-right">Balance Amount</th>
						<th class="text-right">₹<?php echo $totfees_amt - $paidamt; ?></th>
					</tr>
				</tfoot>
				</table>
				<hr>
				<center><a class="btn btn-info" href="make_fee_payment.php?studentid=<?php echo $rsstudentprofile['studentid']; ?>">Make Fee Payment</a></center>
			</div>
			
		</div>
	</div>
	<!-- //register -->
<?php
include("footer.php")
?>