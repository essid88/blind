<!DOCTYPE html><html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head><meta charset="UTF-8">
<title>BlindVision - Admin Dashboard</title>
<meta name="description" content="Volta is a futuristic Web Application and Admin Dashboard built with Bootstrap, Stylus and CoffeeScript. From a developer trusted by thousands of users.">
<meta name="keywords" content="volta, admin, volta admin, dashboard, web, application, template, theme, admin dashboard, admin template, admin theme, web application template, dashboard template, pixevil, pixevil themes, grozav">
<meta name="author" content="Alex Grozav (Pixevil)">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
<link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/icon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/icon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/icon/manifest.json">
<link rel="mask-icon" href="/icon/safari-pinned-tab.svg" color="#ff1643">
<link rel="shortcut icon" href="/icon/favicon.ico">
<meta name="msapplication-config" content="/icon/browserconfig.xml">
<meta name="theme-color" content="#ff1643">
<meta property="og:title" content="Volta - Web Application and Admin Dashboard">
<meta property="og:type" content="website">
<meta property="og:url" content="https://pixevil.com/volta">
<meta property="og:image" content="../img/template-thumbnails/volta.html">
<meta property="og:site_name" content="pixevil">


<link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/css/animate/animate.min.css" rel="stylesheet" type="text/css">
<link href="/css/nanoscroller/nanoscroller.min.css" rel="stylesheet" type="text/css">
<link href="/css/metis-menu/metis-menu.min.css" rel="stylesheet" type="text/css">
<link href="/css/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<link href="/css/icons/pixeden-stroke-icons.min.css" rel="stylesheet" type="text/css">
<link href="/css/icons/font-awesome-icons.min.css" rel="stylesheet" type="text/css">
<link href="/css/application/application.min.css" rel="stylesheet" type="text/css">
<link href="/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css">



</head>



<div class="navbar -dark -fixed-top -has-5-items">
<div class="navbar-wrapper">
<a class="navbar-brand" href="{{ url('/aveugle') }}">
<span class="hidden-sm-up"></span>
<span class="hidden-xs-down"><strong>BlindVision</strong> </span>
</a><ul class="navbar-nav -right"><li><a class="has-morph-dropdown" href="#notifications-dropdown"> <i class="pe pe-bell"></i> <span class="navbar-item-count">{{ Session::get('countmailer2')}}</span></a></li><li>







<!-- account setting -->
</a></li><li>
<a class="has-morph-dropdown" href="#applications-dropdown"> 
<i class="pe pe-keypad"></i> </a>
</li>
<li class="navbar-profile">
<a class="has-morph-dropdown" href="#profile-dropdown"> 
<i class="pe pe-user">
	
</i> </a></li></i> 
</a></li></ul>
<div class="morph-dropdown-wrapper -dark -right" style="font-size: 18px;">
<div class="morph-dropdown-list -links">
<div class="morph-dropdown" id="notifications-dropdown" >
<div class="morph-content" >
<h3>Notifications</h3>
<p class="_text-muted">Here&#39;s what happened while you were away.</p>
<ul class="morph-links -small" style="color: #fff">
<a href="{{ url('/inbox') }}">
{{ Session::get('msg')}}
</a>
 @include('flash-message')

</ul>
<div class="_margin-top-1x">

</div></div></div>






<div class="morph-dropdown" id="applications-dropdown">
<div class="morph-content -gallery"><h3>Applications</h3>
<p class="_text-muted">Open one of your connected social applications.</p>
<ul class="morph-gallery"><li><a href="https://facebook.com" target="_blank"> 
<i class="fa fa-facebook-square"></i> Facebook</a></li><li>
<a href="https://twitter.com" target="_blank"> 
<i class="fa fa-twitter"></i> Twitter</a></li><li>
<a href="https://plus.google.com" target="_blank">
 <i class="fa fa-google-plus"></i> Google Plus</a></li><li>
 <a href="https://linkedin.com/company" target="_blank"> 
 <i class="fa fa-linkedin"></i> LinkedIn</a></li><li>
 <a href="https://github.com" target="_blank">
 <i class="fa fa-github"></i> GitHub</a></li><li>
 <a href="https://bitbucket.org/" target="_blank" rel="nofollow">
 <i class="fa fa-bitbucket"></i> BitBucket</a></li><li>   <a href="https://slack.com/" target="_blank" rel="nofollow">
<i class="fa fa-slack"></i> Slack</a></li><li>
<a href="https://dropbox.com/" target="_blank" rel="nofollow">
<i class="fa fa-dropbox"></i> DropBox</a></li></ul>
</div></div> 
<div class="morph-dropdown" id="profile-dropdown">
<div class="morph-content -links"><div class="morph-profile">
<img src="uploads/{{ Session::get('Userphoto')}}"><h4>{{ Session::get('Username')}}</h4>
<p>{{ Session::get('Useremail')}}</p>
</div>
<ul class="morph-links"><li><a href="{{ url('myprofile') }}">My Profile</a></li></ul>
<div class="_margin-top-1x">
<a class="btn -primary -block" href="{{ url('/layout') }}">Sign Out</a>
</div></div></div></div>
</div></div></div><!-- /Navbar -->
<!-- Left Sidebar -->



<div class="sidebar -dark -left -collapsible" id="sidebar">
<div class="nano">
<div class="nano-content">
<div class="sidebar-wrapper">
<ul class="sidebar-menu metismenu">
<li class="sidebar-heading">Application</li>
<li class="-active"><a href="{{ url('home') }}"> 
<i class="pe pe-home"></i> <span>Home</span></a>
</li>

