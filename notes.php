<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand() . $_FILES["document"]["name"];
	move_uploaded_file($_FILES["document"]["tmp_name"],"notesfile/".$filename);
	
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		$sql = "UPDATE notes SET subjectid='$_POST[subjectid]',notes='$_POST[notes]',notestitle='$_POST[notestitle]',document='$filename' WHERE notesid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
	    echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Notes record updated successfully..');</script>";
		}
	}
	else
  {
	$sql = "INSERT INTO notes(subjectid,notes,notestitle,document,status) VALUES('$_POST[subjectid]','$_POST[notes]','$_POST[notestitle]','$filename','Active')";
	$qsql = mysqli_query($con,$sql);
    echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Notes record inserted successfully..');</script>";
	}
  }
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM notes WHERE notesid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
		
		
<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return validateform()">
<div class="col-md-12 book-appointment">
<h3>Notes form</h3>

	  
	 <div class="col-md-3">
		<p>Course</p>
		<select name="courseid" onchange="loadsemseter(this.value)">
				<option value=''>Select course</option>
				<?php
				$sqlcourse ="SELECT * From course WHERE status='Active'";
				$qsqlcourse=mysqli_query($con,$sqlcourse);
				while($rscourse=mysqli_fetch_array($qsqlcourse))
				{
					echo"<option value='$rscourse[courseid]'>$rscourse[course]</option>";
				}
				?>
		</select>
	</div>
	
	<div class="col-md-2" id='divsemseter'>
	<p>Semester</p>
	<select name="semesterid" onchange="loadsubject(courseid.value,this.value)" >
	<option value=''>Select</option>
	<?php
	$arr = array("1","2","3","4","5","6","7","8");
	foreach($arr as $val)
	{
		if($val == $rsedit['status'])
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
	
	  <div class="col-md-3"  id='divsubject'>
				<p>Subject</p>
				<select name="subjectid" id="subjectid">
						<option value=''>Select</option>
						<?php
						$sqlsubject="SELECT * From subject WHERE status='Active'";
						$qsqlsubject=mysqli_query($con,$sqlsubject);
						while($rssubject=mysqli_fetch_array($qsqlsubject))
						{
							echo"<option value='$rssubject[subjectid]'>$rssubject[subject]</option>";
						}
						?>
				</select>
	</div>
	<div class="col-md-4">
	  <p>Document</p>
			<input type="file" name="document" value="<?php echo $rsedit['document'];?>" />
	</div>	
	
	  <div class="col-md-12">
		<p>Notes Title</p>
			<input type="text" name="notestitle" value="<?php echo $rsedit['notestitle'];?>" placeholder="Enter notes details"  />
		</div>	
		<div class="col-md-12">
		<p>Notes description</p>
			<textarea class='form-control' id="editor"  name="notes" placeholder="Enter notes content"  ><?php echo $rsedit['notes'];?></textarea>
		</div>
							
							
		<script src="richtexteditor/ckeditor.js"></script>
							
		<script>
			ClassicEditor
				.create( document.querySelector( '#editor' ) )
				.catch( error => {
					console.error( error );
				} );
		</script>
</div>
		<div class="col-md-12 book-appointment">
			<div class="col-md-4 book-appointment">
				&nbsp;
			</div>
			<div class="col-md-4 book-appointment">
					<input type="submit" name="submit" value="Publish">
			</div>
			<div class="col-md-4 book-appointment">
				&nbsp;
			</div>
		</div>
</form>			
		</div>
	</div>
	<!-- //register -->

	<!-- //register -->
	<?php
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
<script>
function validateform()
	{
		if(document.frm.courseid.value == "")
		{
			alert("Kindly select the course ..");
			return false;
		}
		else if(document.frm.semesterid.value == "")
		{
			alert(" Kindly select the semester ..");
			return false;
		}
	    else if(document.getElementById("subjectid").value == "")
		{
			alert("Kindly select the subject ..");
			return false;
		}
		else if(document.frm.notestitle.value == "")
		{
			alert(" Notes title should not be empty ..");
			return false;
		}
		else if(document.getElementById("editor").value == "<p>&nbsp;</p>")
		{
			alert(" Notes description should not be empty ..");
			return false;
		}
		else
		{
			return true;
		}
	}
	</script>