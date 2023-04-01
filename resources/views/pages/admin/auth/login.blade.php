<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>KofeJob</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">

        <style>
            .login-header img{
                width: 200px;
            }
        </style>
	</head>		
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
					
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">					
					<div class="row">
						<div class="col-md-6 offset-md-3">
							
							<!-- Login Content -->
							<div class="account-content">
								<div class="align-items-center justify-content-center">
									<div class="login-right">
										<div class="login-header text-center">
											<a href="#"><img src="/assets/img/BrainX_logo.png" alt="logo" class="img-fluid"></a>
											<h3>Admin Panel</h3>
										</div>
										<form action="{{ route('admin.login') }}" method="POST">
                                            @csrf
											<div class="form-group form-focus">
												<input type="text" name="email" class="form-control floating">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="password" class="form-control floating">
												<label class="focus-label">Password</label>
											</div>	
                                            
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
											
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Content -->
								
						</div>
					</div>
				</div>
			</div>					
			<!-- /Page Content -->
   
			<!-- Footer -->	
			<footer class="footer">
				<div class="footer-top">
					<div class="container">

						<div class="row">
							<div class="col-md-3">
								<h2 class="footer-title">Office Address</h2>
								<div class="footer-address">
									<div class="off-address">
										<p class="mb-2">New York, USA (HQ)</p>
										<address class="mb-0">750 Sing Sing Rd, Horseheads, NY, 14845</address>
										<p>Call: <a href="#"><u>469-537-2410</u> (Toll-free)</a> </p>
									</div>
									<div class="off-address">
										<p class="mb-2">Sydney, Australia </p>
										<address class="mb-0">24 Farrar Parade COOROW WA 6515</address>
										<p>Call: <a href="#"><u>(08) 9064 9807</u> (Toll-free)</a> </p>
									</div>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">Useful Links</h2>
									<ul>
										<li><a href="about.html">About Us</a></li>
										<li><a href="blog-list.html">Blog</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="forgot-password.html">Forgot Password</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">Help & Support</h2>
									<ul>
										<li><a href="chats.html">Chat</a></li>
										<li><a href="faq.html">Faq</a></li>
										<li><a href="review.html">Reviews</a></li>
										<li><a href="privacy-policy.html">Privacy Policy</a></li>
										<li><a href="term-condition.html">Terms of use</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">Other Links</h2>
									<ul>
										<li><a href="freelancer-dashboard.html">Freelancers</a></li>
										<li><a href="freelancer-portfolio.html">Freelancer Details</a></li>
										<li><a href="project.html">Project</a></li>
										<li><a href="project-details.html">Project Details</a></li>
										<li><a href="post-project.html">Post Project</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">Mobile Application</h2>
									<p>Download our App and get the latest Breaking News Alerts and latest headlines and daily articles near you.</p>
									<div class="row g-2">
										<div class="col">
											<a href="#"><img class="img-fluid" src="assets/img/app-store.svg" alt="app-store"></a>
										</div>
										<div class="col">
											<a href="#"><img class="img-fluid" src="assets/img/google-play.svg" alt="google-play"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2021 All Rights Reserved</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 right-text">
									<div class="social-icon">
										<ul>
											<li><a href="#" class="icon" target="_blank"><i class="fab fa-instagram"></i> </a></li>
											<li><a href="#" class="icon" target="_blank"><i class="fab fa-linkedin-in"></i> </a></li>
											<li><a href="#" class="icon" target="_blank"><i class="fab fa-twitter"></i> </a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /Copyright -->						
					</div>
				</div>
				<!-- /Footer Bottom -->				
			</footer>
			<!-- /Footer -->	
			
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery-3.6.1.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slick JS -->
		<script src="assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>