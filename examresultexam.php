<?php
include("header.php");
if(isset($_POST['submit']))
{
	//print_r($_POST[maxmark]);
	//print_r($_POST['studentid']);
	//print_r($_POST['subjectid']);
	//print_r($_POST[mark]);
	
	$sqlexam = "SELECT * FROM exam where courseid='$_GET[courseid]' AND semester='$_GET[semesterid]' AND  examtype ='$_GET[examtype]'";
	$qsqlexam = mysqli_query($con,$sqlexam);
	$rsexam = mysqli_fetch_array($qsqlexam);
	
	$sqlexamdelete="DELETE FROM exam_result WHERE examid='$rsexam[examid]'";
	$qsqlexamdelete = mysqli_query($con,$sqlexamdelete);
	
	//intmaxmark extmaxmark intmark intmark
	$studentid = $_POST['studentid'];
	$subjectid = $_POST['subjectid'];
	$intmaxmark = $_POST['intmaxmark'];
	$extmaxmark = $_POST['extmaxmark'];
	$intmark = $_POST['intmark'];
	$extmark = $_POST['extmark'];
		
 	$sqlstudent = "SELECT * FROM student  where student.status <>'Deleted' AND courseid='$_GET[courseid]' AND semesterid ='$_GET[semesterid]'";
	$qsqlstudent = mysqli_query($con,$sqlstudent);
	while($rsstudent = mysqli_fetch_array($qsqlstudent))
	{
		$sqlsubject = "SELECT * FROM subject WHERE status='Active' AND courseid='$_GET[courseid]' AND semesterid='$_GET[semesterid]'";
		$qsqlsubject = mysqli_query($con,$sqlsubject);
		while($rssubject = mysqli_fetch_array($qsqlsubject))
		{
			$stdid = $studentid[$rsstudent['studentid']];
			$subid=$subjectid[$rsstudent['studentid']][$rssubject['subjectid']];
						
			$aintmaxmark = $intmaxmark[$rssubject['subjectid']];
			$aextmaxmark = $extmaxmark[$rssubject['subjectid']];
			
			$scoredintmark = $intmark[$rsstudent['studentid']][$rssubject['subjectid']];
			$scoredextmark = $extmark[$rsstudent['studentid']][$rssubject['subjectid']];
			
			 $sql = "INSERT INTO exam_result(examid,studentid,subjectid,maxinternalmark,scoredinternalmark,maxextmark,scoredextmark,remarks,status) VALUES('$rsexam[examid]','$stdid','$subid','$aintmaxmark','$scoredintmark','$aextmaxmark','$scoredextmark','','Active')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);		
		}		
	}
				echo "<SCRIPT>alert('Exam result record inserted successfully..');</script>";
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM exam_result WHERE exam_resultid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
			<h3>View Exam Result</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
<?php
$tabindex = 0
?>				
	<div class="gaps col-md-4">
						<p>Course</p>
			<select name="courseid" id='courseid' onchange="loadexamtype(courseid.value,semesterid.value,examtype.value)">
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

	<div class="gaps col-md-4">
			<p>Semester</p>
			<select name="semesterid" id="semesterid"  onchange="loadexamtype(courseid.value,semesterid.value,examtype.value)" >
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
	
	<div class="gaps col-md-4">
		<p>Exam type</p>
			<select name="examtype" id="examtype" onchange="loadexamtype(courseid.value,semesterid.value,examtype.value)">
				<option value="">Select</option>
				<?php
				$arr = array("First Internal","Second Internal","Third Internal","Semester");
				foreach($arr as $val)
				{
					if($val == $_GET['examtype'])
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
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>Student</th>
					<?php
						$sqlsubject = "SELECT * FROM subject WHERE status='Active' AND courseid='$_GET[courseid]' AND semesterid='$_GET[semesterid]'";
						$qsqlsubject = mysqli_query($con,$sqlsubject);
						while($rssubject = mysqli_fetch_array($qsqlsubject))
						{
							$subject[] =$rssubject[0];
							echo "<th  style='width:120px;'>$rssubject[subject]</th>";
						}
						?>
						<th>Total</th>
						<th>Percentage</th>
						<th>Grade</th>
					</tr>
<?php
if($_GET['examtype'] != "Semester")
{
?>					
	<tr>
		<th>Internal max marks</th>
	<?php
	$sqlsubject = "SELECT * FROM subject WHERE status='Active' AND courseid='$_GET[courseid]' AND semesterid='$_GET[semesterid]'";
	$qsqlsubject = mysqli_query($con,$sqlsubject);
	$numrows = mysqli_num_rows($qsqlsubject);
	echo "<input type='hidden' name='totalsubject' id='totalsubject' value='$numrows'>";
	$icount=0;
	$totintamt = 0;
	while($rssubject = mysqli_fetch_array($qsqlsubject))
	{
		$sqlexam_result = "SELECT * FROM exam_result LEFT JOIN exam ON exam_result.examid=exam.examid  WHERE exam.examtype='$_GET[examtype]' AND exam_result.subjectid='$rssubject[subjectid]' AND exam.semester='$_GET[semesterid]' AND exam.courseid='$_GET[courseid]'";
		$qsqlexam_result = mysqli_query($con,$sqlexam_result);
		$rsexam_result = mysqli_fetch_array($qsqlexam_result);
		
		echo "<th><input tabindex='$tabindex' type='text' name='intmaxmark[$rssubject[subjectid]]'  id='intmaxmark[$rssubject[subjectid]]' style='width:100px;' value='$rsexam_result[maxinternalmark]' readonly onchange='calculateintgrandtot()' readonly><input type='hidden' name='subjectidz[$icount]' id='subjectidz[$icount]' value='$rssubject[subjectid]'></th>";
		$icount=$icount+1;
		$tabindex=$tabindex+1;
		$totintamt = $totintamt + $rsexam_result['maxinternalmark'];
	}
	?> 
		<th><input type="text"  style="width:100px;"  name="maxintgrandtot" id="maxintgrandtot" readonly value="<?php echo $totintamt; ?>"></th>
		<th></th>
		<th></th>
	</tr>
<?php
}
?>
<?php
if($_GET['examtype'] == "Semester")
{	
?>					
	<tr>
		<th>Internal max marks</th>
	<?php
	$icount=0;
	$totintamt = 0; 
	$sqlsubject = "SELECT * FROM subject WHERE status='Active' AND courseid='$_GET[courseid]' AND semesterid='$_GET[semesterid]'";
	$qsqlsubject = mysqli_query($con,$sqlsubject);
	$numrows = mysqli_num_rows($qsqlsubject);
	echo "<input type='hidden' name='totalsubject' id='totalsubject' value='$numrows'>";
	while($rssubject = mysqli_fetch_array($qsqlsubject))
	{
		$sqlexam_result = "SELECT * FROM exam_result LEFT JOIN exam ON exam_result.examid=exam.examid  WHERE exam.examtype='$_GET[examtype]' AND exam_result.subjectid='$rssubject[subjectid]' AND exam.semester='$_GET[semesterid]' AND exam.courseid='$_GET[courseid]'";
		$qsqlexam_result = mysqli_query($con,$sqlexam_result);
		$rsexam_result = mysqli_fetch_array($qsqlexam_result);
		
		echo "<th><input tabindex='$tabindex' type='text' name='intmaxmark[$rssubject[subjectid]]' style='width:100px;' id='intmaxmark[$rssubject[subjectid]]'  value='$rsexam_result[maxinternalmark]'   onkeyup='calculateintgrandtot()'><input type='hidden' name='subjectidz[$icount]' id='subjectidz[$icount]' value='$rssubject[subjectid]'></th>";
		$icount=$icount+1;
		 $tabindex=$tabindex+1;
		 
		$totintamt = $totintamt + $rsexam_result['maxinternalmark'];
	}
	?>
		<th><input type="hidden" value="0" name="maxintgrandtot" id="maxintgrandtot" readonly value="<?php echo $totintamt; ?>"></th>
		<th></th>
		<th></th>
	</tr>
<?php
}
?>	
<?php
if($_GET['examtype'] == "Semester")
{
?>
			<tr>
			<th>Externals max marks</th>
			<?php
				$icount=0;
				$totintamt = 0; 
				$sqlsubject = "SELECT * FROM subject WHERE status='Active' AND courseid='$_GET[courseid]' AND semesterid='$_GET[semesterid]'";
				$qsqlsubject = mysqli_query($con,$sqlsubject);
				while($rssubject = mysqli_fetch_array($qsqlsubject))
				{	

		$sqlexam_result = "SELECT * FROM exam_result LEFT JOIN exam ON exam_result.examid=exam.examid  WHERE exam.examtype='$_GET[examtype]' AND exam_result.subjectid='$rssubject[subjectid]' AND exam.semester='$_GET[semesterid]' AND exam.courseid='$_GET[courseid]'";
		$qsqlexam_result = mysqli_query($con,$sqlexam_result);
		$rsexam_result = mysqli_fetch_array($qsqlexam_result);
		
echo "<th><input type='text' tabindex='$tabindex' name='extmaxmark[$rssubject[subjectid]]' style='width:100px;' id='extmaxmark[$rssubject[subjectid]]' value='$rsexam_result[maxextmark]' onkeyup='calculateextgrandtot()'><input type='hidden' name='subjectidzz[$icount]' id='subjectidzz[$icount]' value='$rssubject[subjectid]'></th>";
$icount=$icount+1; $tabindex=$tabindex+1;
$totintamt = $totintamt + $rsexam_result['maxinternalmark'];
				}
				?>
				<th><input type="text" style="width:100px;" name="maxextgrandtot" id="maxextgrandtot" readonly value="<?php echo $totintamt; ?>" ></th>
				<th></th>
				<th></th>
			</tr>
<?php
}
?>					
					
				</thead>
<tbody>
<?php
if($_GET['examtype'] != "")
{
					$sql = "SELECT * FROM student  where student.status <>'Deleted' AND courseid='$_GET[courseid]' AND semesterid ='$_GET[semesterid]'";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
$totabcamt = 0;
$totintamt = 0;
				echo "<input type='hidden' name='studentid[" . $rs['studentid']  . "]' value='$rs[studentid]'  style='width:100px;'>";
					
					echo "<tr>";
echo "<td>$rs[studentname]<br><b>Roll No.</b> $rs[rollno]</td>";
$sqlsubject = "SELECT * FROM subject WHERE status='Active' AND courseid='$_GET[courseid]' AND semesterid='$_GET[semesterid]'";
$qsqlsubject = mysqli_query($con,$sqlsubject);

while($rssubject = mysqli_fetch_array($qsqlsubject))
{
		$sqlexam_result = "SELECT * FROM exam_result LEFT JOIN exam ON exam_result.examid=exam.examid  WHERE exam.examtype='$_GET[examtype]' AND exam_result.subjectid='$rssubject[subjectid]' AND exam.semester='$_GET[semesterid]' AND exam.courseid='$_GET[courseid]' AND exam_result.studentid='$rs[studentid]' ";
		$qsqlexam_result = mysqli_query($con,$sqlexam_result);
		$rsexam_result = mysqli_fetch_array($qsqlexam_result);
	
	echo "<td>";
	echo "<input type='hidden' name='subjectid[" . $rs['studentid'] . "][$rssubject[0]]'  value='$rssubject[0]'>";
	if($_GET['examtype'] != "Semester")
	{
		echo "<input type='text' tabindex='$tabindex' readonly name='intmark[" . $rs['studentid'] . "][$rssubject[0]]' id='intmark[" . $rs['studentid'] . "][$rssubject[0]]'   style='width:100px;' value='$rsexam_result[scoredinternalmark]' required onkeyup='calculatemarks(" . $rs['studentid'] . ")'><input type='hidden' name='extmark[" . $rs['studentid'] . "][$rssubject[0]]'>";
		$tabindex=$tabindex+1;
	}
	if($_GET['examtype'] == "Semester")
	{
		echo "<input type='text' readonly tabindex='$tabindex' name='intmark[" . $rs['studentid'] . "][$rssubject[0]]' id='intmark[" . $rs['studentid'] . "][$rssubject[0]]' style='width:100px;' value='0' required onkeyup='calculatemarks(" . $rs['studentid'] . ")'  value='$rsexam_result[scoredinternalmark]' >";
		 $tabindex=$tabindex+1;
	}
	if($_GET['examtype'] == "Semester")
	{
		echo "<input type='text' readonly tabindex='$tabindex' name='extmark[" . $rs['studentid'] . "][$rssubject[0]]' id='extmark[" . $rs['studentid'] . "][$rssubject[0]]' style='width:100px;' onkeyup='calculateextmarks(" . $rs['studentid'] . ")' required  value='$rsexam_result[scoredextmark]' >";
		 $tabindex=$tabindex+1;
	}
	echo "</td>";
	$totintamt = $totintamt + $rsexam_result['scoredinternalmark'] + $rsexam_result['scoredextmark'];
	$totabcamt = $totabcamt + $rsexam_result['maxinternalmark'] + $rsexam_result['maxextmark'];
}

$totpercentage = ($totintamt * 100) / $totabcamt;

		if($totpercentage > 75)
		{
			$grade = "Distinction";
		}
		else if($totpercentage > 65)
		{
			$grade = "First Class";
		}
		else if($totpercentage > 35)
		{
			$grade  = "Second class";
		}
		else if($totpercentage <35)
		{
			$grade  = "Fail";
		}
 echo "<td><input type='hidden' name='totalint[" . $rs['studentid'] . "]' id='totalint[" . $rs['studentid'] . "]'  value='0'><input type='text' name='total[" . $rs['studentid'] . "]' id='total[" . $rs['studentid'] . "]'  style='width:100px;background-color:white;color:black;' readonly value='$totintamt'></td>
 <td><input type='text' name='percentage[" . $rs['studentid'] . "]' id='percentage[" . $rs['studentid'] . "]'  style='width:100px;background-color:white;color:black;' readonly value='$totpercentage%'></td>
 <td><input type='text' readonly value='$grade' name='grade[" . $rs['studentid'] . "]' id='grade[" . $rs['studentid'] . "]'  style='width:200px;background-color:white;color:black;' readonly></td>";
 
						echo "</tr>";
					}
}					
?>
</table>
				
				</div>
							
				</form>
	  </div>
	</div>
</div>
	<!-- //register -->


	<?php
include("footer.php")
?><script>
function loadsubject(courseid,semesterid)
{
	window.location='examresultexam.php?courseid='+ courseid +'&semesterid='+semesterid;
}
function loadexamtype(courseid,semesterid,examtype)
{
	window.location='examresultexam.php?courseid='+ courseid +'&semesterid='+semesterid+'&examtype='+examtype;
}
</scripT>
<script>
function validateform()
{
	if(document.frm.courseid.value == "")
	{
		alert("Kindly select the course ..");
		return false;
	}
	if(document.frm.semesterid.value == "")
	{
		alert("Kindly select the semester ..");
		return false;
	}
	if(document.frm.examtype.value == "")
	{
		alert("Kindly select the exam type ..");
		return false;
	}
}

// onchange='calculateintgrandtot()' onkeyup='calculateintgrandtot()'  onchange='calculateextgrandtot()' onkeyup='calculateextgrandtot()'
//maxintgrandtot maxextgrandtot

function calculateintgrandtot()
{
	var i=0;
	var totmark = 0;
	for(i=0; i<document.getElementById("totalsubject").value; i++ )
	{
		totmark = totmark + parseFloat(document.getElementById("intmaxmark["+ document.getElementById("subjectidz["+ i +"]").value +"]").value);
	}
	document.getElementById("maxintgrandtot").value= totmark;
}
function calculateextgrandtot()
{
	var i=0;
	var totmark = 0;
	for(i=0; i<document.getElementById("totalsubject").value; i++ )
	{
		totmark = totmark + parseFloat(document.getElementById("extmaxmark["+ document.getElementById("subjectidz["+ i +"]").value +"]").value);
	}	
	document.getElementById("maxextgrandtot").value= totmark + parseFloat(document.getElementById("maxintgrandtot").value);
}

function calculatemarks(studentid)
{
	//extmaxmark intmaxmark intmaxmark extmaxmark
	var i=0;
	var totmark = 0;
	for(i=0; i<document.getElementById("totalsubject").value; i++ )
	{
		//alert(document.getElementById("subjectid["+ i +"]").value);
		totmark = totmark + parseFloat(document.getElementById("intmark["+ studentid +"]["+ document.getElementById("subjectidz["+ i +"]").value +"]").value);
	}
	document.getElementById("total["+ studentid +"]").value= totmark;
	document.getElementById("totalint["+ studentid +"]").value= totmark;
	var maxmark = document.getElementById("total["+ studentid +"]").value;
	var maxintgratot = document.getElementById("maxintgrandtot").value;
	calculatepercentage(studentid,maxintgratot,totmark);
}
function calculateextmarks(studentid)
{
	//extmaxmark intmaxmark intmaxmark extmaxmark	
	var i=0;
	var totmark = 0;
	var tottotmark = 0;
	for(i=0; i<document.getElementById("totalsubject").value; i++ )
	{
		//alert(document.getElementById("subjectid["+ i +"]").value);
		totmark = totmark + parseFloat(document.getElementById("extmark["+ studentid +"]["+ document.getElementById("subjectidz["+ i +"]").value +"]").value);
	}
	tottotmark = totmark + parseFloat(document.getElementById("totalint["+ studentid +"]").value);
	document.getElementById("total["+ studentid +"]").value= tottotmark;
	var maxextgratot  = document.getElementById("maxextgrandtot").value;
	calculatepercentage(studentid,maxextgratot,tottotmark);
}
function calculatepercentage(studentid,maxmark,scoredmark)
{
	//percentage calculation
	var percentagescore = scoredmark*100/maxmark;
	document.getElementById("percentage[" + studentid + "]").value = percentagescore.toFixed(2);
		if(percentagescore > 75)
		{
			document.getElementById("grade[" + studentid + "]").value = "Distinction";
		}
		else if(percentagescore > 65)
		{
			document.getElementById("grade[" + studentid + "]").value = "First Class";
		}
		else if(percentagescore > 35)
		{
			document.getElementById("grade[" + studentid + "]").value = "Second class";
		}
		else if(percentagescore <35)
		{
			document.getElementById("grade[" + studentid + "]").value = "Fail";
		}
}
</script>