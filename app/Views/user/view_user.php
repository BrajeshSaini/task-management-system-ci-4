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
                <h1 class="h3 mb-0 mt-0 text-capitalize">View User</h1>
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
                            <form method="post" action="<?= base_url('/edit_user') ?>">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first_name">First Name</label>
                                        <label for="" class="form-control form-control-lg">
                                            <?=$single_user->first_name;?>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="last_name">Last Name</label>
                                        <label for="" class="form-control form-control-lg">
                                            <?=$single_user->last_name;?>
                                        </label>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="last_name">Role</label>
                                        <label for="" class="form-control form-control-lg">
                                            <?=$single_user->role_name;?>
                                        </label>
                                    </div>
                                
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                        <label for="" class="form-control form-control-lg">
                                            <?=$single_user->email;?>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="mobile">Mobile</label>
                                    <label for="" class="form-control form-control-lg">
                                            <?=$single_user->mobile;?>
                                        </label>
                                    </div>
                                 
    
                                
                                
                                    
                                    
                                </div>
                            </form>
                        </div>
                    </div>

                 
            </div>

        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#togglePassword').click(function() {
                var editPasswordInput = $('#editUserPasswordField');
                var type = editPasswordInput.attr('type') === 'password' ? 'text' : 'password';
                editPasswordInput.attr('type', type);
            });
        })
    </script>
    