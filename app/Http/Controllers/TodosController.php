<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $todo = new Todo;
        $todo->title = $request->input('title');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');


        if ($todo->save()) {
            return redirect("/todo/{$todo->id}")->with('success', 'Todo Created');
        } else {
            return redirect('/todo/create')->withErrors(['Failed to create todo'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todos.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');


        if (false) {
            return redirect("/todo/{$todo->id}")->with('success', 'Todo Updated');
        } else {
            return redirect("/todo/{$todo->id}/edit")->withErrors(['Failed to update todo'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);

        if ($todo->delete()) {
            return redirect('/')->with('success', 'Todo deleted');
        } else {
            return redirect("/todo/{$todo->id}")->withErrors(['Failed to delete todo']);
        }
    }
}
