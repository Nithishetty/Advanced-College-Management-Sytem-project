<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "UPDATE feedback SET status='Deleted' WHERE feedbackid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
			echo "<SCRIPT>alert('Feedback record deleted successfully...');</SCRIPT>";
	}
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-12 book-appointment">
				<h3>View Feedbacks</h3>
<?php
$sql = "SELECT * FROM feedback LEFT JOIN student ON feedback.studentid = student.studentid LEFT JOIN faculty ON faculty.facultyid = feedback.facultyid LEFT JOIN subject ON feedback.subjectid=subject.subjectid LEFT JOIN course ON course.courseid=student.courseid where feedback.status <>'Deleted'";
if($_GET['feedbacktype'] == "faculty")
{
	$sql = $sql . " AND feedback.facultyid != '0' AND feedback.subjectid ='0' ";
}
if($_GET['feedbacktype'] == "subject")
{
	$sql = $sql . " AND feedback.facultyid != '0' AND feedback.subjectid !='0' ";
}
if($_GET['feedbacktype'] == "others")
{
	$sql = $sql . " AND feedback.facultyid = '0' AND feedback.subjectid ='0' ";
}
$sql = $sql . " ORDER BY feedback.feedbackid DESC";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
while($rs = mysqli_fetch_array($qsql))
{
?>						
<div class="container">
  <div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
			<?php 
			if(file_exists("imgstudent/$rs[13]"))
			{
				$img = "imgstudent/".$rs[13]; 
			}
			else
			{
				$img = "images/noimage.png";
			}
			?>
    		<img class="media-object" src="<?php echo $img; ?>" style="width:250px;height:200px;">
  		</a>
  		<div class="media-body">
<h4 class="media-heading"><?php echo $rs['studentname'] . " (Roll No. $rs[rollno])"; ?> | Course: <?php echo $rs['course']; ?></h4>
<?php
if($rs[2] != 0)
{
?>
<span style="text-align:right;padding:5px;"><b>Faculty :</b> <?php echo $rs['facultyname']; ?></span>
<?php
}
?>
<?php
if($rs[3] != 0)
{
?>
<span style="text-align:right;padding:5px;"><b>Subject :</b> <?php echo $rs['subject']; ?></span>
<?php
}
?>	
          <p style="min-height: 140px;color:black;"><?php echo $rs['feedback']; ?> </p>
			<ul class="list-inline list-unstyled">
				<li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo date("d-M-Y",strtotime($rs['feedbackdate'])); ?> </span></li>
				<li>|</li>
				<li>
				   <span class="glyphicon glyphicon-star"></span>Ratings: <?php echo $rs['rating']; ?>
				</li>				
				<li>|</li>
				<li>
				   <span class="glyphicon glyphicon-star"></span><?php echo $rs['rating']; ?>
				</li>
				
			</ul>
       </div>
    </div>
  </div>
  
 </div>				
<?php
}
?>
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