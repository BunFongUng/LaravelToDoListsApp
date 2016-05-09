<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ToDoController extends Controller
{
    public $restful = true;

    public function getIndex() {
        $todos = Todo::all();
        return view('index')->with('todos', $todos);
    }

    public function postAdd() {
        if(\Illuminate\Support\Facades\Request::ajax()) {
            $todo = new Todo();
            $todo->title = Input::get('title');
            $todo->save();
            $last_todo = $todo->id;
            $todos = Todo::whereId($last_todo)->get();
            return view('ajaxData')->with('todos', $todos);
        }
    }

    public function postUpdate($task_id) {
        if(\Illuminate\Support\Facades\Request::ajax()) {
            $task = Todo::find($task_id);
            $task->title = Input::get('title');
            $task->save();
            return "OK";
        }
    }

    public function getDelete($id) {
        if(\Illuminate\Support\Facades\Request::ajax()) {
            //SELECT * FROM todos WHERE id = $id;
            $todo = Todo::whereId($id)->first();
            //if it is found then delete
            $todo->delete();
            return "OK";
        }
    }

    public function getDone($id) {
        if(\Illuminate\Support\Facades\Request::ajax()) {
            $task = Todo::find($id);
            $task->status = 1;
            $task->save();
            return "OK";
        }
    }
}
