<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        Todo::create($request->validate([
          'description' => 'required|unique:todos',
          'category_id' => 'required'
        ]));
        return back();
    }

    public function update(Request $request, todo $todo)
    {
        $todo->update($request->all());
        return back();
    }

    public function destroy(todo $todo)
    {
        $todo->delete();
        return back();
    }

    public function reorder(Request $request) {
      foreach ($request->input('todos') as $todoData) {
        Todo::where('id', $todoData['id'])->update([
          'position' => $todoData['position'],
          'category_id' => $todoData['category_id']
          ]);
      }
      return back();
    }
}