<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class UserModel extends Model{
        protected $table = "users";
        protected $primaryKey = "id";
        protected $allowedFields = [
            "first_name",
            "last_name",
            "email",
            "mobile",
            "password",
            "role_id",
            "created_date",
            "updated_date"  
        ];
    }