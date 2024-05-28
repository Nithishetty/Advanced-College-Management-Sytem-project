<?php
include("header.php");
if(!isset($_SESSION['adminid']))
{
	echo"<script>window.location='adminlogin.php';</script>";
}
?>
	<!--grids -->
	<div class="popular-wthree" id="about">
		<div class="container">
			<h3 class="tittle-w3l">Admin Dashboard
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			
			
			<div class="col-xs-4 popular-wthree-grid">
				<img src="images/admin.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Admin records<br>
					<?php
					$sql = "SELECT * FROM admin WHERE status='Active'";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
			
			
			<div class="col-xs-4 popular-wthree-grid">
				<img src="images/attendance.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Attendance records<br>
					<?php
					$sql="SELECT * FROM attendance WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
			<div class="col-xs-4 popular-wthree-grid">
				<img src="images/course.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of  Course records<br>
					<?php
					$sql="SELECT * FROM course WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
			<div class="col-xs-4 popular-wthree-grid">
				<img src="images/discussion.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of  Discussion records<br>
					<?php
					$sql="SELECT * FROM discussion WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
			<div class="col-xs-4 popular-wthree-grid">
				<img src="images/discussionreply.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of  Discussion reply records<br>
					<?php
					$sql="SELECT * FROM discussion_reply WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
			<div class="col-xs-4 popular-wthree-grid">
				<img src="images/exam.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Exam records<br>
					<?php
					$sql="SELECT * FROM exam WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
                 <div class="col-xs-4 popular-wthree-grid">
				<img src="images/examresult.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Exam result records<br>
					<?php
					$sql="SELECT * FROM exam_result WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
			      <div class="col-xs-4 popular-wthree-grid">
				<img src="images/faculty.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Faculty records<br>
					<?php
					$sql="SELECT * FROM faculty WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>           
				 <div class="col-xs-4 popular-wthree-grid">
				<img src="images/feedback.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Feedback records<br>
					<?php
					$sql="SELECT * FROM feedback WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
			<div class="col-xs-4 popular-wthree-grid">
				<img src="images/notes.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Notes records<br>
					<?php
					$sql="SELECT * FROM notes WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
			<div class="col-xs-4 popular-wthree-grid">
				<img src="images/student.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Student records<br>
					<?php
					$sql="SELECT * FROM student WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
                <div class="col-xs-4 popular-wthree-grid">
				<img src="images/subject.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Subject records<br>
					<?php
					$sql="SELECT * FROM subject WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>
                <div class="col-xs-4 popular-wthree-grid">
				<img src="images/timetable.jpg" class="img-responsive" alt="" style="height:350px;"  />
				<div class="popular-wthree-text">
					<h5>Number of Timetable records<br>
					<?php
					$sql="SELECT * FROM timetable WHERE status='Active'";
					$qsql=mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</h5>
				</div>
			</div>

			
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //grids -->
<?php
include("footer.php");
?>