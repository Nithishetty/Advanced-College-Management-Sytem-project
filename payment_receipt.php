<?php
include("header.php");
if(!isset($_SESSION['adminid']) && !isset($_SESSION["studentid"]))
{
    echo"<script>window.location='index.php';</script>";
}
//###########################################################
$sql_fees_payment ="SELECT * FROM `fees_payment` where fees_payment_id='" . $_GET['fee_payment_id'] . "'";
$qsql_fees_payment = mysqli_query($con,$sql_fees_payment);
$rs_fees_payment = mysqli_fetch_array($qsql_fees_payment);
//###########################################################
$sqlstudentprofile = "SELECT * FROM student LEFT JOIN course ON course.courseid=student.courseid where student.studentid='$rs_fees_payment[studentid]' ";
$qsqlstudentprofile = mysqli_query($con,$sqlstudentprofile);
$rsstudentprofile = mysqli_fetch_array($qsqlstudentprofile);
//###########################################################
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container table table-bordered">


<div bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 100%;" height="100%" width="100%" id="print_receipt">
	<br><br>
    <table bgcolor="#f6f6f6" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;" >
        <tbody>
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                        <tbody>
                            <tr>
                                <td width="30%" style="padding: 20px;"><img src="<?php echo $_SESSION['collegelogo']; ?>" style="height: 60px;width: 200px;"></td>
                                <td align="right" width="70%" style="padding: 20px;"><?php echo $_SESSION['collegeaddress']; ?>,<br><?php echo $_SESSION['collegeemail']; ?>, <?php echo $_SESSION['collegecontactno']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="padding: 0;"></td>
                <td width="5px" style="padding: 0;"></td>
            </tr>
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                        <tbody>
                            <tr>
                                <td width="50%" style="padding: 20px;">
<b>Date :</b> <?php echo date("d-m-Y",strtotime($rs_fees_payment['payment_date'])); ?><strong style="color: #333; font-size: 26px;">
<br>
                                	₹<?php echo $rs_fees_payment['paid_amt']; ?></strong> Paid</td>
                                <td align="right" width="50%" style="padding: 20px;"><b>Name - </b> <?php echo $rsstudentprofile['studentname']; ?><br><b>Roll No.</b> <?php echo $rsstudentprofile['rollno']; ?><br>
                                	<b>Course -</b> <?php echo $rsstudentprofile['course']; ?>  | 
                                	<b>Semester -</b> <?php echo $rsstudentprofile['semesterid']; ?><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="padding: 0;"></td>
                <td width="5px" style="padding: 0;"></td>
            </tr>
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;width: 500px;">
                        <tbody>
                            <tr>
                                <td valign="top"  style="padding: 20px;">
                                    <h3
                                        style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        "
                                    >
                                        Summary
                                    </h3>
                                    <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;width: 500px;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 5px 0;">Total Balance Amount</td>
                                                <td align="right" style="padding: 5px 0;">₹<?php echo $rs_fees_payment['total_amt']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 5px 0;">Paid Amount</td>
                                                <td align="right" style="padding: 5px 0;">₹<?php echo $rs_fees_payment['paid_amt']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Balance Amount</td>
                                                <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">₹<?php echo $rs_fees_payment['total_amt'] - $rs_fees_payment['paid_amt']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <b>Thank you for the Payment...</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="5px" style="padding: 0;"></td>
            </tr>

        </tbody>
    </table>
</div>
<br>
				<center><button class="btn btn-info" onclick="print_receipt('print_receipt')" >Print Receipt</button></center>
			</div>
			
		</div>
	</div>
	<!-- //register -->
<?php
include("footer.php")
?>
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