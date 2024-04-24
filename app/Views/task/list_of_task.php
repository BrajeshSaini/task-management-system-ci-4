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
                                 <th>S.No.</th>
                                 <th>Title</th>
                                 <th>priority</th>
                                 <th class="text-capitalize">Due Date</th>
                                 <th class="text-capitalize">Assignee</th>
                                 <th class="text-capitalize">Status</th>
                                 <th class="text-center ">Action</th>
                           </tr>
                        </thead>
                        <tbody></tbody>
                     </table>
                  </div>
               </div>
              
            </div>
      </div>