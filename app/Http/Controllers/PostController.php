<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                    ->get('https://gorest.co.in/public/v2/posts');
        $result = $response->object();
        return view('posts.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id'          => 'required|numeric',
            'post_title'         => 'required|string|max:100',
            'post_content'         => 'required|string|max:255',
        ]);

        $post_array = array('user_id' => $request->user_id,
                            'title' => $request->post_title, 
                            'body' => $request->post_content );

        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                    ->post('https://gorest.co.in/public/v2/users/'.$request->user_id.'/posts', $post_array);

        if ($response->ok() && isset($response->id)) {
            return redirect()->back()->with('message', 'Succesful!');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }

    /**
     * Return create post page.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createPage()
    {
        return view('posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::withToken('4f4afd61e9076f7a5ababc6d974c2b1c8621ae1b6ec7133efc6e86ac43280c2d')
                    ->get('https://gorest.co.in/public/v2/posts/'.$id.'/comments');
        $result = $response->object();
        return view('posts.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
