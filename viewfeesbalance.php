<?php
include("header.php");
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>View Student Fee Balance Report</h3>
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Image</th>
							<th>Student&nbsp;name</th>
							<th>Roll&nbsp;No.</th>
							<th>Course</th>
							<th>Semester</th>
							<th class='text-right'>Total Fees</th>
							<th class='text-right'>Paid Fees</th>
							<th class='text-right'>Balance Fee</th>
							<th>Pay</th>
							<th>Report</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM student LEFT JOIN course ON student.courseid=course.courseid where ";
						if(isset($_GET['st']))
						{
							$sql .=  "  student.status='Pending'";
						}
						else
						{
							$sql .= " student.status<>'Deleted'";
						}
						$qsql = mysqli_query($con,$sql);
						while($rs = mysqli_fetch_array($qsql))
						{
							//Total Fees Starts here
							$sqlfees_setting = "SELECT sum(fees_amt) as total_fees_amt FROM fees_setting WHERE fees_status='Active' AND courseid='" . $rs['courseid'] . "' AND semesterid='" . $rs['semesterid'] . "'";
							$qsqlfees_setting = mysqli_query($con,$sqlfees_setting);
							$rsfees_setting = mysqli_fetch_array($qsqlfees_setting);
							//Total Fees Ends here
							//Paid Fees Starts here
							$sqlpayment = "SELECT ifnull(sum(paid_amt),0) as paid_amt from fees_payment where courseid='" . $rs['courseid'] . "' and semesterid='" . $rs['semesterid'] . "' and studentid='" . $rs['studentid'] . "'";
							$qsqlpayment = mysqli_query($con,$sqlpayment);
							$rspayment = mysqli_fetch_array($qsqlpayment);
							//Paid Fees Ends here
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
								<td>$rs[rollno]</td>
								<td>$rs[course]</td>
								<td>$rs[semesterid]</td>
								<td class='text-right'>₹$rsfees_setting[total_fees_amt]</td>
								<td class='text-right'>₹$rspayment[paid_amt]</td>
								<td class='text-right'>₹" . ($rsfees_setting['total_fees_amt'] - $rspayment['paid_amt']) . "</td>
								<td><a href='feesreport.php?studentid=$rs[studentid]' class='btn btn-info'>Pay<br>Fee</a></td></td>
								<td><a href='feespaymentreport.php?studentid=$rs[studentid]' class='btn btn-primary'>View<br>Report</a></td></td>
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