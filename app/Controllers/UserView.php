<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\TaskModel;

class UserView extends BaseController
{
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        // $userModel = new UserModel();

        
        $db = \Config\Database::connect();
        $query = $db->table('users')
            ->select('users.*, roles.name As role_name') // Select all columns from both tables
            ->join('roles', 'roles.id = users.role_id') // Perform a join on role_id column
            ->get();

        $data['users'] = $query->getResult();


        $data['uri'] = uri_string();
        
        return view('common/header')
                .view('user/list_of_user',$data)
                .view('common/footer');
    }
    

    public function create(): string
    {
        $roleModel = new RoleModel();
        $roles = $roleModel->findAll();
        $data['uri'] = uri_string();
        $data['roles'] = $roles;

        return view('common/header')
                .view('user/create_user',$data);
    }

    public function update(): string
    {

        // Get the task ID from the URL
        $user_id = $this->request->uri->getSegment(2);
        $data['user_id'] = $user_id;

        
        $roleModel = new RoleModel();
        $roles = $roleModel->findAll();

        $userModel = new UserModel();
        $single_user = $userModel->find($user_id);

        $data['uri'] = uri_string();
        $data['roles'] = $roles;
        $data['single_user']=$single_user;

        return view('common/header')
                .view('user/edit_user',$data);
    }

    public function view(){
        
        
        // Get the task ID from the URL
        $user_id = $this->request->uri->getSegment(2);

        $data['uri'] = uri_string();
        $db = \Config\Database::connect();
        $query = $db->table('users')
            ->select('users.*, roles.name As role_name') // Select all columns from both tables
            ->join('roles', 'roles.id = users.role_id') // Perform a join on role_id column
            ->where('users.id', $user_id) // Apply where condition to filter tasks by task ID
            ->get();

        $data['single_user'] = $query->getRow();

        return view('common/header')
                .view('user/view_user',$data);
    }
    
    
    
    public function profile(): string
    {
        $data['uri'] = uri_string();
        return view('common/header')
                .view('user/profile',$data);
    }

    public function add_user(){

        helper(['form', 'url']);
  

        $validation = \Config\Services::validation();

        $validation->setRules([
            'first_name' => 'required',
            'last_name' => 'required',     
            'email' => 'required|valid_email|is_unique[users.email]',    // here users is users table and email is column name.                   
            'mobile' => 'required|is_unique[users.mobile]',              // here users is users table and mobile is column name.                   
            'password' => 'required',
            'role_id' => 'required'
        ]);

        if($validation->withRequest($this->request)->run())
        {
            // Validation passed, you can proceed with user registration
            $add_task_data = [
                'first_name' => $this->request->getVar('first_name'),
                'last_name' => $this->request->getVar('last_name'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'password' =>password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),           /*  the password hashing algorithm used by password_hash() in PHP, especially when PASSWORD_DEFAULT is used, is designed to be one-way, meaning it's not possible to decode or reverse the hashed password to retrieve the original plaintext password. */
                'role_id' => $this->request->getVar('role_id'),
                'updated_date' => date('Y-m-d H:i:s') // gets the current date and time
            ];
            $user_model = new UserModel();
            try{
                $user_model->insert($add_task_data);
                $signup_res = [
                    'status' => 201,
                    'error' => null,
                    'msg' => 'create successfully'
                ];
                
                return redirect()->to('/user');
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
            $errorMessage = 'Error from db';
            return view('custom_error/error', ['errorMessage' =>$errorMessage,'errors'=>$validation->getErrors(),'from'=>'user_add',]);
        }

    }

    

    public function edit_user(){
        // echo 'edit user';
        helper(['form', 'url']);
        
        // Get the task ID from hidden field
        $user_id = $this->request->getVar('id');

        
        $validation = \Config\Services::validation();

        $validation->setRules([
            'first_name' => 'required',
            "last_name"=>'required',
            'email' => 'required',
            'mobile' => 'required',
            'role_id' => 'required'
        ]);


        if($validation->withRequest($this->request)->run())
        {
            // Validation passed, you can proceed with user registration
            $task_update_data =[
                'task_created_by_user_id' => $this->request->getVar('task_created_by_user_id'),
                'first_name' => $this->request->getVar('first_name'),
                'last_name' => $this->request->getVar('last_name'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'password' =>password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),           /*  the password hashing algorithm used by password_hash() in PHP, especially when PASSWORD_DEFAULT is used, is designed to be one-way, meaning it's not possible to decode or reverse the hashed password to retrieve the original plaintext password. */
                'role_id' => $this->request->getVar('role_id'),
                'created_date' => date('Y-m-d H:i:s') // gets the current date and time
            ];

            $user_model = new UserModel();
            try{
                $user_model->update($user_id,$task_update_data);
                return redirect()->to('/user');
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
            $errorMessage = 'Error from db';
            return view('custom_error/error', ['errorMessage' =>$errorMessage,'errors'=>$validation->getErrors(),'from'=>'user_add',]);
        }
    }


    
    public function delete($id =null){
        // Get the task ID from the URL
        $user_id = $this->request->uri->getSegment(2);
        $data['user_id'] = $user_id;

        // Check if the id is set or not
        if (isset($user_id)) {
            $userModel = new UserModel();
            // Check if the task exists
            $user = $userModel->find($user_id);
            
            if (!$user) {
                return redirect()->to(base_url('user'))->with('error', 'Task not found.');
            }
            else{
                // Check if the user has associated tasks
                $taskModel = new TaskModel();
                $tasks = $taskModel->where('assigned_user_id', $user_id)->findAll();

                # empty() is a PHP function that checks if a variable is empty. It returns true if the variable is empty or contains a value that evaluates to false. Otherwise, it returns false.
                if(!empty($tasks)){
                    // echo 'not empty';
                    
                    $errorMessage = 'Cannot delete user. The user has associated tasks.';

                    return view('custom_error/error', ['errorMessage' => $errorMessage,'from'=>'user']);
                }
                else{
                    echo 'empty';
                    // Perform the deletion
                    $deleted = $userModel->delete($user_id);
        
                    if ($deleted) {
                        return redirect()->to(base_url('user'))->with('success', 'Task deleted successfully.');
                    } else {
                        return redirect()->to(base_url('user'))->with('error', 'Failed to delete task.');
                    }
                }
            }
        }
        else{
            // echo 'ID is not set';
            return redirect()->to(base_url('task'))->with('error', 'ID is not set.');
        }
    }

    

}
    