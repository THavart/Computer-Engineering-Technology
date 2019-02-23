<%@ page pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt"%>
<%@ page import="com.amzi.Entities.*"%>
<%@ page import="java.util.List"%>
<%
	List<Ticket> tickets = request.getSession().getAttribute("Tickets") == null ? null
			: (List<Ticket>) request.getSession().getAttribute("Tickets");
%>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><%=request.getSession().getAttribute("ViewEdit")%></title>

<!-- Bootstrap -->
<link href="bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- Font Awesome -->
<link href="bootstrap/vendors/font-awesome/css/font-awesome.min.css"
	rel="stylesheet">
<!-- NProgress -->
<link href="bootstrap/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="bootstrap/vendors/iCheck/skins/flat/green.css"
	rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="bootstrap/vendors/google-code-prettify/bin/prettify.min.css"
	rel="stylesheet">
<!-- Select2 -->
<link href="bootstrap/vendors/select2/dist/css/select2.min.css"
	rel="stylesheet">
<!-- Switchery -->
<link href="bootstrap/vendors/switchery/dist/switchery.min.css"
	rel="stylesheet">
<!-- starrr -->
<link href="bootstrap/vendors/starrr/dist/starrr.css" rel="stylesheet">
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
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-6 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2><%=request.getSession().getAttribute("ViewEdit")%></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="btn btn-primary" href="Home">Home</a></li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<%
										if (tickets == null || tickets.size() == 0) {
									%>
									<p>
										<strong>No tickets</strong>
									</p>
									<%
										}
									%>
									<%
										if (tickets != null && tickets.size() > 0) {
									%>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Subject</th>
												<th>Date Created</th>
												<th>Date Updated</th>
												<th>Functions</th>
											</tr>
										</thead>
										<tbody>
											<%
												for (int i = 0; i < tickets.size(); i++) {
														Ticket t = tickets.get(i);
											%>
											<tr>
												<td><%=t.getSubject()%></td>
												<td><%=t.getDate_created()%></td>
												<td><%=t.getDate_updated() == null ? "N/A" : t.getDate_updated()%></td>
												<td><a class="btn btn-info"
													href="<%="ViewTicket"%>?id=<%=t.getId()%>"><%="View Ticket"%></a></td>
											</tr>
											<%
												}
											%>
											<%
												}
											%>
										</tbody>
									</table>

								</div>
							</div>
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
	<!-- bootstrap-progressbar -->
	<script
		src="bootstrap/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="bootstrap/vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="bootstrap/vendors/moment/min/moment.min.js"></script>
	<script
		src="bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script
		src="bootstrap/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="bootstrap/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="bootstrap/vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script
		src="bootstrap/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="bootstrap/vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="bootstrap/vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="bootstrap/vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="bootstrap/vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script
		src="bootstrap/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="bootstrap/vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="bootstrap/build/js/custom.min.js"></script>

</body>
</html>
