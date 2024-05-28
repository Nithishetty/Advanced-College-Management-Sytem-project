						<nav class="navbar navbar-inverse">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php" style="padding: 10px 0 0;">
								<img src="<?php echo $_SESSION['collegelogo']; ?>" style="height: 60px;width: 200px;">
									<!--
								<h1>
									<span>C</span>MS<span>24</span>x7
								</h1>-->
							</a>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav link-effect">
								
								<?php
								if(isset($_SESSION['studentid']))
								{
								?>
								
		<li><a href="studentaccount.php" >Dashboard</a></li>
		
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Account
			  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<?php if($rsstudentprofile['status'] == "Active") {?>
			  <a class="dropdown-item" href="studentprofile.php">Profile</a><br>
			  	<?php } ?>
			  <a class="dropdown-item" href="studentchangepassword.php">Change Password</a><br>
			  <a class="dropdown-item" href="tc_request.php">TC Request</a>
			</div>
		</li>
		<?php if($rsstudentprofile['status'] == "Active") {?>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Exam		  
			  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>		  
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="examview.php">Exam schedule</a><br>
			  <a class="dropdown-item" href="examresultview.php">Exam Result</a>
			  
			</div>
		</li>
		  
		<li><a href="feedback.php" >Feedback</a></li>

		<li><a href="displaynotes.php" >Notes</a></li>

		<li><a href="timetableview.php" >TimeTable</a></li>
		
		<li><a href="feesreport.php" >Fee Payment</a></li>

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Report
			  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  	<a class="dropdown-item" href="attendanceview.php">Attendance Report</a><br>
			  	<a class="dropdown-item" href="syllabusplan.php">Syllabus Plan</a><br>
				<a class="dropdown-item"  href="feespaymentreport.php" >Fees Payment Report</a>	<br>		  
			</div>
		</li>
	<?php } ?>
				<li>
					<a href="logout.php" >Logout</a>
				</li>
		</div>
	  </li>
								<?php
								}						
                             else if(isset($_SESSION['facultyid']))
							 {
							 ?>
								<li>
									<a href="facultyaccount.php" >Main</a>
								</li>
								 <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Account
		  
		  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		  
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="facultyprofile.php">Profile</a><br>
		  <a class="dropdown-item" href="facultychangepassword.php">Change Password</a>
		</div>
	  </li>
	
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Attendance
		  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="attendance.php">Add Attendance</a><br>
		  <a class="dropdown-item" href="attendancestudentattendance.php">View Attendance</a>		  
		</div>
	  </li>
	  
	  <li>
		<a href="discussionview.php" >Discussion</a>
								</li>
								<li>
		<a href="feedbackview.php" >View feedback</a>
								</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Exam
		  
		  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		  
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="exam.php">Exam Schedule</a><br>
		  <a class="dropdown-item" href="examview.php">View Exam Schedule</a><br>
		  <a class="dropdown-item" href="examresultexam.php">View Exam result</a><br>
         		  
		</div>
	  </li>
	   <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Notes
		  
		  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		  
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="notes.php">Add Notes</a><br>
		  <a class="dropdown-item" href="notesview.php">View Notes</a>
		  
		</div>
	  </li>
	  
	  <li><a href="syllabusplan.php" >Syllabus plan</a></li>
	  
	  <li><a href="studentview.php" >Student</a></li>
	  
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		 TimeTable
		  
		  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		  
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="timetable.php">Add TimeTable</a><br>
		  <a class="dropdown-item" href="timetableview.php">View TimeTable</a>
		  
		</div>
	  </li>
	  

		<li>
			<a href="logout.php" >Logout</a>
		</li>
                             <?php								
							 }
							 else if(isset($_SESSION['adminid']))
							 {
							 ?>
	<li><a href="dashboard.php" >Dashboard</a></li>
 
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Account
		  
		  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		  
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="adminprofile.php">Profile</a><br>
		  <a class="dropdown-item" href="adminchangepassword.php">Change Password</a>
		</div>
	  </li>
	
<?php
if($_SESSION['usertype'] == "Admin")
{
?>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Staff <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="admin.php">Add User</a><br>
		  <a class="dropdown-item" href="adminview.php">View User</a><br>
		  <a class="dropdown-item" href="facultyfom.php">Add Faculty</a><br>
		  <a class="dropdown-item" href="viewfaculty.php">View Faculty</a>
		</div>
	</li>
	  
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Settings<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>  
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="course.php">Add Course</a><br>
		  <a class="dropdown-item" href="courseview.php">View Course</a><br>
		  <a class="dropdown-item" href="subject.php">Add Subject</a><br>
		  <a class="dropdown-item" href="subjectview.php">View Subject</a><br>
		  <a class="dropdown-item" href="mailsetting.php">Mail Setting</a><br>
	   </div>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fees Master<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>  
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item"  href="viewfeesbalance.php" >Fees Balance Report</a>	<br>
			<a class="dropdown-item"  href="feespaymentreport.php" >Fees Payment Report</a>	<br>
		  	<a class="dropdown-item" href="feessettings.php">Add Fees Settings</a><br>
		  	<a class="dropdown-item" href="feessettingsview.php">View Fees Settings</a><br>
	   </div>
	</li>	
<?php
}
?>

	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	   Feedback
		  
		  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		  
		</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="feedbackview.php?feedbacktype=faculty">Feedback on Faculty</a><br>
				<a class="dropdown-item" href="feedbackview.php?feedbacktype=subject">Feedback on Subject</a><br>
				<a class="dropdown-item" href="feedbackview.php?feedbacktype=others">Others</a><br>
		   </div>
	  </li>		

		   
		   
  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Report
		  
		  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
		  
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 300px;">
		  <a class="dropdown-item" href="attendancestudentattendance.php">Attendance Report</a><br>
		  <a class="dropdown-item" href="discussionview.php">Discussion</a><br>
		  <a class="dropdown-item" href="examview.php">Exam schedule</a><br>
		  <a class="dropdown-item" href="examresultexam.php">View Exam result</a><br>
		    <a class="dropdown-item" href="notesview.php">View Notes</a><br>
			 <a class="dropdown-item" href="studentview.php?st=Pending">View Pending Student Account</a><br>
			 <a class="dropdown-item" href="studentview.php">View Student</a><br>
			 <a class="dropdown-item" href="timetableview.php">View TimeTable</a><br>
			 <a class="dropdown-item" href="transfercertificate.php">Transfer Certificate</a><br>
		</div>
	  </li>				  
								<li>
									<a href="logout.php" >Logout</a>
								</li>
                             <?php								
							 }	
								else
								{
								?>
								<li class="active">
									<a href="index.php">Home</a>
								</li>
								<li>
									<a href="aboutus.php" >About Us</a>
								</li>
								<li>
									<a href="studentlogin.php" >Student Login</a>
								</li>
								<li>
									<a href="student.php">Student Registration</a>
								</li>
								<li>
									<a href="facultylogin.php">Faculty Login</a>
								</li>
								<li>
									<a href="adminlogin.php" >Admin login</a>
								</li>
								
								<li>
									<a href="contactus.php" >Contact Us</a>
								</li>
								<?php
								}
								?>
							</ul>
						</div>
					</nav>