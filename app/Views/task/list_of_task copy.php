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


<!-- Include header -->
   <?= $this->include('common/aside') ?>
   

   <!-- Priority Buttons -->
   
   <main class="content pt-3 px-3" id="all_task">
      <div class="container-fluid p-0">
         <div class="row align-items-center mb-2 pb-1">
            <div class="col-sm-3">
               <h1 class="h3 mb-0 mt-0 text-capitalize">Tasks</h1>
               
            </div>
            <div class="col-sm-5 text-center">
               <button class="priority-button btn btn-outline-danger btn-md" data-priority="high">High Priority</button>
               <button class="priority-button btn btn-outline-warning btn-md" data-priority="medium">Medium Priority</button>
               <button class="priority-button btn btn-outline-success btn-md" data-priority="low">Low Priority</button>
               <button class="priority-button btn btn-outline-primary btn-md" data-priority="all">All Tasks</button>
            </div>
            <div class="col-4 text-end">
               <?= anchor('/create_task', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-plus me-1"></i> Add Task</button>') ?>
               <?= anchor('/dashboard', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-left-long"></i></button>') ?>
            </div>
         </div>
         <?php
            if(isset($_POST['high'])){
               echo 'high clicked';
            }
         ?>
            <div class="row">
               <div class="col-12 d-flex">
                  <div class="card flex-fill py-3">
                     <table id="tasks-list" class="display" style="width:100%">
                        <thead>
                           <tr>
                                 <!-- <th>S. No.</th> -->

                                 <th>ID</th>
                                 <th>Title</th>
                                 <th>priority</th>
                                 <th class="text-capitalize">Due Date</th>
                                 <th class="text-capitalize">Assignee</th>
                                 <th class="text-capitalize">Status</th>
                                 <th class="text-center ">Action</th>

                                 
                                 <!-- Add more columns as needed -->
                           </tr>
                        </thead>
                        <tbody></tbody>
                     </table>
                                       </div>
               </div>
              
            </div>
      </div>
      

    <!-- <script>
      $(document).ready(function() {

         // Function to load data based on priority
         function loadDataByPriority(priority) {
            $.ajax({
                  url: priority === 'all' ? '/fetchAllTasks' : '/fetchTasksByPriority/' + priority,
                  type: 'GET',
                  success: function(data) {
                     // Clear existing table data
                     $('#tasks-list').DataTable().clear().destroy();

                     // Reinitialize DataTable with new data
                     $('#tasks-list').DataTable({
                        data: data,
                        columns: [
                              { data: 'id' },
                              { 
                                 data: 'title',
                                 render: function(data, type, row) {
                                    return '<h5>' + data + '</h5><p>' + (row.description.length > 25 ? row.description.substr(0, 25)+'...' : row.description) + '</p>';
                                 }
                              
                              },
                              {
                                 data: 'priority',
                                 render: function(data, type, row) {
                                    var statusClass = '';
                                    if (data === 'high') {
                                       statusClass = 'btn btn-sm btn-danger';
                                    } else if (data === 'medium') {
                                       statusClass = 'btn btn-sm btn-warning';
                                    } else if (data === 'low') {
                                       statusClass = 'btn btn-sm btn-success';
                                    }
                                    return '<span class="' + statusClass + '">' + data + '</span>';
                                 }
                           },
                              { data: 'due_date' },
                              
                              { data: 'user_first_name' },
                              {
                                 data: 'status',
                                 render: function(data, type, row) {
                                    var statusClass = '';
                                    if (data === 'start') {
                                       statusClass = 'badge bg-primary';
                                    } else if (data === 'pending') {
                                       statusClass = 'badge bg-warning';
                                    } else if (data === 'due') {
                                       statusClass = 'badge bg-secondary';
                                    }
                                    else if (data === 'completed') {
                                       statusClass = 'badge bg-success';
                                    }
                                  
                                    return '<span class="' + statusClass + '">' + data + '</span>';
                                 }
                           },
                              {
                                 data: null,
                                 render: function(data, type, row) {
                                    return `
                                          <a href="/edit_task/${row.id}">
                                             <i class="fa-solid fa-pen-to-square fs-4 text-muted"></i>
                                          </a>
                                          <a href="/view_task/${row.id}">
                                             <i class="fa-solid fa-eye fs-4 text-muted"></i>
                                          </a>
                                       <?php if($user_info['role_name'] == 'admin'): ?>
                                          <a href="/delete_task/${row.id}" onclick="return confirm('Are you sure you want to delete this student?')">
                                             <i class="fa-solid fa-trash-can fs-4 text-muted"></i>
                                          </a>
                                       <?php endif; ?>
                                    `;
                                 }
                              }
                              // Add more columns as needed
                           ]
                        });
                  },
                  error: function(xhr, status, error) {
                     console.error('Error:', error);
                  }
            });
         }

         // Click event handler for priority buttons
         $('.priority-button').click(function() {
            var priority = $(this).data('priority');
            loadDataByPriority(priority);
         });

         loadDataByPriority('high');
      });
    </script> -->
    
    