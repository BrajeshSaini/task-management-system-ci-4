<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<!-- <link rel="shortcut icon" href="img/icons/icon-48x48.png" /> -->

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<link href="<?= base_url('css/app.css') ?>" rel="stylesheet">
	<link href="<?= base_url('icons/fontawesome-free/css/all.css') ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

	<style>
		#tasks-list_length,#tasks-list_filter,
		#users-list_length,#users-list_filter{
			padding-bottom: 15px;
		}
		#tasks-list_length,
		#users-list_length{
			padding-left: 15px;
		}
		#tasks-list_filter,
		#users-list_filter{
			padding-right: 15px;
		}
		#tasks-list_info,
		#users-list_info{
			padding-left: 15px;
			padding-top: 15px;
		}
		#tasks-list_paginate,
		#users-list_paginate{
			padding-right: 15px;
		}
		
		tbody td{
			height: 50px;
			align-items: center;
		}
	</style>

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
		
   </script>

</head>
<body>
 