<%@page import="javax.swing.text.html.HTML"%>
<%@ page pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt"%>
<%@ page import="com.amzi.Entities.*"%>
<%
	String header = null;
	String readonly = null;
	Ticket ticket = null;
	String disabled = null;
	
	String adminDisabled = "disabled";
	String textAreaReadOnly = "readonly";
	User user = (User) request.getSession().getAttribute("User");
	header = "Edit a Ticket";
	if (request.getSession().getAttribute("Readonly") != null) {
		readonly = "readonly";
		disabled = "disabled";
		header = "View a Ticket";
	}
	ticket = (Ticket) request.getSession().getAttribute("Ticket");
	if (ticket == null) {
		ticket = new Ticket();
		header = "Add a Ticket";
	}
	if (user.getUser_type_id() == 2 && ticket.getTicket_status_id() == 1) {
		textAreaReadOnly = null;
		adminDisabled = null;
	}
%>
<%
	String btnName, hrefName, title;
	if (ticket.getId() == 0) {
		title = "Add Ticket";
		btnName = "Back to Home";
		hrefName = "Home";
	} else {
		//CLIENT
		if (user.getUser_type_id() == 1) {
			//EDIT
			if (ticket.getTicket_status_id() == 1) {
				btnName = "Back to Submitted Tickets";
				hrefName = "Submit";
				title = "Submitted Ticket";
			}
			//VIEW
			else {
				btnName = "Back to Resolved Tickets";
				hrefName = "Resolved";
				title = "Resolved Ticket";
			}
		}
		//ADMIN
		else {
			//EDIT
			if (ticket.getTicket_status_id() == 1) {
				btnName = "Back to Active Tickets";
				hrefName = "Active";
				title = "Submitted Ticket";
			}
			//VIEW
			else {
				btnName = "Back to Resolved Tickets";
				hrefName = "Resolved";
				title = "Resolved Ticket";
			}
		}
	}
%>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><%=title%></title>

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
								aria-expanded="false"> <%=user.getFullName()%> <span
									class=" fa fa-angle-down"></span>
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
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2><%=header%><span></span>
									</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="btn btn-primary" href="Home">Home</a></li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="post" action="" id="demo-form2"
										data-parsley-validate class="form-horizontal form-label-left">
										<input type="hidden" name="id" value="<%=ticket.getId()%>" />
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12"
												for="first-name">Summary<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input
													value="<%=((ticket.getSummary() == null) ? "" : ticket.getSummary())%>"
													<%=readonly%> name="summary" type="text" id="first-name"
													required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12"
												for="first-name">Subject<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input
													value="<%=((ticket.getSubject() == null) ? "" : ticket.getSubject())%>"
													<%=readonly%> name="subject" type="text" id="first-name"
													required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12"
												for="last-name">Description<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<textarea <%=readonly%> rows="12" id="last-name"
													name="description" required="required"
													class="form-control col-md-7 col-xs-12"><%=((ticket.getDescription() == null) ? "" : ticket.getDescription())%></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12"
												for="last-name">Urgent Level<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select <%=disabled%> name="urgentLevel"
													class="select2_single form-control" tabindex="-1"
													required="required">
													<option value="0"
														<%=ticket.getUrgentLevel() == 0 ? "selected" : ""%>></option>
													<option value="1"
														<%=ticket.getUrgentLevel() == 1 ? "selected" : ""%>>Low</option>
													<option value="2"
														<%=ticket.getUrgentLevel() == 2 ? "selected" : ""%>>Medium</option>
													<option value="3"
														<%=ticket.getUrgentLevel() == 3 ? "selected" : ""%>>High</option>
												</select>
											</div>
										</div>
										<%
											if (!(user.getUser_type_id() == 1 && ticket.getTicket_status_id() == 0)) {
										%>
										<div class="ln_solid"></div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12"
												for="first-name">Admin Remarks<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<textarea rows="12" <%=textAreaReadOnly%> name="adminRemark"
													type="text" id="first-name" required="required"
													class="form-control col-md-7 col-xs-12"><%=((ticket.getAdminRemark() == null) ? "" : ticket.getAdminRemark())%></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12"
												for="first-name">Status<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select <%=adminDisabled%> name="status"
													class="select2_single form-control" tabindex="-1"
													required="required">
													<option value="1"
														<%=ticket.getTicket_status_id() == 1 ? "selected" : ""%>>Submitted</option>
													<option value="2"
														<%=ticket.getTicket_status_id() == 2 ? "selected" : ""%>>Resolved</option>
												</select>
											</div>
										</div>
										<%
											}
										%>
										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
												<a class="btn btn-primary" href="<%=hrefName%>"><%=btnName%></a>
												<%
													if (readonly == null || textAreaReadOnly == null) {
												%>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
												<%
													}
												%>
											</div>
										</div>
									</form>
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
