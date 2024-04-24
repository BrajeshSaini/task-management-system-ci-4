<?php
	 // Load the Session library if it's not already loaded
	 $session = \Config\Services::session();
	 $user_info = [];
	 if ($session->has('user')) {
		$user_info = session('user');
	 } 
	 else{
		$user_info = [];
	 }

	
?>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="#.">
					<span class="align-middle">Admin Panel</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header text-capitalize">
						Main Menu 
					</li>

					<!-- <li 
						<?=  $uri == 'dashboard' ? 'class="sidebar-item active"' : 'class="sidebar-item"' ?>
					>

						<?= anchor('/dashboard', ' <i class="fa-solid fa-gauge"></i><span class="align-middle">Dashboard</span>', ['class' => 'sidebar-link text-capitalize']) ?>
					</li> -->

					<li 
						<?=  $uri == 'task' ? 'class="sidebar-item active"' : 'class="sidebar-item"' ?>
					>
						<?= anchor('/task', ' <i class="fa-solid fa-list-check"></i> <span class="align-middle">Tasks</span>', ['class' => 'sidebar-link text-capitalize']) ?>
					</li>
				
					<?php if($user_info['role_name'] == 'admin'): ?>
						
						<li 
							<?=  $uri == 'user' ? 'class="sidebar-item active"' : 'class="sidebar-item"' ?>
						>
							<?= anchor('/user', ' <i class="fa-solid fa-users"></i> <span class="align-middle">Users</span>', ['class' => 'sidebar-link text-capitalize']) ?>
						</li>

						<li 
							<?=  $uri == 'role' ? 'class="sidebar-item active"' : 'class="sidebar-item"' ?>
						>
							<?= anchor('/role', '<i class="fa-solid fa-hat-cowboy"></i> <span class="align-middle">Roles</span>', ['class' => 'sidebar-link text-capitalize']) ?>
						</li>
						
					<?php endif; ?>

					
					

				
					<li class="sidebar-header text-capitalize">
						Other Menu
					</li>
                    <li class="sidebar-item">
						<?= anchor('/profile', '<i class="fa-solid fa-user"></i> <span class="align-middle">Profile</span>', ['class' => 'sidebar-link text-capitalize']) ?>

					</li>
					<li>
						<form method="POST" action="auth/logout">
							<?= csrf_field() ?>
							<button type="submit" class="btn sidebar-link text-capitalize" id="logout_btn"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="align-middle">Logout</span> </button>
						</form>
					</li>
				</ul>

				
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<!-- <a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a> -->
				<?=$user_info['email']?>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						
						<li class="nav-item dropdown">
							<a class="nav-link" href="#">
                            <i class="fa-solid fa-user"></i>
                                <span class="text-dark ms-3"> <?=$user_info['first_name'].' '.$user_info['last_name']?></span>
							</a>
							
						</li>
					</ul>
				</div>
			</nav>