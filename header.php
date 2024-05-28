<?php
session_start();
//####################################################
$_SESSION['collegename'] = "BMS COLLEGE OF COMMERCE & MANAGEMENT (BMSCCM)";
$_SESSION['collegelogo'] = "";#add your college logo here
$_SESSION['collegeaddress'] = "No-97, Kavi Lakshmisha Road, V.V. Puram, Bangalore - 560 004 Karnataka, India.";
$_SESSION['collegeemail'] = "principal.bmsccm@gmail.com";
$_SESSION['collegecontactno'] = "080-26610174";
//####################################################
//####################################################
/*
$_SESSION['collegename'] = "24X7CMS";
$_SESSION['collegelogo'] = "images/logo.png";
$_SESSION['collegeaddress'] = "24x7college College, KSCD road,malaraya, Bangalore – 574227.";
$_SESSION['collegeemail'] = "info@cms24x7college.com";
$_SESSION['collegecontactno'] = "080-236531";
*/
//####################################################
$dt = date("Y-m-d");
$dttim = date("Y-m-d H:i:s");
error_reporting(0);
include("dbconnection.php");
if(isset($_SESSION['studentid']))
{
	$sqlstudentprofile = "SELECT student.*,course.course,course.coursedescription FROM student LEFT JOIN course ON course.courseid=student.courseid where student.studentid='$_SESSION[studentid]' ";
	$qsqlstudentprofile = mysqli_query($con,$sqlstudentprofile);
	$rsstudentprofile = mysqli_fetch_array($qsqlstudentprofile);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title><?php echo $_SESSION['collegename']; ?> - College Management System</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>


	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js -->
	
	
	<link rel="stylesheet" type="text/css" href="css/slicebox.css" />
	<!-- for banner-->
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<!-- //custom-theme files-->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //custom-theme files-->
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //fonts -->

</head>

<body>
<?php
if(basename($_SERVER['PHP_SELF']) =="index.php" || basename($_SERVER['PHP_SELF']) =="aboutus.php" || basename($_SERVER['PHP_SELF']) =="contactus.php")
{
?>	
     <!--banner-->
	<div class="banner-w3l" id="home">
		<div class="header-main-agile" style="top: 0px;">
			<div class="header-right-w3l">
				<div class="container">
					<ul>
						<li style='color:black;'>
							<span class="fa fa-home" aria-hidden="true"></span> <?php echo $_SESSION['collegeaddress'] ; ?>
						</li>
						<li style='color:black;'>
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
							<?php echo $_SESSION['collegeemail'] ; ?>
						</li>
						<li style='color:black;'>
							<span class="fa fa-phone" aria-hidden="true"></span> <?php echo $_SESSION['collegecontactno'] ; ?>
						</li>
					</ul>
				</div>
			</div>
			<!-- navigation -->
			<div class="nav-links">
				<div class="container">
	<?php
	include("menu.php");
	?>
				</div>
			</div>
			<!-- /navigation -->
		</div>

		<div class="wrapper">
			<ul id="sb-slider" class="sb-slider">
				<li>
					<a href="#">
						#add your college logo here<img src="" alt="image1"  style="max-width: 1500px; height:600px;"/>
					</a>
					<div class="sb-description">
						<h3 style="font-size: 50px;"><?php echo $_SESSION['collegename']; ?></h3>
					<p style="font-size: 25px;">College Management System</p>
						<i></i>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/Alvas6.jpg" alt="image2"  style="max-width: 1500px; height:600px;"/>
					</a>
					<div class="sb-description">
						<h3 style="font-size: 50px;"><?php echo $_SESSION['collegename']; ?></h3>
						<p style="font-size: 25px;">College Management System</p>
						<i></i>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/alvas5.jpg" alt="image1"  style="max-width: 1500px; height:600px;" />
					</a>
					<div class="sb-description">
						<h3 style="font-size: 50px;"><?php echo $_SESSION['collegename']; ?></h3>
						<p style="font-size: 25px;">College Management System</p>
						<i></i>
					</div>
				</li>
			</ul>
			<div id="nav-arrows" class="nav-arrows">
				<a href="#">Next</a>
				<a href="#">Previous</a>
			</div>

		</div>		
		<!-- /wrapper -->
	</div>
	<!-- //banner --> 
<?php
}
else
{
?>
	  			<div class="nav-links">
				<div class="container">
	<?php
	include("menu.php");
	?>
				</div>
			</div>
<?php
}
?>
