<?php
include("dbconnection.php");
?>
<p>Subject</p>
<select name="subjectid" id="subjectid">
		<option value="">Select</option>
		<?php
		$sqlsubject="SELECT * From subject WHERE status='Active' AND courseid='$_GET[course]' AND semesterid='$_GET[semester]'";
		$qsqlsubject=mysqli_query($con,$sqlsubject);
		echo mysqli_error($con);
		while($rssubject=mysqli_fetch_array($qsqlsubject))
		{
			echo "<option value='$rssubject[subjectid]'>$rssubject[subject] </option>";
		}
		?>
</select>