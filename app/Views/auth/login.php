<!-- <div id="app">{{ message }}</div> -->

	<main class="d-flex w-100" id="app">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back!</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">

								<?= session()->getFlashdata('error') ?>
								<form method="post" action="<?= base_url('/auth') ?>">
										<?= csrf_field() ?>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input 
												type="email" 
												name="email" 
												placeholder="Enter your email" 
												class="form-control form-control-lg" 
												/>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
										
											
											<div class="input-group mb-3">
												<input 
													name="password" 
													type="password"
													placeholder="Enter your password" 
													class="form-control form-control-lg" 
													id="loginPasswordField"
												/>
												<span class="input-group-text" id="togglePasswordInLogin" >
													<i class="fa-solid fa-eye"></i>
												</span>
											</div>
										</div>
										
										<div class="d-grid gap-2 mt-3">
        									<button 
												type="submit"
												class="btn btn-lg btn-primary"
												>
												Login
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">

							Don't have an account? <a href="tel:+987654310"> call your admin </a>
                            <!-- <a href="pages-sign-up.html">Sign up</a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	