<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                        ->get('https://gorest.co.in/public/v2/users');
        $result = $response->object();
        return view('users.index', compact('result'));
    }

    /**
     * Send users creation to gorest via API.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'user_name'          => 'required|string|max:100',
            'user_email'         => 'required|email|max:100',
            'user_gender'         => 'required|string|max:10',
            'user_status'         => 'required|string|max:10',
        ]);

        $user_array = array('name' => $request->user_name,
                            'email' => $request->user_email, 
                            'gender' => $request->user_gender, 
                            'status' => $request->user_status );

        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                    ->post('https://gorest.co.in/public/v2/users/', $user_array);

        if ($response->ok() && isset($response->id)) {
            return redirect()->back()->with('message', 'Succesful!');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }

    /**
     * Return create user page.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createPage()
    {
        return view('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ud_response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                        ->get('https://gorest.co.in/public/v2/users/'.$id);
        $user_details = $ud_response->object();
        
        if (isset($user_details->message)) {
            $user_details = false;
        }

        $posts_response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                            ->get('https://gorest.co.in/public/v2/users/'.$id.'/posts');
        $posts = $posts_response->object();

        $todos_response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                            ->get('https://gorest.co.in/public/v2/users/'.$id.'/todos');
        $todos = $todos_response->object();

        return view('users.show', compact('user_details', 'posts', 'todos'));
    }

    /**
     * Send users update to gorest via API.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_name'          => 'required|string|max:100',
            'user_email'         => 'required|email|max:100',
            'user_gender'         => 'required|string|max:10',
            'user_status'         => 'required|string|max:10',
        ]);

        $user_array = array('name' => $request->user_name,
                            'email' => $request->user_email, 
                            'gender' => $request->user_gender, 
                            'status' => $request->user_status );

        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                    ->put('https://gorest.co.in/public/v2/users/'.$id, $user_array);

        if ($response->ok() && isset($response->id)) {
            return redirect()->back()->with('message', 'Succesful!');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }

    /**
     * Send users delete to gorest via API.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                    ->delete('https://gorest.co.in/public/v2/users/'.$id);

        if ($response->ok()) {
            return redirect()->back()->with('message', 'Succesful!');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }
}
