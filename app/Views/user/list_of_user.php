
   <!-- Include header -->
   <?= $this->include('common/aside') ?>


   <main class="content pt-3 px-3">
      <div class="container-fluid p-0">
         <div class="row align-items-center mb-2 pb-1">
            <div class="col-6">
               <h1 class="h3 mb-0 mt-0 text-capitalize">Users</h1>
            </div>
            <div class="col-6 text-end">
               <?= anchor('/create_user', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-plus me-1"></i> Add User</button>') ?>
               <?= anchor('/dashboard', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-left-long"></i></button>') ?>
            </div>
         </div>
            <div class="row">
               <div class="col-12 d-flex">
                  <div class="card flex-fill py-3">
                     
                     <table class="table table-hover my-0" id="users-list">
                        <thead>
                           <tr>
                              <th>S. No.</th>
                              <th>Name</th>
                              <th class="d-none d-xl-table-cell text-capitalize">Email</th>
                              <th class="d-none d-xl-table-cell text-capitalize">Mobile</th>
                              <th class="text-capitalize">Role</th>
                              <th class="text-capitalize text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $s_no = 1;
                              if($users): 
                                 foreach ($users as $user): 
                           ?>
                           <tr>
                              <td><?=$s_no++;?>.</td>
                              <td><?=$user->first_name;?></td>
                              <td class="d-none d-xl-table-cell"><?=$user->email;?></td>
                              <td class="d-none d-xl-table-cell text-capitalize"><?=$user->mobile;?></td>
                              <td class="d-none d-xl-table-cell text-capitalize"><?=$user->role_name;?></td>
                              <td class="d-flex justify-content-evenly">
                                    <a href="/update_user/<?=$user->id?>">
                                       <i class="fa-solid fa-pen-to-square fs-4 text-muted"></i>
                                    </a>
                                    <a href="/view_user/<?=$user->id?>">
                                       <i class="fa-solid fa-eye fs-4 text-muted"></i>
                                    </a>

                                    <a href="/delete_user/<?=$user->id?>" onclick="return confirm('Are you sure you want to delete this student?')">
                                       <i class="fa-solid fa-trash-can fs-4 text-muted"></i>
                                    </a>
                                    
                                 
                                </td>
                           </tr>
                           <?php

                                 endforeach;
                              endif;
                           ?>
                           
                        </tbody>
                     </table>
                  </div>
               </div>
              
            </div>
      </div>

      

    