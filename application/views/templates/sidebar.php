<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('/welcome/main');?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-list-alt"></i>
		</div>
		<div class="sidebar-brand-text mx-2">Meeting <sup>minutes</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="<?php echo site_url('/welcome/main');?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Projects
	</div>

	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo site_url('/welcome/admin_project');?>">
			<i class="fas fa-fw fa-folder"></i>
			<span>All Projects</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Meetings
	</div>
	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo site_url('/welcome/projects');?>">
			<i class="fas fa-fw fa-list"></i>
			<span>Meeting Constructions</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Other
	</div>

	<li class="nav-item">
		<a class="nav-link" href="<?php echo site_url('/welcome/attendees');?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Attendees</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>



</ul>
<!-- End of Sidebar -->
