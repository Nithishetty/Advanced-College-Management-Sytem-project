	<!-- footer -->
	<footer><div class="copyright-agile">
			<div class="container">
				<p>© <?php echo date("Y"); ?> Copyright | <?php echo $_SESSION['collegename']; ?>. All rights reserved</p>
			</div>
		</div>
	</footer>
	<!-- //footer -->
	<!-- banner slider js -->
	<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
	<script type="text/javascript" src="js/jquery.slicebox.js"></script>
	<script type="text/javascript">
		$(function () {

			var Page = (function () {

				var $navArrows = $('#nav-arrows').hide(),
					$shadow = $('#shadow').hide(),
					slicebox = $('#sb-slider').slicebox({
						onReady: function () {

							$navArrows.show();
							$shadow.show();

						},
						orientation: 'r',
						cuboidsRandom: true
					}),

					init = function () {

						initEvents();

					},
					initEvents = function () {

						// add navigation events
						$navArrows.children(':first').on('click', function () {

							slicebox.next();
							return false;

						});

						$navArrows.children(':last').on('click', function () {

							slicebox.previous();
							return false;

						});

					};

				return {
					init: init
				};

			})();

			Page.init();

		});
	</script>
	<!-- //banner slider js -->

	<!-- //here starts scrolling icon -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling script -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling script -->
	<!-- //here ends scrolling icon -->

	<!-- scrolling script -->
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //scrolling script -->
	<!-- flexisel -->
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<!-- //flexisel -->
	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

</body>

</html>