<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiTaskController extends Controller
{
    public function getAllTasks(){

        $tasks = Task::all();
        return $tasks;
    }

    public function getTaskById($taskId, Request $request){

        $task = Task::where('id', $taskId)->first();

        if (!$task) {
            return response()->json(['message' => "Task Not Found"], 404);
        }

        if ($task->user_id != $request->user()->id) {
            return response()->json(["message" => "Forbidden"], 403);
        }
        return $task;
    }

    public function updateTaskById($taskId, Request $request){

        $task = Task::where('id', $taskId )->first();

        if (!$task) {
            return response()->json(['message' => "Task Not Found"], 404);
        }

        if ($task->user_id != $request->user()->id) {
            return response()->json(["message" => "Forbidden"], 403);
        }

        $task->body = $request->input('body');

        $task->save();

        return response()->json([$task], 200);
    }

    public function createTask(Request $request){
        
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $createTask = new Task;
        $createTask->body = $request->input('body');
        $getUserId = User::where('id', Auth::user()->id )->first();

        $createTask->user_id = $getUserId->id;
        $createTask->save();

        return response()->json([$createTask], 201);
    }

    public function deleteTaskById($taskId, Request $request){

        $task = Task::where('id', $taskId )->first();

        if (!$task) {
            return response()->json(['message' => "Task Not Found"], 404);
        }

        if ($task->user_id != $request->user()->id) {
            return response()->json(["message" => "Forbidden"], 403);
        }

        $task->delete();

        return response()->json(["Task was successfully deleted"],204);
    }
}
