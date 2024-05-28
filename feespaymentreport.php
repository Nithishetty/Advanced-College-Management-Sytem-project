<?php
include("header.php");
if(!isset($_SESSION['adminid']) && !isset($_SESSION["studentid"]))
{
	echo"<script>window.location='index.php';</script>";
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>View Payment Report</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Bill No.</th>
						<th>Payment Date</th>
						<th>Roll No.</th>
						<th>Student Name</th>
						<th>Course</th>
						<th>Semester</th>
						<th class="text-right">Total Amount</th>
						<th class="text-right">Paid Amount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM `fees_payment` LEFT JOIN student ON fees_payment.studentid=student.studentid LEFT JOIN course ON course.courseid=fees_payment.courseid WHERE 1=1 ";
					if(isset($_SESSION['studentid']))
					{
						$sql = $sql . " AND fees_payment.studentid='" . $_SESSION['studentid'] . "'";
					}
					if(isset($_GET['studentid']))
					{
						$sql = $sql . " AND fees_payment.studentid='" . $_GET['studentid'] . "'";
					}
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[fees_payment_id]</td>
							<td>" . date("d-m-Y",strtotime($rs['payment_date'])) ."</td>
							<td>$rs[rollno]</td>
							<td>$rs[studentname]</td>
							<td>$rs[course]</td>
							<td>$rs[semesterid]</td>
							<td class='text-right'>₹$rs[total_amt]</td>
							<td class='text-right'>₹$rs[paid_amt]</td>
							<td><a href='payment_receipt.php?fee_payment_id=$rs[0]' target='_blank' class='btn btn-info'>Receipt</a></td>
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