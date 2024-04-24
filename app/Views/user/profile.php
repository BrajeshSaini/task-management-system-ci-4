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
               <h1 class="h3 mb-0 mt-0 text-capitalize">Profile</h1>
            </div>
            <div class="col-6 text-end">
               <?= anchor('/task', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-left-long"></i></button>') ?>
            </div>
         </div>
        <div class="row">
            <div class="col-12 offset-0 col-md-6 offset-md-2 col-xl-4 offset-xl-4">
                <div class="card mb-3">
                  
                    <div class="card-body text-center">
                        <img src="img/avatars/avatar-6.png" alt="Christina Mason"
                            class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mb-0"><?= $user_info['first_name'].' '.$user_info['last_name'];?></h5>
                        <div class="text-muted mb-2"><?= $user_info['email']?></div>
                        <a href="/update_user/<?=$user_info['user_id'];?>" class="btn btn-outline-primary btn-sm text-capitalize"><i class="fa-solid fa-pen-to-square"></i> <span class="align-middle">Edit</span> </a>
                    </div>
                 
                </div>
            </div>
