<%@page import="com.amzi.Enums.MyEnumContainer.UserType"%>
<%@ page pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt"%>
<%@ page import="com.amzi.Entities.*"%>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Home</title>

<!-- Bootstrap -->
<link href="bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- Font Awesome -->
<link href="bootstrap/vendors/font-awesome/css/font-awesome.min.css"
	rel="stylesheet">
<!-- NProgress -->
<link href="bootstrap/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link
	href="bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.css"
	rel="stylesheet">

<!-- Custom Theme Style -->
<link href="bootstrap/build/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<ul class="nav navbar-nav navbar-right">
							<li class=""><a href="javascript:;"
								class="user-profile dropdown-toggle" data-toggle="dropdown"
								aria-expanded="false"> <%
 	User user = (User) request.getSession().getAttribute("User");
 %><%=user.getFullName()%> <span class=" fa fa-angle-down"></span>
							</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="Logout"><i
											class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul></li>

							<li role="presentation" class="dropdown"><a
								href="javascript:;" class="dropdown-toggle info-number"
								data-toggle="dropdown" aria-expanded="false"> <i
									class="fa fa-envelope-o"></i> <span class="badge bg-green">6</span>
							</a>
								<ul id="menu1" class="dropdown-menu list-unstyled msg_list"
									role="menu">
									<!-- ADD MESSAGES HERE -->
									<li><a> <span class="image"><img
												src="images/img.jpg" alt="Profile Image" /></span> <span> <span>John
													Smith</span> <span class="time">3 mins ago</span>
										</span> <span class="message"> Film festivals used to be
												do-or-die moments for movie makers. They were where... </span>
									</a></li>
									<li><a> <span class="image"><img
												src="images/img.jpg" alt="Profile Image" /></span> <span> <span>John
													Smith</span> <span class="time">3 mins ago</span>
										</span> <span class="message"> Film festivals used to be
												do-or-die moments for movie makers. They were where... </span>
									</a></li>
									<li><a> <span class="image"><img
												src="images/img.jpg" alt="Profile Image" /></span> <span> <span>John
													Smith</span> <span class="time">3 mins ago</span>
										</span> <span class="message"> Film festivals used to be
												do-or-die moments for movie makers. They were where... </span>
									</a></li>
									<li><a> <span class="image"><img
												src="images/img.jpg" alt="Profile Image" /></span> <span> <span>John
													Smith</span> <span class="time">3 mins ago</span>
										</span> <span class="message"> Film festivals used to be
												do-or-die moments for movie makers. They were where... </span>
									</a></li>
									<li>
										<div class="text-center">
											<a> <strong>See All Alerts</strong> <i
												class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul></li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="row top_tiles">
						<%
							if (user.getUser_type_id() == 1) {
						%>
						<div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon">
									<img alt="Add"
										src="Images/add-interface-circular-symbol-with-plus-sign_318-67290.jpg"
										height="42" width="42">
								</div>
								<div class="count">
									<a class="btn btn-info" href="AddTicket">Add a Ticket</a>
								</div>
								<p>
									<b>Send a ticket to the Admin</b>
								</p>
							</div>
						</div>
						<%
							}
						%>
						<div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon">
									<img alt="Edit" src="Images/edit-icon_1626685.jpg" height="42"
										width="42">
								</div>
								<div class="count">
									<a class="btn btn-info" href="Submit">Submitted Tickets</a>
								</div>
								<p>
									<b>View tickets in progress</b>
								</p>
							</div>
						</div>
						<div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon">
									<img alt="View" src="Images/eye-24-512.png" height="42"
										width="42">
								</div>
								<div class="count">
									<a class="btn btn-info" href="Resolved">Resolved Tickets</a>
								</div>
								<p>
									<b>View all resolved tickets</b>
								</p>
							</div>
						</div>
						<%
							if (user.getUser_type_id() == 2) {
						%>
						<div class="x_panel">
							<h1>Floorplan - All Active Issues</h1>
							<img src="Images/car-exhibition-floor-plan.png" alt="Floorplan"
								usemap="#planemap">
							<div
								style="position: absolute; top: 221px; left: 82px; width: 5px; height: 5px; background: red;"></div>
							<map name="planemap">
								<area target="" alt="" title="" href="Active?id=2"
									coords="62,151,85,175" shape="rect">
								<area target="" alt="" title="" href="" coords="86,152,110,174"
									shape="rect">
								<area target="" alt="" title="" href="" coords="62,176,85,199"
									shape="rect">
								<area target="" alt="" title="" href="" coords="87,176,110,199"
									shape="rect">
							</map>
						</div>
						<%
							}
						%>
					</div>
				</div>
			</div>
		</div>
		<!-- /page content -->
	</div>
	</div>

	<!-- jQuery -->
	<script src="bootstrap/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="bootstrap/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="bootstrap/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="bootstrap/vendors/nprogress/nprogress.js"></script>
	<!-- Chart.js -->
	<script src="bootstrap/vendors/Chart.js/dist/Chart.min.js"></script>
	<!-- jQuery Sparklines -->
	<script
		src="bootstrap/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- Flot -->
	<script src="bootstrap/vendors/Flot/jquery.flot.js"></script>
	<script src="bootstrap/vendors/Flot/jquery.flot.pie.js"></script>
	<script src="bootstrap/vendors/Flot/jquery.flot.time.js"></script>
	<script src="bootstrap/vendors/Flot/jquery.flot.stack.js"></script>
	<script src="bootstrap/vendors/Flot/jquery.flot.resize.js"></script>
	<!-- Flot plugins -->
	<script
		src="bootstrap/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
	<script
		src="bootstrap/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
	<script src="bootstrap/vendors/flot.curvedlines/curvedLines.js"></script>
	<!-- DateJS -->
	<script src="bootstrap/vendors/DateJS/build/date.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="bootstrap/vendors/moment/min/moment.min.js"></script>
	<script
		src="bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="bootstrap/build/js/custom.min.js"></script>
</body>
</html>