<li class=""><a href="{{ url('aveugle') }}"> 
<i class="fa fa-user-o"></i> <span>Blind</span></a>
</li>
<!-- calendar -->
<li class=""><a href="{{ url('events') }}"> 
<i class="pe pe-date"></i> <span>Calendar</span>

<!-- email -->



<span class="tag -dark"></span></a></li>
<li class=""><a href="#"> <i class="pe pe-mail"></i> 
<span>Email</span><span class="tag -dark">{{ Session::get('countmailer')}}</span>
<span class="fa arrow"></span></a>
<ul><li class=""><a href="{{ url('email') }}">Compose</a>
</li><li class=""><a href="{{ url('/inbox') }}">Inbox</a>
<div></div>
</li></ul>
</li>



<span class="tag -dark"></span></a></li>
<li class=""><a href="#"> <i class="pe pe-mail"></i> 
<span>SMS</span><span class="tag -dark"></span>
<span class="fa arrow"></span></a>
<ul><li class=""><a href="{{ url('sms') }}">Send SMS</a>
</li><li class="">
<div></div>
</li></ul>
</li>





<!-- component -->
<li class="sidebar-heading">Components</li><li class=""> 

<!-- tables -->
<li class=""><a href="#"> <i class="pe pe-browser"></i> 
<span>Files</span><span class="fa arrow"></span></a><ul>
<li class=""><a href="/detailed">Blind List</a></li>
</ul></li>



<!-- maps -->
<li class=""><a href="#"> <i class="pe pe-map-marker"></i> 
<span>Maps</span><span class="fa arrow"></span></a><ul><li class="">
<a href="{{ url('maps1') }}">Google Maps</a></li>
</ul></li><li>

<span class="tag -dark"></span></a></li>
<li class=""><a href="#"> <i class="fa fa-user-o"></i> 
<span>User</span><span class="tag -dark"></span>
<span class="fa arrow"></span></a>
<ul><li class=""><a href="{{ url('show_user') }}">Show user</a></li>
<li class=""><a href="{{ url('create') }}">Add user</a></li>


</li>

</ul></div></div>
</div></div>







<div class="content -dark -with-left-sidebar -collapsible">
<div class="container-fluid">
<div class="row">
<div class="col -lg-12 -xl-8">
@include('flash::message')
@yield('content')
</div>
</div>
</div>
</div>



        
        <script src="{{URL ::asset('/plugins/fullcalendar/jquery-1.10.2.js')}}" type="text/javascript" ></script>
        <script src="{{URL ::asset('/js/calendrierjs/jquery.js')}}" type="text/javascript"></script>
        <script src="{{URL ::asset('/js/jquery/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL ::asset('/plugins/jQuery/jQuery-2.1.4.min.js')}}"  type="text/javascript"></script>
         
		<script src="{{URL ::asset('/js/themes/base.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/themes/volta.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/tether/tether.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/moment/moment.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/validator/validator.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/perfect-scrollbar/perfect-scrollbar.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/datepicker/datepicker.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/cookie/cookie.min.js')}}" type="text/javascript"></script>
		<!-- Animations -->
		<script src="{{URL ::asset('/js/gsap/tweenlite.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/gsap/plugins/css.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/gsap/easing/easepack.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/animus/animus.min.js')}}" type="text/javascript"></script>
		<!-- Notifications -->
		<script src="{{URL ::asset('/js/gritter/gritter.min.js')}}" type="text/javascript"></script>
		<!-- Analytics -->
		<script src="{{URL ::asset('/js/googleanalytics/googleanalytics.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/hotjar/hotjar.min.js')}}" type="text/javascript"></script>
		<!-- Sidebar -->
		<script src="{{URL ::asset('/js/metis-menu/metis-menu.min.js')}}" type="text/javascript"></script>
		<!-- Application Components -->
		<script src="{{URL ::asset('/js/application/components/morph-dropdown.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/application/components/navbar.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/application/components/panel.min.js')}}" type="text/javascript"></script>
		<!-- Allow Theme Cookies -->
		<script src="{{URL ::asset('/js/themes/themeable.min.js')}}" type="text/javascript"></script>
		<!-- Application -->
		<script src="{{URL ::asset('/js/application/application.min.js')}}" type="text/javascript"></script>
		<!-- Page Specific Scripts -->
		<script src="{{URL ::asset('/js/sparkline/sparkline.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/flot/jquery.flot.pie.min.js')}}" type="text/javascript"></script>
		<script src="{{URL ::asset('/js/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
	   	<script src="{{URL ::asset('/js/flot/jquery.flot.animator.min.js')}}" type="text/javascript"></script>
	    <script src="{{URL ::asset('/js/application/views/index.min.js')}}" type="text/javascript"></script>

         <script src="{{URL ::asset('/js/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
         <script src="{{URL ::asset('/js/application/views/pages/calendar.min.js')}}" type="text/javascript"></script>
         <script src="{{URL ::asset('/plugins/fullcalendar/fullcalendar.js')}}" type="text/javascript"></script>
         
         <script src="{{URL ::asset('/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript" ></script>
        
         <script src="{{URL ::asset('/js/calendrierjs/bootstrap.min.js')}}" type="text/javascript"></script>
         <script src="{{URL ::asset('/js/calendrierjs/moment.min.js')}}" type="text/javascript"></script>
         <script src="{{URL ::asset('/js/calendrierjs/fullcalendar.min.js')}}" type="text/javascript"></script>
         <script src="{{URL ::asset('/js/dropzone/dropzone.min.js')}}" type="text/javascript"></script>
          <script src="{{URL ::asset('/js/application/views/forms/multi-upload.min.js')}}" type="text/javascript"></script>







		</body>
		<!-- Mirrored from pixevil.com/volta/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Mar 2017 10:12:48 GMT -->
</html>