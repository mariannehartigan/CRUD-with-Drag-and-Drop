<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, todo $todo)
    {
        $todo->update($request->all());
        return back();
    }

    public function destroy(string $id)
    {
        //
    }
}
