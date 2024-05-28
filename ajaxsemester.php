<?php
include("dbconnection.php");
?>
<p>Semester</p>
<select name="semesterid" onchange="loadsubject(courseid.value,this.value)" >
	<option value=''>Select</option>
	<?php
$sqlsemseter= "SELECT * FROM subject WHERE courseid='$_GET[course]'  GROUP BY semesterid ORDER BY semesterid";	
$qsqlsemester = mysqli_query($con,$sqlsemseter);
while($rssemester = mysqli_fetch_array($qsqlsemester))
{
		if($rssemester['courseid'] == $rsedit['courseid'])
		{
			echo "<option value='$rssemester[semesterid]' selected>$rssemester[semesterid]</option>";
		}
		else
		{
			echo "<option value='$rssemester[semesterid]'>$rssemester[semesterid]</option>";
		}
}
	?>
</select>