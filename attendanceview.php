<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "UPDATE attendance SET status='Deleted' WHERE attendanceid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Attendence record deleted successfully...');</SCRIPT>";
	}
}
?>
<script defer src="js/all.js"></script>

	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Attendance Report</h3>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
			
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
			<tr>
					<th>Attendance month</th>
					<th>
						<div class="col-md-3 gaps">
							<input type="month" name="attendancedate" id="attendancedate" value="<?php 
							if(isset($_GET['attendancedate']))
							{
								echo $_GET['attendancedate'];
							}
							else
							{
								echo date("Y-m"); 
							}
							?>"   onchange="window.location='attendanceview.php?attendancedate='+attendancedate.value"/>
						</div>
					</th>
			</tr>
	</thead>
</table>
				

				
				<table class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th style="width:150px;">Date</th>
						<?php
						$sqlsubject = "SELECT * FROM subject WHERE status='Active' AND courseid='$rsstudentprofile[courseid]' AND semesterid='$rsstudentprofile[semesterid]'";
						$qsqlsubject = mysqli_query($con,$sqlsubject);
						while($rssubject = mysqli_fetch_array($qsqlsubject))
						{
							$subject[] =$rssubject[0];
							echo "<th>$rssubject[subject]</th>";
						}
						?>
					</tr>
				</thead>
				<tbody>
				<?php	
if(isset($_GET['attendancedate']))				
{
$a_date = $_GET['attendancedate'];	
}
else
{
$a_date = date("Y-m-d");
}
$nodays =  date("t", strtotime($a_date));
				for($days=1; $days <= $nodays; $days++)
				{
				?>
					<tr>
						<td>
							<?php echo $days ; ?>- <?php echo date("M-Y", strtotime($a_date)); ?>
						</td>
						<?php
						$noclass[] = 0;
						$noabsent[] = 0;
						$nopresent[] = 0;
						for($k=0; $k<count($subject);$k++)
						{
echo "<td>";
$atdate = date("Y-m", strtotime($a_date)) . "-" . $days;
$sqlattendance = "SELECT * FROM attendance where attendancedate='$atdate' AND studentid='$rsstudentprofile[studentid]' AND subjectid='$subject[$k]'";		
$qsqlattendance = mysqli_query($con,$sqlattendance);
$rsattendance = mysqli_fetch_array($qsqlattendance);
echo $rsattendance['attendancetype'];

if($rsattendance['remark'] != "")	
{
?>
<div>
  <ul class="list-inline">
    <li><a href="#" data-toggle="popover" data-placement="top" data-content="<?php echo $rsattendance['remark']; ?>"><i class="fas fa-question-circle"></i>
</a></li >
  </ul>
</div>
<?php
}
echo "</td>";
							
							if($rsattendance['attendancetype'] == "Present")
							{
								$nopresent[$k] = $nopresent[$k] + 1;
								$noclass[$k] = $noclass[$k] + 1;
							}
							if($rsattendance['attendancetype'] == "Absent")
							{
								$noabsent[$k] = $noabsent[$k] + 1;
								$noclass[$k] = $noclass[$k] + 1;
							}
						}
						?>
					</tr>
				<?php
				}
				?>
				</tbody>
				<tfoot>
				<tr>
						<th>
							No. of classses
						</th>
						<?php
						for($k=0; $k<count($subject);$k++)
						{
echo "<th>$noclass[$k]</th>";  // $nopresent[$k] $noclass[$k] $noabsent[$k]
						}
?>
					</tr>
				<tr>
						<th>
							No. of classses attended
						</th>
						<?php
						for($k=0; $k<count($subject);$k++)
						{
echo "<th>$nopresent[$k]</th>";
						}
						?>
					</tr>
				<tr>
						<th>
							Absent
						</th>
						<?php
						for($k=0; $k<count($subject);$k++)
						{
echo "<th>$noabsent[$k]</th>";
						}
						?>
					</tr>
				</tfoot>
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