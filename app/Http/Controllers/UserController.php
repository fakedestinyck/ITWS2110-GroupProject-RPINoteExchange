<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\PostRequest;
use App\Post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $input = $request->all();

        if ($file = $request->file('file_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $myFile = File::create(['file' => $name]);
            $input['file_id'] = $myFile->id;
        }
        Post::create($input);
        return redirect('/user/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($file = $request->file('file_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $myFile = File::create(['file' => $name]);
            $input['file_id'] = $myFile->id;
        }

        $post->update($input);
        return redirect('/user/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
