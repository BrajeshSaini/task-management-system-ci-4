            <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-12 text-center">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank">
                                    <strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank">
                                    <strong>
                                        Bootstrap Admin Template
                                    </strong>
                                </a>.
                                &copy;
							</p>
						</div>
						<!-- <div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div> -->
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="<?= base_url('js/app.js') ?>"></script>

	



	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#togglePasswordInLogin').click(function() {
                var loginPasswordInput = $('#loginPasswordField');
                var loginType = loginPasswordInput.attr('type') === 'password' ? 'text' : 'password';
                loginPasswordInput.attr('type', loginType);
            });
			// End Login Pasword Toggle

			$('#addUserTogglePassword').click(function() {
                var addPasswordInput = $('#addUserPasswordField');
                var addUserType = addPasswordInput.attr('type') === 'password' ? 'text' : 'password';
                addPasswordInput.attr('type', addUserType);
            });
			// End Add User Pasword Toggle

			$('#togglePassword').click(function() {
                var editPasswordInput = $('#editUserPasswordField');
                var editUserType = editPasswordInput.attr('type') === 'password' ? 'text' : 'password';
                editPasswordInput.attr('type', editUserType);
            });
			// End Edit User Pasword Toggle
        })
		// End Password Toggle Button
  



		$('#users-list').DataTable();
		// End User Datatable

		$('#logout_btn').click(function(){
			localStorage.clear();
		})

		
   </script>
	<script src="<?= base_url('js/task_datatable.js') ?>"></script>


	

</body>

</html>