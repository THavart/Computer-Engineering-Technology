<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Change Password</title>

<!-- Bootstrap -->
<link href="bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- Font Awesome -->
<link href="bootstrap/vendors/font-awesome/css/font-awesome.min.css"
	rel="stylesheet">
<!-- NProgress -->
<link href="bootstrap/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- Animate.css -->
<link href="bootstrap/vendors/animate.css/animate.min.css"
	rel="stylesheet">




<script type="text/javascript"
	src="<%=request.getContextPath()%>/script/jquery-3.2.1.js"></script>
<script type="text/javascript"
	src="<%=request.getContextPath()%>/script/jquery/ChangePassword.js"></script>
<link href="<%=request.getContextPath()%>/css/CustomCss.css"
	rel="stylesheet">



<!-- Custom Theme Style -->
<link href="bootstrap/build/css/custom.css" rel="stylesheet">
</head>
<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor"
			id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form action="ChangePassword" method="post">
						<h1>Change Password</h1>
						<p>Please enter your new password.</p>
						<div>
							<input type="password" class="form-control"
								placeholder="New Password" name="newPassword"
								required="required" />
						</div>
						<div>
							<input type="password" class="form-control"
								placeholder="Confirm New Password" name="confirmNewPassword"
								required="required" />
						</div>
						<div id="terms">
							<label><input type="checkbox" name="terms" value="termzs"
								id="terms" />I have read the companies <a
								href="http://www.google.ca" target="_blank">terms and
									conditions</a></label>
						</div>
						<div id="submit" class="center">
							<input class="btn btn-info" type="submit"
								value="Submit New Password">
						</div>
						<div class="separator">
							<div>
								<h1>
									<i class="fa fa-paw"></i> Gentelella Alela!
								</h1>
								<p>©2016 All Rights Reserved. Gentelella Alela! is a
									Bootstrap 3 template. Privacy and Terms</p>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>
</html>
