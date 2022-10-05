<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                    ->get('https://gorest.co.in/public/v2/todos');
        $result = $response->object();
        return view('todos.index', compact('result'));
    }

    /**
     * Send todos creation to gorest via API.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id'          => 'required|numeric',
            'todos_title'         => 'required|string|max:100',
            'todos_status'         => 'required|string|max:10',
            'todos_due_date'         => 'required|date_format:Y-m-d',
        ]);

        $todos_array = array('user_id' => $request->user_id,
                            'title' => $request->todos_title, 
                            'status' => $request->todos_status, 
                            'due_date' => $request->todos_due_date );

        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                    ->post('https://gorest.co.in/public/v2/users/'.$request->user_id.'/todos', $todos_array);

        if ($response->ok() && isset($response->id)) {
            return redirect()->back()->with('message', 'Succesful!');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }

    /**
     * Return create todos page.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createPage()
    {
        return view('todos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
