<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tasks;

class Tasks extends Model
{
    
     

    protected $table = 'tasks';
    



    public function updateFromRequest(Request $request, $id)
    {
        $task = $this->find($id);
    
        if ($task) {
            // Update the task with the request data
            $task->update($request->all());
            return $task;
        }
    }    
}
