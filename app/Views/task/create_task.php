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
   <main class="content pt-3 px-3" id="create_task">
      <div class="container-fluid p-0">


            <div class="row align-items-center mb-2 pb-1">
                <div class="col-6">
                <h1 class="h3 mb-0 mt-0 text-capitalize">Add Task</h1>
                </div>
                <div class="col-6 text-end">
                <?= anchor('/task', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-left-long"></i></button>') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        
                        <div class="card-body">
                           
                                <?= session()->getFlashdata('error') ?>
                                <form method="post" action="<?= base_url('/add_task') ?>">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="task_created_by_user_id" value="<?=$user_info['user_id']?>" />
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="priority" class="mb-2">priority</label>
                                            <select class="form-select text-capitalize form-control-lg mb-3" name="priority">
                                                <option selected>-- Select Task priority --</option>
                                                <option >high</option>
                                                <option >Medium</option>
                                                <option >low</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="due_date" class="mb-2">Due Date</label>
                                            <input type="date" class="form-control form-control-lg " placeholder="" name="due_date">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="assigned_user" class="mb-2">Assigned User</label>
                                            <select class="form-select text-capitalize form-control-lg mb-3" name="assigned_user_id">
                                                <option selected>-- Select Assigned User --</option>
                                                <?php foreach ($users as $user): ?>
                                                    <option value="<?= $user['id'] ?>">
                                                        <?= $user['first_name'] ?>
                                                    </option>
                                                 <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="title" class="mb-2">Title</label>
                                            <input type="text" class="form-control form-control form-control-lg text-capitalize" name="title" placeholder="Title">
                                        </div>
                                        <div class="col-12 my-3">
                                        <label for="description" class="mb-2">Description</label>
                                            <textarea class="form-control form-control-lg text-capitalize" rows="2" name="description" placeholder="Task Description"></textarea>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label for="status" class="mb-2">Status</label>
                                            <select class="form-select text-capitalize form-control-lg mb-3" name="status">
                                                <option selected>-- Select Task Status --</option>
                                                <option>Start</option>
                                                <option>Pending</option>
                                                <option>Due</option>
                                                <option>Completed</option>
                                            </select>
                                        </div>
                                        
                                       
                                        <div class="mt-3 text-center">
                                            <button 
                                                type="submit"
                                                class="btn btn-lg btn-primary text-capitalize"
                                                >
                                                Create Task
                                            </button>
                                        </div>
                                    </div>
                                </form>
                           
                        </div>
                    </div>

                 
            </div>

        </div>
    </main>

  