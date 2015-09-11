<div id="sidebar-wrapper">
	<ul class="nav navbar-nav side-nav">
		<li class="side-user hidden-xs">
			<div class="photo">
				<img src="<?php echo base_url('assets/img/uq_logo.png'); ?>" class="uq-logo" alt="UQ Logo">
				<img class="img-circle" src="<?php echo base_url('assets/img/user-placeholder.jpg'); ?>" alt="User Placeholder Image" /> 
				<p class="welcome">Logged in as</p>
				<p class="name"><?php echo $username;?></p>
			</div>
		</li>

		<li>
			<a id="pageHome" class="side-nav <?php echo $menu=='home' ? 'active' : '' ?>" href="<?php echo site_url('home'); ?>">
				<i class="fa fa-fw fa-home"></i>&emsp;Home
			</a>
		</li>
		<li>
			<a id="pageCourse" class="side-nav <?php echo $menu=='course' ? 'active' : '' ?>" href="<?php echo site_url('course'); ?>">
				<i class="fa fa-fw fa-briefcase"></i>&emsp;Course
			</a>
		</li>
		<?php if ($usertype=="admin") { ?>
		<li>
			<a id="pageAdmin" class="side-nav <?php echo $menu=='admin' ? 'active' : '' ?>" href="<?php echo site_url('admin'); ?>">
				<i class="fa fa-fw fa-folder-open"></i>&emsp;Admin Page
			</a>	
		</li>
		<?php 
	} 
	?>
	<li>
		<a id="pageSettings" class="side-nav <?php echo $menu=='settings' ? 'active' : '' ?>" href="<?php echo site_url('settings'); ?>">
			<i class="fa fa-fw fa-gear"></i>&emsp;Settings
		</a>
	</li>
	<li>
		<a id="pageLogout" class="side-nav <?php echo $menu=='logout' ? 'active' : '' ?>" href="<?php echo site_url('logout'); ?>">
			<i class="fa fa-fw fa-power-off"></i>&emsp;Log Out
		</a>
	</li>
</ul>
</div>