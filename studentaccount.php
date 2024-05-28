<?php
include("header.php");
if(!isset($_SESSION["studentid"]))
{
	echo"<script>window.location='studentlogin.php';</script>";
}


?>
<div class="news-section" id="news">
		<div class="container">
			<h3 class="tittle-w3l">Student Dashboard
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
<?php if($rsstudentprofile['status'] == "Active") {?>
			<div class="news-grids-w3l">
				<div class="col-xs-6 news-grid">
					<a href="attendanceview.php">
						<img src="images/attendancereport.jpg" class="img-responsive" alt="" style="height: 200px;">
					</a>
					<div class="news-text">
						<div class="news-events-agile">
							<h5>
								<a href="attendanceview.php">View Attendance Report</a>
							</h5>
							<div class="post-img">
								<a href="attendanceview.php" >
									<ul>
										<li class="text-white">
											<span class="fa fa-share" aria-hidden="true"></span>
										</li>
									</ul>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 news-grid">
					<a href="syllabusplan.php">
						<img src="images/UPSEE_Syllabus_2018_thumbnail.jpg" class="img-responsive" alt="" style="height: 200px;">
					</a>
					<div class="news-text">
						<div class="news-events-agile event-colo1">
							<h5>
								<a href="syllabusplan.php">View Syllabus Plan</a>
							</h5>
							<div class="post-img">
								<a href="syllabusplan.php">
									<ul>
										<li>
											<span class="fa fa-share" aria-hidden="true"></span>
										</li>
									</ul>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="news-grids-w3l-2">
				<div class="col-xs-6 news-grid">
					<a href="examresultview.php">
						<img src="images/MAT-2021-result.jpeg" class="img-responsive" alt="" style="height: 200px;">
					</a>
					<div class="news-text">
						<div class="news-events-agile event-colo4">
							<h5>
								<a href="examresultview.php">View Exam Result</a>
							</h5>
							<div class="post-img">
								<a href="examresultview.php">
									<ul>
										<li>
											<span class="fa fa-share" aria-hidden="true"></span>
										</li>
									</ul>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 news-grid">
					<a href="displaynotes.php">
						<img src="images/Book-icons.webp" class="img-responsive" alt="" style="height: 200px;">
					</a>
					<div class="news-text">
						<div class="news-events-agile event-colo3">
							<h5>
								<a href="displaynotes.php">Notes</a>
							</h5>
							<div class="post-img">
								<a href="displaynotes.php">
									<ul>
										<li>
											<span class="fa fa-share" aria-hidden="true"></span>
										</li>
									</ul>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div><br>
			</div>
			<div class="news-grids-w3l">
				<div class="col-xs-6 news-grid">
					<a href="timetableview.php">
						<img src="images/662001778.jpg" class="img-responsive" alt="" style="height: 200px;">
					</a>
					<div class="news-text">
						<div class="news-events-agile">
							<h5>
								<a href="timetableview.php">View Time Table</a>
							</h5>
							<div class="post-img">
								<a href="timetableview.php">
									<ul>
										<li class="text-white">
											<span class="fa fa-share" aria-hidden="true"></span>
										</li>
									</ul>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 news-grid">
					<a href="feesreport.php">
						<img src="images/UK-Tuition-fees-Mobile.jpg" class="img-responsive" alt="" style="height: 200px;">
					</a>
					<div class="news-text">
						<div class="news-events-agile event-colo1">
							<h5>
								<a href="feesreport.php">View Fees Report</a>
							</h5>
							<div class="post-img">
								<a href="feesreport.php">
									<ul>
										<li>
											<span class="fa fa-share" aria-hidden="true"></span>
										</li>
									</ul>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
<?php } ?>
		</div>
	</div>

	<?php
include("footer.php")
?>