
<?php 
 $menu = $this->uri->segment(1);
 ?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Kas Buku <sup>2</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if($menu=='home'){ echo'active';}?>">
		<a class="nav-link" href="<?= base_url('home'); ?>" class="nav-item nav-link ">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Nav Item - Charts -->
	<li class="nav-item <?php if($menu=='transaksi'){echo'active';}?>">
		<a class="nav-link" href="<?= base_url('transaksi');?>" class="nav-item nav-link">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Transaksi</span></a>
	</li>
    
    <?php if ($this->fungsi->user_login()-> level == 'Admin') { ?>
	<!-- Nav Item - Tables -->
	<li class="nav-item <?php if($menu=='user'){echo'active';}?>">
		<a class="nav-link" href="<?= base_url('user');?>" class="nav-item nav-link ">
			<i class="fas fa-user"></i>
			<span>User</span></a>
	</li>
    <?php }?>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
