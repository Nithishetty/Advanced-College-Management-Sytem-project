<?php
include("header.php");
//##################################
if(isset($_POST['submit']))
{
	$arrpayment = array('card_holder'=>$_POST['card_holder'],'card_number'=>$_POST['card_number'],'cvv_number'=>$_POST['cvv_number'],'expiry_date'=>$_POST['expiry_date']);
	$serializepmt = serialize($arrpayment);
	$sqlpayment = "INSERT INTO fees_payment (studentid,courseid,semesterid,payment_date,total_amt,paid_amt,payment_detail) values('$_POST[studentid]','$_POST[courseid]','$_POST[semesterid]','$dt','$_POST[fees_amt]','$_POST[paid_amt]','$serializepmt')";
	$qsqlpayment = mysqli_query($con,$sqlpayment);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		$insid = mysqli_insert_id($con);
		echo "<script>alert('Fees Payment done successfully...');</script>";
		echo "<script>window.location='payment_receipt.php?fee_payment_id=$insid';</script>";
	}
}
//##################################
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
//##################################
$sqlfees_setting = "SELECT ifnull(sum(fees_amt),0) as fees_amt FROM fees_setting WHERE fees_status='Active' AND courseid='" . $rsstudentprofile['courseid'] . "' AND semesterid='" . $rsstudentprofile['semesterid'] . "'";
$qsqlfees_setting = mysqli_query($con,$sqlfees_setting);
$slno =1;
$totfees_amt = 0;
$rsfees_setting = mysqli_fetch_array($qsqlfees_setting);
//##################################
$sqlpayment = "SELECT ifnull(sum(paid_amt),0) as paid_amt from fees_payment where courseid='" . $rsstudentprofile['courseid'] . "' and semesterid='" . $rsstudentprofile['semesterid'] . "' and studentid='" . $rsstudentprofile['studentid'] . "'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
$rspayment = mysqli_fetch_array($qsqlpayment);
$paidamt = $rspayment['paid_amt'];
//##################################
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-10 col-sm-offset-1 book-appointment" >
				<h3>Make Fees payment</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
					<input type='hidden' name='studentid' id='studentid' value="<?php 
					if(isset($_SESSION['studentid']))
					{
						echo $_SESSION['studentid'];
					}
					else
					{
						echo $_GET['studentid'];
					}
					?>">
					<input type="hidden" name="courseid"  id="courseid" value="<?php echo $rsstudentprofile['courseid']; ?>">
					<input type="hidden" name="semesterid"  id="semesterid" value="<?php echo $rsstudentprofile['semesterid']; ?>">
					<div class="col-md-6 gaps">
						<label>Total Fees Amount  </label>
						<input type="number" style="background: rgb(255 219 219);" readonly name="fees_amt" id="fees_amt" value="<?php echo $balamt = $rsfees_setting['fees_amt'] - $paidamt; ?>" />
					</div>
					<div class="col-md-6 gaps">
						<label>Enter Amount you Pay  </label>
						<input type="number" min="1" name="paid_amt" id="paid_amt" min="0" max="<?php echo $balamt; ?>"  placeholder="Enter Fees Amount" autocomplete="off"/>
					</div>
					
					<div class="col-md-12 gaps"><hr></div>

					<div class="col-md-6 gaps">
						<label>Card Holder </label>
						<input type="text" name="card_holder" id="card_holder"  />
					</div>

					<div class="col-md-6 gaps">
						<label>Card Number </label>
						<input type="number" name="card_number" id="card_number"  />
					</div>


					<div class="col-md-6 gaps">
						<label>CVV Number </label>
						<input type="number" min="001" max="999" name="cvv_number" id="cvv_number"  />
					</div>

					<div class="col-md-6 gaps">
						<label>Card Expires on </label>
						<input type="month" min="<?php echo date("Y-m"); ?>"  name="expiry_date" id="expiry_date"  />
					</div>

					<div class="col-md-12 gaps"><hr></div>
					<div class="col-md-6 col-sm-offset-3 gaps">
						<input type="submit" name="submit" id="submit" value="Click here to Pay Fee">
					</div>
			 	</form>
			</div>
			
		</div>
	</div>
	<!-- //register -->

	<!-- //register -->
	<?php
include("footer.php")
?>
<script>
function validateform()
{
	if(document.frm.courseid.value == "")
	{
		alert("Course should not be empty..");
		return false;
	}
    else if(document.frm.semesterid.value == "")
	{
		alert("Course description should not be empty..");
		return false;
	
	}
	else if(document.frm.fees_type.value == "")
	{
		alert("Kindly select the status..");
		return false;		
	}
	else if(document.frm.fees_amt.value == "")
	{
		alert("Kindly select the status..");
		return false;		
	}
	else if(document.frm.fees_status.value == "")
	{
		alert("Kindly select the status..");
		return false;		
	}
	else
	{
		return true;
	}
}
</script>