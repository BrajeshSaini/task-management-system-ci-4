<?php

namespace App\Controllers;
use App\Models\TaskModel;
use App\Models\UserModel; // Ensure you import the correct namespace

class TaskView extends BaseController
{
    protected $taskModel;

    public function __construct() {
        $this->taskModel = new TaskModel();
    }

    public function index(): string{

        $db = \Config\Database::connect();
        $TaskModel = new TaskModel();
        
        $data['uri'] = uri_string();
        // $data['tasks'] = $TaskModel->orderBy('id', 'DESC')->findAll();

        $query = $db->table('tasks')
            ->select('tasks.*, users.first_name As user_first_name, users.last_name As user_last_name, roles.name As role_name') // Select all columns from both tables
            ->join('users', 'users.id = tasks.assigned_user_id') // Perform a join on role_id column
            ->join('roles', 'roles.id = users.role_id') // Perform a join on role_id column
            ->get();

            $data['tasks'] = $query->getResult();
     
        return view('common/header')
                .view('task/list_of_task',$data)
                .view('common/footer');
    }
    public function create(){
        
        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data['uri'] = uri_string();
        $data['users'] = $users;


        return view('common/header')
                .view('task/create_task',$data);
    }
  
   

    public function update(){
        // Get the task ID from the URL
        $task_id = $this->request->uri->getSegment(2);
        $data['task_id'] = $task_id;

        $db = \Config\Database::connect();
    
        $query = $db->table('tasks')
        ->select('tasks.*, users.first_name As user_first_name, users.last_name As user_last_name, roles.name As role_name') // Select all columns from both tables
        ->join('users', 'users.id = tasks.assigned_user_id') // Perform a join on role_id column
        ->join('roles', 'roles.id = users.role_id') // Perform a join on role_id column
        ->where('tasks.id', $task_id) // Apply where condition to filter tasks by task ID
        ->get();

        $single_task = $query->getRow();

        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data['uri'] = uri_string();
        $data['single_task'] = $single_task;
        $data['users'] = $users;
     

        return view('common/header')
                .view('task/edit_task',$data);

    }

    public function view(){
        $data['uri'] = uri_string();
        // Get the task ID from the URL
        $task_id = $this->request->uri->getSegment(2);
        $data['task_id'] = $task_id;

        $db = \Config\Database::connect();
    
        $query = $db->table('tasks')
        ->select('tasks.*, users.first_name As user_first_name, users.last_name As user_last_name, roles.name As role_name') // Select all columns from both tables
        ->join('users', 'users.id = tasks.assigned_user_id') // Perform a join on role_id column
        ->join('roles', 'roles.id = users.role_id') // Perform a join on role_id column
        ->where('tasks.id', $task_id) // Apply where condition to filter tasks by task ID
        ->get();

        $single_task = $query->getRow();

        $data['single_task'] = $single_task;

        return view('common/header')
                .view('task/view_task',$data);
    }

    // Start Click Events Add Task, Update Task and Delete Task

