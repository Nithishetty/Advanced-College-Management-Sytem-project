<?php
include("header.php");
?>
	<div class="news-section" id="news">
		<div class="container">
			
			
			
<div class="col-md-12 book-appointment"		>

<h3 class="tittle-w3l">View Notes
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
<form method="get" action="">		  
	 <div class="col-md-4" id='divsemseter'>
		<p>Semester</p>
<?php
$sqlsemseter= "SELECT * FROM subject WHERE courseid='$_SESSION[courseid]'  GROUP BY semesterid ORDER BY semesterid";	
$qsqlsemester = mysqli_query($con,$sqlsemseter);
?>
<select name="semesterid" onchange="loadsubject(<?php echo $_SESSION['courseid']; ?>,this.value)" >
	<option value=''>Select</option>
	<?php
while($rssemester = mysqli_fetch_array($qsqlsemester))
{

	//if(isset($_SESSION["semesterid"]))
	{
		if($rssemester['semesterid'] == $_GET['semesterid'])
		{
			echo "<option value='$rssemester[semesterid]' selected>$rssemester[semesterid]</option>";
		}
		else
		{
			echo "<option value='$rssemester[semesterid]' >$rssemester[semesterid]</option>";
		}
	}
	//else
	{
	//	echo "<option value='$rssemester[semesterid]'>$rssemester[semesterid]</option>";
	}
}
	?>
</select>
	</div>
	  <div class="col-md-4"  id='divsubject'>

	<p>Subject</p>
<select name="subjectid">
		<option value=''>Select</option>
		<?php
		$sqlsubject="SELECT * From subject WHERE status='Active' AND courseid='$_SESSION[courseid]' AND semesterid='$_GET[semesterid]'";
		
	if($_GET['semesterid'] != "")
	{
		if($rssemester['semesterid'] == $_GET['semesterid'])
		{
		echo "<option value='$rssemester[semesterid]' selected>$rssemester[semesterid]</option>";
		}
	}
	else if(isset($_SESSION["semesterid"]))
	{
		echo "<option value='$rssemester[semesterid]' >$rssemester[semesterid]</option>";
	}
	else
	{
		echo "<option value='$rssemester[semesterid]'>$rssemester[semesterid]</option>";
	}
		
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
			

	  <div class="col-md-3">
				<p>&nbsp;</p>
				<input type="submit" name="submit" value="Filter records" class='form-control' >
	</div>			
</form>	
</div>	
			
			
			<div class="news-grids-w3l">
				
	
	
<?php
	$sql= "SELECT * FROM notes LEFT JOIN subject ON notes.subjectid = subject.subjectid LEFT JOIN course on subject.courseid = course.courseid where notes.status <>'Deleted'";
	
	if($_GET['semesterid'] != "")
	{
		$sql = $sql. " AND subject.semesterid='$_GET[semesterid]'";
	}
	else if(isset($_SESSION["semesterid"]))
	{
		$sql = $sql. " AND subject.semesterid='$_SESSION[semesterid]'";
	}
	if($_GET['subjectid'] !="")
	{
		$sql = $sql. " AND notes.subjectid='$_GET[subjectid]'";
	}
	//echo $sql;
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs=mysqli_fetch_array($qsql))
	{
?>
				<div class="col-xs-12 news-grid" style="border-style: outset;">
					
					<div class="news-text">
						<div class="news-events-agile event-colo1">
							<h5>
								<a href="displaynotesdetailed.php?notesid=<?php echo $rs['notesid']; ?>" ><?php echo $rs['notestitle']; ?></a>	
							</h5>
							<div class="post-img">
								<a href="#" data-toggle="modal" data-target="#myModal">
									<ul>
										<li>
											<span class="fa fa-comments" aria-hidden="true"></span>
										</li>
										<li>
											<span class="fa fa-heart" aria-hidden="true"></span>
										</li>
										<li>
											<span class="fa fa-share" aria-hidden="true"></span>
										</li>
									</ul>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="detail-bottom">
						
							<p><?php echo $rs['notes']; ?></p>
							<hr>
							
	<table>
	<tr>
		<td>
		<a href='displaynotesdetailed.php?notesid=<?php echo $rs['notesid']; ?>' ><input type='submit' name='submit' value='View discussion Board' class='form-control' style='width:200px;'></a>
		</td>
		<td>
		
		<?php
		if(file_exists('notesfile/$rs[document]'))
		{
		?>
		<a href='notesfile/<?php echo $rs['document']; ?>' download ><input type='submit' name='submit' value='Download notes' class='form-control' style='width:200px;'></a>
		<?php
		}
		?>
		</td>
	</tr>
	</table>	<br>	
						</div>
					</div>
				</div>
<?php	
	}
	?>			
					
					
				<div class="clearfix"></div>
			</div>
			</div>
	</div>
	<!-- //news -->


<?php
include("footer.php");
?>
<script>
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