   <!-- Include header -->
   <?= $this->include('common/aside') ?>
   <main class="content pt-3 px-3">
      <div class="container-fluid p-0">
         <div class="row align-items-center mb-2 pb-1">
            <div class="col-6">
               <h1 class="h3 mb-0 mt-0 text-capitalize">Roles</h1>
            </div>
            <div class="col-6 text-end">
               <?= anchor('/dashboard', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-left-long"></i></button>') ?>
            </div>
         </div>
            <div class="row">
               <div class="col-12 d-flex">
                  <div class="card flex-fill">
                     
                     <table class="table table-hover my-0">
                        <thead>
                           <tr>
                              <th>S. No.</th>
                              <th class="d-none d-xl-table-cell text-capitalize">name</th>
                              <th class="d-none d-xl-table-cell text-capitalize">Created Date</th>
                            
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $s_no = 1;
                           if ($roles): ?>
                        <?php foreach ($roles as $role): ?>
                            <tr>
                              <td><?= $s_no++ ?>.</td>
                              <td><?=$role['name'];?></td>
                              <td>
                                 <?php 
                                    echo $formattedDate = date('d-m-Y', strtotime($role['created_date']));
                                 ?>
                           </td>
                             
                           </tr>
                           <?php endforeach; ?>
                    <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
              
            </div>
      </div>
