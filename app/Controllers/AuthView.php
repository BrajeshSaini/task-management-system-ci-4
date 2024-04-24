<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\RoleModel;

class AuthView extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    
    public function login()
    {
        // Load the Session library if it's not already loaded
        $session = \Config\Services::session();

        // Check if a specific session variable exists
        if ($session->has('user')) {
            return redirect()->route('task');
        } 
        else{
            return view('common/header')
            .view('auth/login');
        }
       
    }
    
    public function signup(): string
    {

        return view('common/header')
                .view('auth/signup');
    }
    
    public function submit_login(){
            
        helper(['form', 'url']);

        $validation = \Config\Services::validation();  
        
        $validation->setRules([
            'email' => 'required|valid_email',      // here users is users table and email is column name.                   
            'password' => 'required|min_length[6]'
        ]);

        if($validation->withRequest($this->request)->run())
        {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $user_model = new UserModel();


            $db = \Config\Database::connect();

            $query = $db->table('users')
                ->select('users.*, roles.id As role_id, roles.name As role_name') // Select all columns from both tables
                ->join('roles', 'roles.id = users.role_id') // Perform a join on role_id column
                ->where('users.email', $email)
                ->orWhere('users.email', $email)
                ->limit(1) // Limit to one result
                ->get();
    
            $user = $query->getRow();

            if ($user) {

                if (password_verify($password, $user->password)) {
                    // Password is correct, generate a new token
                    $pass_data = [
                        'user_id'=>$user->id,
                        'first_name'=>$user->first_name,
                        'last_name'=>$user->last_name,
                        'email'=>$user->email,
                        'role_id'=>$user->role_id,
                        'role_name'=>$user->role_name
                    ];

                    // Password is correct, start a new session and save the user's email
                    $this->session->set('user', $pass_data);
                    return redirect()->to('/task');
                    
                    
                } else {
                    // Password is incorrect
                    $incorrect_password_err = [
                        'error' => true,
                        'msg' => 'Invalid username/email or password'
                    ];
                    print_r( $incorrect_password_err);
                    
                     

                }
            } else {
                // User not found
                    $user_not_found_err = [
                        'error' => true,
                        'msg' => 'Invalid username/email or password'
                    ];
                    
                    print_r($user_not_found_err);
            }
        }
        else{
            $validation_res = [
                'error' =>  $validation->getErrors(),
            ];
            print_r($validation_res);
        }
          
    }


    public function logout()
    {
        // Destroy the session
        $this->session->destroy();

        // Redirect or respond as needed
        return redirect()->to('/');
    }
}
    