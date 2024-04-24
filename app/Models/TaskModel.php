<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class TaskModel extends Model{
        protected $table = "tasks";
        protected $primaryKey = "id";
        protected $allowedFields = [
            "title",
            "description",
            "priority",
            "due_date",
            "status",
            "assigned_user_id",
            "task_created_by_user_id",
            "created_date",
            "updated_date"  
        ];
    }

