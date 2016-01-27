<?php

namespace App\Http\Controllers;

use App\Task as Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    public function __construct() {
    	$this->middleware( 'auth' );
    }

    public function index(Request $request) {
        $tasks = Task::where( 'user_id', $request->user()->id)->get();

        //echo $tasks;
        
        return view( 'tasks.index', [
           'tasks' => $tasks,
           ]);
        //return view('tasks.index');
    }

    public function indexdashboard(Request $request)
    {
        $tasks = Task::where('user_id', $request->user()->id)->get();
        
        return view( 'dashboard', [
            'tasks' => $tasks,
            ]);
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|min:3|max:255',
           ]);

    	$request->user()->tasks()->create([
           'name' => $request->name,
           ]);

       return redirect( '/tasks' );
    }

   public function destroy(Request $request, Task $task) {
    	//$this->authorize('destroy', $task);

       $task->delete();

       return redirect( '/tasks' );
    }

   public function put($done, Task $task) {
    Task::where( 'id', $task->id )->update([ 'done' => $done ]);

    return redirect( '/tasks' );

        //echo 'hello';
    }
}
