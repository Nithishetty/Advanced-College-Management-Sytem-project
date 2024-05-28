<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql  = "DELETE FROM timetable WHERE courseid='$_POST[courseid]' AND semesterid='$_POST[semesterid]' ";
	$qsql = mysqli_query($con,$sql);
	$subjectid = $_POST['subject'];
	$ftime=$_POST['ftime'];
	$ttime=$_POST['ttime'];
	$day = $_POST['day'];
	
	$facultyarr = $_POST['faculty'];
	//print_r($ftime);
	
	$arr = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	foreach($arr as $val)
	{
		$arr1 = array("9to10","10to11","11to12","12to1","2to3","3to4","4to5");
		foreach($arr1 as $val1)
		{
			unset($arrfaculty);			
			for($fa=0; $fa < count($facultyarr[$val][$val1]); $fa++)
			{
				$arrfaculty[$fa]  =  $facultyarr[$val][$val1][$fa];
			}			
			
			$facultyids = serialize($arrfaculty);			
			$facultyids = mysqli_real_escape_string($con,$facultyids);
			
			unset($sid);
			$sid =  $subjectid[$val][$val1];
			$ft = $ftime[$val][$val1];
			$tt= $ttime[$val][$val1];
			$d= $day[$val];
			$sql = "INSERT INTO timetable(courseid,semesterid,subjectid,faculties,day,ftime,ttime,status) VALUES('$_POST[courseid]','$_POST[semesterid]','$sid','$facultyids','$d','$ft','$tt','Active')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		}
	}
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Time Table record updated successfully..');</script>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div style="background-color:white;">
			<div class="col-md-12 book-appointment" style="background-color:white;">
			
				<form action="" method="post">
				
<div class="col-md-6 gaps">
					<p>Select Course </p>
			<select name="courseid" onchange="window.location='timetableview.php?courseid='+this.value">
			<option value=''>Select</option>
			<?php
			$sqlcourse = "SELECT * FROM course WHERE status='Active'";
			$qsqlcourse = mysqli_query($con,$sqlcourse);
			while($rscourse = mysqli_fetch_array($qsqlcourse))
			{
				if($rscourse['courseid'] == $_GET['courseid'])
				{
				echo "<option value='$rscourse[courseid]' selected>$rscourse[course]</option>";
				}
				else
				{
				echo "<option value='$rscourse[courseid]'>$rscourse[course]</option>";
				}
			}
			?>
		   </select>
</div>

<div class="col-md-6 gaps">
	<p>Semester</p>
	<select name="semesterid" onchange="window.location='timetableview.php?courseid='+courseid.value+'&semesterid='+this.value">
	<option value=''>Select</option>
	<?php
	$arr = array("1","2","3","4","5","6","7","8");
	foreach($arr as $val)
	{
		if($val == $_GET['semesterid'])
		{
			echo "<option value='$val' selected>$val</option>";
		}
		else
		{
			echo "<option value='$val'>$val</option>";
		}
	}
	?>
	</select>
</div>
					<div class="gaps">
					
<?php
if($_GET['courseid'] != "" && $_GET['semesterid']!="")
{
?>					
<table  class="table table-striped table-bordered" cellspacing="0" width="100%">
<tr>
	<th>Day</th>
	<td>9-10</td>
	<td>10-11</td>
	<td>11-12</td>
	<td>12-1</td>
	<td>2-3</td>
	<td>3-4</td>
	<td>4-5</td>
</tr>
<?php
$arr=0;
$sql = "SELECT * FROM faculty WHERE status='Active'";
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
	$facultyid[$arr]= $rs['facultyid'];
	$facultyname[$arr]= $rs['facultyname'];
	$facultycode[$arr]= $rs['facultycode'];
	$arr++;
}
$arr=0;
$sqlsubject="SELECT * From subject WHERE status='Active' AND courseid='$_GET[courseid]' AND semesterid ='$_GET[semesterid]'";
$qsqlsubject=mysqli_query($con,$sqlsubject);
while($rssubject=mysqli_fetch_array($qsqlsubject))
{
	$subjectid[$arr]= $rssubject['subjectid'];
	$subject[$arr]= $rssubject['subject'];
	$arr++;
}

$j =0;
$arr3 = array("09:00:00","10:00:00","11:00:00","12:00:00","14:00:00","15:00:00","16:00:00");
foreach($arr3 as $val3)
{
	$ftime[$j] = $val3;
	$j++;
}

$k =0;
$arr3 = array("10:00:00","11:00:00","12:00:00","13:00:00","15:00:00","16:00:00","17:00:00");
foreach($arr3 as $val3)
{
	$ttime[$k] = $val3;
	$k++;
}

$arr1 = array("9to10","10to11","11to12","12to1","2to3","3to4","4to5");

$m=0;
$arr = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
foreach($arr as $val)
{
?>
<input type='hidden' name='day[<?php echo $val; ?>]' value='<?php echo $val; ?>'>
<tr>
	<th><?php echo $val; ?></th>
	
<?php		
	//foreach($arr1 as $val1)
	for($fttime = 0; $fttime < 7; $fttime++)
	{
		$val1 = $arr1[$fttime];
?>
<input type='hidden' name='ftime[<?php echo $val; ?>][<?php echo $val1; ?>]' value='<?php echo $ftime[$m]; ?>'><input type='hidden' name='ttime[<?php echo $val; ?>][<?php echo $val1; ?>]' value='<?php echo $ttime[$m]; ?>' >
<?php
		$m++;
?>
	<td >	
<?php
if(isset($_GET['courseid']) && isset($_GET['semesterid']))
{
	$na = $m-1;
		$sqledit = "SELECT * FROM timetable WHERE courseid='$_GET[courseid]' AND semesterid ='$_GET[semesterid]' AND day='$val' AND ftime='$ftime[$na]' AND ttime='$ttime[$na]'";
		$qsqledit = mysqli_query($con,$sqledit);
		$rsedit = mysqli_fetch_array($qsqledit);
}
$arrf = unserialize($rsedit['faculties']);
//print_r($arrf);
?>

					<?php
					for($i=0; count($subjectid)>$i;)
					{
						if($subjectid[$i] == $rsedit['subjectid'])
						{
						echo "<b>$subject[$i]</b>";
						}
						
						$i++;
					}
					?>
			
			  <div class="multiselect">
				
				<?php
					for($i=0; count($facultyid)>$i;)
					{
						if(in_array($facultyid[$i], $arrf))
						{
					?>
					<?php echo $facultyname[$i]; ?><br>					
					<?php
						}
					$i++;
					}
				?>
				</div>
			  </div>		
	</td>
	<?php
	$x++;
	}
	?>
	
</tr>
<?php
$m=0;
}
?>
</table>
<?php
}
else
{
?>
<center style='color:red;'>Please select Course and Semester</center>
<?php
}
?>
					</div>
				
				</form>
			</div>
			
		</div>
	</div>
	<!-- //register -->
<script>
var expanded = false;

function showCheckboxes(id) {
  var checkboxes = document.getElementById("checkboxes"+id);
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
<style>
.multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
</style>
	<?php
include("footer.php")
?>