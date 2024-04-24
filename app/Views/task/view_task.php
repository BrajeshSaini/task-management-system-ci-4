   <!-- Include header -->
   <?= $this->include('common/aside') ?>
   <style>
    .textarea_label{
        min-height: 100px;
        max-height: auto;
    }
   </style>
   <main class="content pt-3 px-3">
      <div class="container-fluid p-0">


            <div class="row align-items-center mb-2 pb-1">
                <div class="col-6">
                <h1 class="h3 mb-0 mt-0 text-capitalize">View Task</h1>
                </div>
                <div class="col-6 text-end">
                <?= anchor('/task', '<button class="btn btn-primary text-capitalize"> <i class="fa-solid fa-left-long"></i></button>') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="due_date" class="mb-2">priority</label>
                                    <label for="" class="form-control form-control-lg">
                                        <?=$single_task->priority;?>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label for="due_date" class="mb-2">Due Date</label>
                                    <label for="" class="form-control form-control-lg">
                                        <?=$single_task->due_date;?>
                                    </label>
                                </div>

                                <div class="col-md-4">
                                    <label for="assigned_user" class="mb-2">Assigned User</label>
                                    <label for="" class="form-control form-control-lg">
                                        <?=$single_task->user_first_name;?>
                                    </label>
                                </div>
                                
                              
                                <div class="col-md-12">
                                    <label for="title" class="mb-2">Title</label>
                                    <label for="" class="form-control form-control-lg text-capitalize">
                                        <?=$single_task->title;?>
                                    </label>
                                </div>
                                <div class="col-12 my-3">
                                    <label for="description" class="mb-2">Description</label>
                                    <label for="" class="form-control form-control-lg text-capitalize textarea_label">
                                        <?=$single_task->description;?>
                                    </label>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="status" class="mb-2">Status</label>
                                    <label for="" class="form-control form-control-lg">
                                        <?=$single_task->status;?>
                                    </label>
                                </div>
                               
                             
                            </div>
                           
                        </div>
                    </div>

                 
            </div>

        </div>
    </main>

    