@extends('app')

@section('content')

<style>
    .great-icon img{
        width: 75px;
        height: auto;
    }
	.blurry{
		height: 20px;
		filter: blur(5px);
		margin-top: -10px;
		background: #ffffffff;
	}
</style>
<!-- Start Navigation -->
			
			<!-- Home Banner -->
			<section class="section home-banner ">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-8 col-lg-7">
							<div class="banner-content aos" data-aos="fade-up">
								{{-- <div class="rating d-flex">
									<i class="fas fa-star checked"></i>
									<i class="fas fa-star checked"></i>
									<i class="fas fa-star checked"></i>
									<i class="fas fa-star checked"></i>
									<i class="fas fa-star checked"></i>
									<h5>Trused by over 2M+ users</h5> 
								</div> --}}
                                <h1>
                                    Join the global network of freelance<br/> AI talents to consult and develop AI<br/> applications for your business
                                </h1>
                                
								<p>BrainX is a freelance platform connecting your business to the global network of remote AI talents. </p>
                                @if (Auth::guard()->user() == null )
								<a class="btn" href="{{ url('auth/linkedin') }}">	
								<button class="btn btn-primary sub-btn" type="submit">Join us</button>
                                </a>
                                @else
								<a class="btn" href="{{ url('build-profile') }}">	
                                    <button class="btn btn-primary sub-btn" type="submit">Dashboard</button>
                                    </a>
    
                                @endif
										
							</div>
						</div>
						<div class="col-md-4 col-lg-5">
							<div class="banner-img aos text-center" data-aos="fade-up">
								<img src="assets/img/Tawsif_circle-removebg-preview.jpg" class="img-fluid hero-img" alt="banner">
								<div class="blurry">

								</div>
								<div class="freelance-info text-center">
									<h3 class="mt-2"><a href="">Tawsif Khan</a></h3>
									<h4 class="freelance-specific">PhD Student in AI - Malaysia</h4>
                                    <p>"AI age is now. Join force with BrainX to bring AI revolution to the global economy"</p>
                                </div>
							</div>
						</div>
                  
			
					</div>
				</div>
			</section>
			<!-- /Home Banner -->
       
            <section class="section about-project">
                <div class="about-position">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 mx-auto">
                                <div class="section-header section-header-two aos" data-aos="fade-up">
                                    <h2 class="header-title">AI freelance jobs on BrainX</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center text-left">
                            <div class="col-md-6 d-flex">
                                <div class="about-it-blk aos" data-aos="fade-up">
                                    <div class="about-it-img">
                                        <a href="javascript:;"><img class="img-fluid" src="assets/img/BrainX/Consult.png" alt=""></a>
                                    </div>
                                    <div class="about-it-content ">
                                        <h4>Free Consulting</h4>
                                        <p>Talents can consult your business about tools, data, models,... for your AI projects</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="about-it-blk aos" data-aos="fade-up">
                                    <div class="about-it-img">
                                        <a href="javascript:;"><img class="img-fluid" src="assets/img/BrainX/Development.png" alt=""></a>
                                    </div>
                                    <div class="about-it-content text-left">
                                        <h4>Development</h4>
                                        <p>Talents can help your business build AI applications, data engineering, custom model development, AI operation,...</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

         
            		<!-- Great About -->
			<section class="section great-about">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12 mx-auto">
							<div class="section-header section-header-two aos" data-aos="fade-up">
								<h2 class="header-title">Why join BrainX?</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/Flexible-work.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Flexible work</h4>
									<p>Multiple flexible engagements: full-time contract, part-time, hourly, project based. Work anywhere remotely</p>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/get-matched.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Get matched to clients</h4>
									<p>Based on your experience and skills in AI, you will be matched to suitable projects and clients by our expert</p>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/Safe-transaction.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Safe transaction</h4>
									<p>Start working with clients only after they escrow payment to BrainX</p>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/AI-focused-profile.png"  alt="">
								</div>
								<div class="great-content">
									<h4>AI-focused profile</h4>
									<p>BrainX help you create a standout profile showcasing your experience & skills in AI</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Great About -->
            <div class="great-about text-center">
				@if (Auth::guard()->user() == null )
				<a class="btn" href="{{ url('auth/linkedin') }}">	
				<button class="btn btn-primary sub-btn" type="submit">Join us</button>
				</a>
				@else
				<a class="btn" href="{{ url('build-profile') }}">	
					<button class="btn btn-primary sub-btn" type="submit">Dashboard</button>
					</a>

				@endif
            </div>
	

            <section class="section great-about">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12 mx-auto">
							<div class="section-header section-header-two aos" data-aos="fade-up">
								<h2 class="header-title">How to join BrainX?</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-md-4">
							<div class="great-blk aos" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/1.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Sign up</h4>
									<p>Sign up and start building your AI-focused profile <br>&nbsp</p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-4">
							<div class="great-blk aos" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/2.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Review</h4>
									<p>Submit your profile for our review <br>&nbsp</p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-4">
							<div class="great-blk aos" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/3.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Public profile</h4>
									<p>When accepted, you can access more features and get matched to clients</p>
								</div>
							</div>
						</div>
                        
					</div>
				</div>
			</section>

            <div class="great-about text-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add-feedback" class="login-btn"> Give a feedback</a>

            </div>
			@include('includes.feedback-modal')
@endsection