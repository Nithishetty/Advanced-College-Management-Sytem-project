<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "UPDATE notes SET status='Deleted' WHERE notesid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Notes record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>Notes form</h3>
				

<form method="get" action="">
	  
	 <div class="col-md-3">
		<p>Course</p>
		<select name="courseid" onchange="loadsemseter(this.value)">
				<option value=''>Select course</option>
				<?php
				$sqlcourse ="SELECT * From course WHERE status='Active'";
				$qsqlcourse=mysqli_query($con,$sqlcourse);
				while($rscourse=mysqli_fetch_array($qsqlcourse))
				{
					if($rscourse['courseid'] == $_GET['courseid'])
					{
					echo"<option value='$rscourse[courseid]' selected>$rscourse[course]</option>";
					}
					else
					{
					echo"<option value='$rscourse[courseid]' >$rscourse[course]</option>";
					}
				}
				?>
		</select>
	</div>
	
	
		  
	 <div class="col-md-2" id='divsemseter'>
		<p>Semester</p>
<select name="semesterid" onchange="loadsubject(courseid.value,this.value)" >
	<option value=''>Select</option>
	<?php
$sqlsemseter= "SELECT * FROM subject WHERE courseid='$_GET[courseid]'  GROUP BY semesterid ORDER BY semesterid";	
$qsqlsemester = mysqli_query($con,$sqlsemseter);
while($rssemester = mysqli_fetch_array($qsqlsemester))
{
		if($rssemester['semesterid'] == $_GET['semesterid'])
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
	</div>
	
	  <div class="col-md-3"  id='divsubject'>
<p>Subject</p>
<select name="subjectid">
		<option value=''>Select</option>
		<?php
		$sqlsubject="SELECT * From subject WHERE status='Active' AND courseid='$_GET[courseid]' AND semesterid='$_GET[semesterid]'";
		$qsqlsubject=mysqli_query($con,$sqlsubject);
		echo mysqli_error($con);
		while($rssubject=mysqli_fetch_array($qsqlsubject))
		{
			if($rssubject['subjectid'] == $_GET['subjectid'])
			{
			echo"<option value='$rssubject[subjectid]' selected>$rssubject[subject] </option>";
			}
			else
			{
			echo"<option value='$rssubject[subjectid]'>$rssubject[subject] </option>";
			}
		}
		?>
</select>
				
	</div>
			

	<div class="col-md-3" >
				<p>&nbsp;</p>
				<input type="submit" name="submit" value="Filter records" class='form-control' >
	</div>			
</form>				
				<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Course</th>
						<th>Subject</th>
						<th>Notes Title</th>
						<th>Document</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM notes LEFT JOIN subject ON notes.subjectid = subject.subjectid LEFT JOIN course ON subject.courseid = course.courseid where notes.status <>'Deleted'";
					
					if($_GET['courseid'] !="")
					{
						$sql = $sql. " AND course.courseid='$_GET[courseid]'";
					}
					
					if($_GET['semesterid'] !="")
					{
						$sql = $sql. " AND subject.semesterid='$_GET[semesterid]'";
					}
					
					if($_GET['subjectid'] !="")
					{
						$sql = $sql. " AND notes.subjectid='$_GET[subjectid]'";
					}
					
					
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<tr>
							<td>$rs[course]</td>
							<td>$rs[subject]</td>
							<td>$rs[notestitle]</td>
							<td>";
						
						if(file_exists("notesfile/$rs[document]"))
						{
							echo "<a href='notesfile/$rs[document]'><input type='submit' name='submit' value='Download' class='form-control' ></a>";
						}
						else
						{
							echo "<input type='submit' name='submit' value='Download' class='form-control' style='background-color: grey;' >";
						}
						echo "</td>
							<td>$rs[status]</td>
							<td><a href='notes.php?editid=$rs[notesid]'>Edit</a> | <a href='notesview.php?delid=$rs[notesid]' onclick='return deleteconfirmation()'>Delete</a></td>
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
<script>
function loadsemseter(course)
{
	if (course == "") 
	{
        document.getElementById("divsemseter").innerHTML = "<select name='semesterid'><option value=''>Select Semester</option></select>";
        return;
    } 
	else 
	{ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divsemseter").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxsemester.php?course="+course,true);
        xmlhttp.send();
    }
}
//Load subject details
function loadsubject(course,semester)
{
	if (semester == "") 
	{
        document.getElementById("divsubject").innerHTML = "<select name='subjectid'><option value=''>Select Subject</option></select>";
        return;
    } 
	else 
	{ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divsubject").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxsubject.php?course="+course+"&semester="+semester,true);
        xmlhttp.send();
    }
}
</script>