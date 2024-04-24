<?php
    namespace App\Models;
    use CodeIgniter\Model;
    
    class RoleModel extends Model{
        protected $table = "roles";
        protected $primaryKey = "id";
        protected $allowedFields = [
            "name",
            "created_date",
            "updated_date"
        ];
    }