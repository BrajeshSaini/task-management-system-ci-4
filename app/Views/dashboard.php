   <!-- Include header -->
   <?= $this->include('common/aside') ?>

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
   <main class="content pt-3 px-3">
      <div class="container-fluid p-0">
         <h1 class="h3 mb-3 mt-0"><strong>Analytics</strong> Dashboard</h1>
         <div class="row">
            <div class="col-xl-12 d-flex">
               <div class="w-100">
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="card">
                           <div class="card-body p-2 px-3 pb-3">
                              <div class="row d-flex align-items-center">
                                 <div class="col ">
                                    <h5 class="card-title mb-0">Tasks</h5>
                                 </div>

                                 <div class="col-auto">
                                    <div class="stat text-primary">
                                       <i class="fa-solid fa-list-check"></i>
                                    </div>
                                 </div>
                              </div>
                              <h1 class="mt-0 mb-2">2.382</h1>
                              <div>
                                 <span class="text-muted">All tasks</span>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                     <?php if($user_info['role_name'] == 'admin'): ?>
                           
                        <div class="col-sm-4">
                           <div class="card">
                              <div class="card-body p-2 px-3 pb-3">
                                 <div class="row d-flex align-items-center">
                                    <div class="col ">
                                       <h5 class="card-title mb-0 text-capitalize">Users</h5>
                                    </div>

                                    <div class="col-auto">
                                       <div class="stat text-primary">
                                          <i class="fa-solid fa-users"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <h1 class="mt-0 mb-2">2.382</h1>
                                 <div>
                                    <span class="text-muted text-capitalize">All users</span>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                        <div class="col-sm-4">
                           <div class="card">
                              <div class="card-body p-2 px-3 pb-3">
                                 <div class="row d-flex align-items-center">
                                    <div class="col ">
                                       <h5 class="card-title mb-0 text-capitalize">Roles</h5>
                                    </div>

                                    <div class="col-auto">
                                       <div class="stat text-primary">
                                          <i class="fa-solid fa-hat-cowboy"></i> 
                                       </div>
                                    </div>
                                 </div>
                                 <h1 class="mt-0 mb-2">2.382</h1>
                                 <div>
                                    <span class="text-muted text-capitalize">All roles</span>
                                 </div>
                              </div>
                           </div>
                           
                        </div>

                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
