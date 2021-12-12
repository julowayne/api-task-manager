<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class ApiTaskController extends Controller
{
    public function getAllTasks(Request $request){

        $tasks = Task::all();
        return $tasks;
    }
    public function getTaskById(Request $request){

        $task = Task::where('id', $request->id)->first();
        return $task;
    }
    public function updateTaskById(Request $request){
        
        $task = Task::where('id', $request->id )->first();
        $task->body = $request->input('body');
    }
    public function createTask(Request $request){
        
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $createTask = new Task;
        $createTask->body = $request->input('body');
    }
    public function deleteTaskById(Request $request){

        $task = Task::where('id', $request->id )->first();
        $task->delete();
    }
}
