<?php

namespace App\Controllers;
use App\Models\RoleModel;

class RoleView extends BaseController
{

    public function index(): string
    {
        $roleModel = new RoleModel();
        $roles = $roleModel->findAll();
        
        $data['uri'] = uri_string();
        $data['roles'] = $roles;
        return view('common/header')
                .view('role/list_of_role', $data);
    }
    
}
    