<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('resources/assets/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('resources/assets/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{asset('resources/assets/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('resources/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('resources/assets/stylesheets/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('resources/assets/stylesheets/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('resources/assets/stylesheets/theme-custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('resources/assets/vendor/modernizr/modernizr.js')}}"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="{{asset('resources/assets/images/logo.png')}}" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form action="{{ route('post_login') }}" method="post">
							@csrf
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>&emsp;
										</span>
									</span>
								</div>
							</div>

							<!-- <div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="pwd" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div> -->

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Organization</label>
								</div>
								<div class="input-group input-group-icon">
									<select name="organization" id="organization" class="form-control input-lg">
										<option value="org1"> VBC </option>
										<option value="org2"> AGChain </option>
									</select>
									
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>&emsp;
										</span>
									</span>
								</div>
							</div>


							<div class="row">
								<!-- <div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div> -->
								<div class="col-sm-12 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p> -->
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{asset('resources/assets/vendor/jquery/jquery.js')}}"></script>
		<script src="{{asset('resources/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{asset('resources/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('resources/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{asset('resources/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('resources/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
		<script src="{{asset('resources/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('resources/assets/javascripts/theme.js')}}"></script>
		
		<!-- Theme Custom -->
		<script src="{{asset('resources/assets/javascripts/theme.custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('resources/assets/javascripts/theme.init.js')}}"></script>

	</body><img src="http://www.ten28.com/fref.jpg">
</html>