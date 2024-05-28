<?php
include("header.php");
if(isset($_GET['st']))
{
	$sql = "UPDATE transfer_certificate SET tc_status='" . $_GET['st'] . "', student_message = CONCAT(student_message, '<BR><HR>TC Request cancelled by student on 06-08-2022.')  where transfer_certificate_id='$_GET[transfer_certificate_id]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)	
	{
		echo "<script>alert('Transfer Certificate Cancellation process completed successfully...');</script>";
		echo "<script>window.location='tc_request.php';</script>";
	}
}
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO transfer_certificate(studentid,date_of_leaving,tc_reason,student_message,request_date,tc_status) VALUES('$_SESSION[studentid]','$_POST[date_of_leaving]','$_POST[tc_reason]','$_POST[student_message]','$dt','Pending')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)	
	{
		echo "<script>alert('Transfer Certificate Request sent successfully...');</script>";
		echo "<script>window.location='tc_request.php';</script>";
	}
}
$sql_transfer_certificate = "SELECT * FROM transfer_certificate WHERE studentid='$_SESSION[studentid]' AND tc_status!='Cancelled'";
$qsql_transfer_certificate = mysqli_query($con,$sql_transfer_certificate);
$rs_transfer_certificate = mysqli_fetch_array($qsql_transfer_certificate)
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>SEND TC REQUEST</h3>
				<?php
				if(mysqli_num_rows($qsql_transfer_certificate) >= 1)
				{
				?>
					<center><h2>Transfer Certificate Request already sent...</h2></center>
					<table class="table table-striped table-bordered">
						<tr>
							<th>Request Date</th>
							<th>Date of Leaving</th>
							<th>Reason</th>
							<th>Student Note</th>
							<th>Staff Message</th>
							<th>Status</th>
						</tr>
						<tr>
							<td><?php echo date("d-m-Y",strtotime($rs_transfer_certificate['request_date'])); ?></td>
							<td><?php echo date("d-m-Y",strtotime($rs_transfer_certificate['date_of_leaving'])); ?></td>
							<td><?php echo $rs_transfer_certificate['tc_reason']; ?></td>
							<td><?php echo $rs_transfer_certificate['student_message']; ?></td>
							<td><?php echo $rs_transfer_certificate['staff_message']; ?></td>
							<td><?php echo $rs_transfer_certificate['tc_status']; ?></td>
						</tr>
					</table>
					<hr>
					<?php
					if($rs_transfer_certificate['tc_status'] == "Approved")
					{
					?>
					<center><a href="tccertificatereport.php?transfer_certificate_id=<?php 
					echo $rs_transfer_certificate['transfer_certificate_id']; ?>&st=Cancelled" class="btn btn-info" on >View/Print Transfer certificate</a></center>
					<?php
					}
					else
					{
					?>
						<center><a href="tc_request.php?transfer_certificate_id=<?php 
						echo $rs_transfer_certificate['transfer_certificate_id']; ?>&st=Cancelled" onclick="return funcancelrequest()" class="btn btn-info" on >Cancel TC Request</a></center>
					<?php
					}
					?>
				<?php
				}
				else
				{
				?>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
					<div class="row">
						<div class="col-md-6 gaps">
							<p>Date of leaving</p>
							<input type="date" name="date_of_leaving" id="date_of_leaving" min="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' +3 days')); ?>" />
						</div>
						
						<div class="col-md-6 gaps">
							<p>TC Reason</p>
								<select name="tc_reason" id="tc_reason">
								<option value=''>Select</option>
								<?php
									$arr = array("Completion of Course","Health Issue","Change of Residence","Parent Choice","Others");
									foreach($arr as $val)
									{
										echo "<option value='$val'>$val</option>";
									}
								?>
								</select>
						</div>	
					</div>	
					<div class="row">
						<div class="col-md-12 gaps">
							<p>Any message</p>
							<textarea id="student_message" name="student_message"></textarea>
						</div>					
					</div>					
					<div class="gaps col-md-12">
						<hr>
							<?php
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
							$bal = $rsfees_setting['total_fees_amt'] - $rspayment['paid_amt'];
							if($bal > 0)
							{
							?>
						<center><input style="width: 50%;"  type="button" onclick="alert('Kindly pay all dues...')" name="submit" value="Send TC Request"></center>
						<?php
							}
							else
							{
						?>
						<center><input style="width: 50%;" type="submit" name="submit" value="Send TC Request"></center>
						<?php
							}
						?>
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