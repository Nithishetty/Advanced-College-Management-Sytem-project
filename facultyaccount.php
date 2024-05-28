<?php
include("header.php");
if(!isset($_SESSION["facultyid"]))
{
	echo "<script>window.location='facultylogin.php';</script>";
}
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-6 book-appointment">
				<h3>Faculty Account</h3>
				<form action="" method="post">
				
				</form>
			</div>
			
		</div>
	</div>
	<!-- //register -->

<?php
include("footer.php")
?>