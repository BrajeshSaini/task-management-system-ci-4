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


            <div class="row align-items-center mb-2 pb-1">
                <div class="col-6">
                <h1 class="h3 mb-0 mt-0 text-capitalize">Add User</h1>
                </div>
                <div class="col-6 text-end">
                <?= anchor('/user', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-left-long"></i></button>') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        
                        <div class="card-body">
                            <?= session()->getFlashdata('error') ?>
                            <form method="post" action="<?= base_url('/add_user') ?>">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control form-control form-control-lg text-capitalize" placeholder="First Name" name="first_name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control form-control form-control-lg text-capitalize" placeholder="Last Name" name="last_name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="role">Role</label>
                                        <select class="form-select text-capitalize form-control-lg mb-3"  name="role_id">
                                            <option selected>-- Select User Role --</option>
                                            <?php foreach ($roles as $role): ?>
                                                <option value="<?= $role['id'] ?>">
                                                    <?= $role['name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control form-control-lg" placeholder="Email id" name="email">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="mobile">Mobile</label>
                                        <input type="tel" class="form-control form-control form-control-lg text-capitalize" placeholder="Mobile" name="mobile">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="password">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control form-control form-control-lg text-capitalize" placeholder="password" name="password" id="addUserPasswordField">
                                            <span class="input-group-text" id="addUserTogglePassword">Show/Hide Password</span>
                                        </div>
                                    </div>
                                
                                
                                    
                                    <div class="mt-3 text-center">
                                        <button 
                                            type="submit"
                                            class="btn btn-lg btn-primary text-capitalize"
                                            >
                                            Create User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                 
            </div>

        </div>
    </main>

    
    