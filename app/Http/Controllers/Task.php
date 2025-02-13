<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class Task extends Controller
{

   
    public function listTask()
    {
        $tasks = Tasks::where("user_id",auth()->user()->id)->where("status", NULL)->paginate(3);
        return view("welcome", compact('tasks'));
    }

    public function addTask()
    {
        return view('tasks.add');
    }

    
    public function edit(Tasks $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function addTaskPost(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'deadline' => 'required'
        ]);
     

        $task = new Tasks();
        $task->title  = $request->title;
        $task->description  = $request->description;
        $task->deadline  = $request->deadline;
        $task->user_id  = auth()->user()->id;

        if($task->save())
        {
            return redirect(route("task.index"))->with("success","Task added successfully!");
        } else
        {
            return redirect(route("task.add"))->with("error", "Task not added :(");
        }

    }


    public function update(Request $request, Tasks $task)
    {
               
        // If task is not found, return an error message
        if (!$task) {
            return redirect()->route('task.index')->with('error', 'Task not found.');
        }

        
        // Check if the logged-in user is the owner of the task
        if ($task->user_id != auth()->id()) {            
            return redirect()->route('task.index')->with('error', 'You do not have permission to edit this task.');
        }

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string', // Ensure description is not empty
        ]);

        // Update the task        
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();

        // Redirect with success message
        return redirect()->route('task.index',['id' => $task->id])->with('success', 'Task updated successfully!');

    }

    public function updateTaskStatus($id)
    {
        if(Tasks::where("user_id",auth()->user()->id)
        ->where('id', $id)->update(['status' => 'completed']))
        {
            return redirect(route("task.index"))->with("success","Task completed");
        } else
        {
            return redirect(route("task.index"))->with("error","Error occured while updating, try again");
        }
    }

    public function deleteTask($id)
    {
        if(Tasks::where("user_id",auth()->user()->id)->
        where('id', $id)->delete(['status' => 'completed']))
        {
            return redirect(route("task.index"))->with("success","Task deleted");
        } else
        {
            return redirect(route("task.index"))->with("error","Error occured while deleting, try again");
        }
    }
}