    public function add_task(){
        helper(['form', 'url']);
      
        echo $this->request->getVar('task_created_by_user_id');
        echo $this->request->getVar('title');
        echo $this->request->getVar('description');
        echo $this->request->getVar('priority');
        echo $this->request->getVar('due_date');
        echo $this->request->getVar('status');
        echo $this->request->getVar('assigned_user_id');


        $validation = \Config\Services::validation();

        $validation->setRules([
            'title' => 'required',
            'priority' => 'required',      // here users is users table and email is column name.                   
            'due_date' => 'required',
            'due_date' => 'required',
            'assigned_user_id' => 'required',
            'status' => 'required'
        ]);

        if($validation->withRequest($this->request)->run())
        {
            // Validation passed, you can proceed with user registration
            $add_task_data = [
                'task_created_by_user_id' => $this->request->getVar('task_created_by_user_id'),
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'priority' => $this->request->getVar('priority'),
                'due_date' => $this->request->getVar('due_date'),
                'assigned_user_id' => $this->request->getVar('assigned_user_id'),
                'status' => $this->request->getVar('status'),
                'updated_date' => date('Y-m-d H:i:s') // gets the current date and time
            ];
            $task_model = new TaskModel();
            try{
                $task_model->insert($add_task_data);
                $signup_res = [
                    'status' => 201,
                    'error' => null,
                    'msg' => 'sign up successfully'
                ];
                
                return redirect()->to('/task');
                    // return $this->respondCreated($signup_res);
            } 
            catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                print_r($e->add_task_data());
                // return $this->failServerError('Database error: ' . $e->getMessage());
            }
        }
        else
        {
            $validation_res = [
                'error' =>  $validation->getErrors(),
            ];
            print_r($e->validation_res);
            // return $this->respondCreated($validation_res);
        }

        
    }
    // End Add

    public function update_task(){

      
        helper(['form', 'url']);
        
        // Get the task ID from hidden field
        $task_id = $this->request->getVar('id');


        $validation = \Config\Services::validation();

        $validation->setRules([
            'title' => 'required',
            "priority"=>'required',
            'description' => 'required',      // here users is users table and email is column name.                   
            'due_date' => 'required',
            'assigned_user_id' => 'required',
            'status' => 'required'
        ]);

        if($validation->withRequest($this->request)->run())
        {
            // Validation passed, you can proceed with user registration
            $task_update_data =[
                'task_created_by_user_id' => $this->request->getVar('task_created_by_user_id'),
                'title' => $this->request->getVar('title'),
                'priority' => $this->request->getVar('priority'),
                'description' => $this->request->getVar('description'),
                'due_date' => $this->request->getVar('due_date'),
                'assigned_user_id' => $this->request->getVar('assigned_user_id'),
                'status' => $this->request->getVar('status'),
                'created_date' => date('Y-m-d H:i:s') // gets the current date and time
            ];

            $task_model = new TaskModel();
            try{
                $task_model->update($task_id,$task_update_data);
                return redirect()->to('/task');
            } 
            catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                print_r($e);
            }
           
        }
        else
        {
            $validation_res = [
                'error' =>  $validation->getErrors(),
            ];
            print_r($validation_res);
            // return $this->respondCreated($validation_res);
        }
        
    }


    
    public function delete($id =null){


        // Get the task ID from the URL
        $task_id = $this->request->uri->getSegment(2);
        $data['task_id'] = $task_id;

        // Check if the id is set or not
        if (isset($task_id)) {
            $taskModel = new TaskModel();
            // Check if the task exists
           $task = $taskModel->find($task_id);
            
            if (!$task) {
                return $this->response->setStatusCode(500, 'Task not found');
            }
            else{
                // Perform the deletion
               $deleted = $taskModel->delete($task_id);
            
               if ($deleted) {
                    return $this->response->setStatusCode(200, 'Task Deleted Successfully');
                } else {
                    return $this->response->setStatusCode(500, 'Failed to Delete Task');
                }
            }
       
        }
        else{
            // echo 'ID is not set';
            return $this->response->setStatusCode(500, 'ID is not set');
        }
    }

    public function fetchTasksByPriority($priority = null)
    {
        $db = \Config\Database::connect();

        $priority = $this->request->uri->getSegment(2);
        $taskModel = new TaskModel();

        $query = $db->table('tasks')
        ->select('tasks.*, users.first_name As user_first_name, users.last_name As user_last_name, roles.name As role_name') // Select all columns from both tables
        ->join('users', 'users.id = tasks.assigned_user_id') // Perform a join on role_id column
        ->join('roles', 'roles.id = users.role_id') // Perform a join on role_id column
        ->where('tasks.priority', $priority) // Apply where condition to filter tasks by task ID
        ->get();

        $tasks = $query->getResult();
        return $this->response->setJSON($tasks);
    }

    public function fetchAllTasks()
    {
        $db = \Config\Database::connect();
        $taskModel = new TaskModel();
        $query = $db->table('tasks')
        ->select('tasks.*, users.first_name As user_first_name, users.last_name As user_last_name, roles.name As role_name') // Select all columns from both tables
        ->join('users', 'users.id = tasks.assigned_user_id') // Perform a join on role_id column
        ->join('roles', 'roles.id = users.role_id') // Perform a join on role_id column
        ->get();

        $tasks = $query->getResult();

        return $this->response->setJSON($tasks);
    }

    
}
    