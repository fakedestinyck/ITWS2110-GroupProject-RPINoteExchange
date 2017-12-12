<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Major;
use App\Post;
use App\Type;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        return view('user.profile.index', compact('user'));//
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
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

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
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::User();
        return view('user.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request)
    {
        $user = Auth::User();
        if(!empty($request->get('password'))) {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        } else {
            $input = $request->except(['password']);
        }
        $user->update($input);
        return redirect('/user/profile');
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

    public function dashboard(){
        $users = User::all();
        $majors = Major::pluck('name','id')->all();
        $types = Type::pluck('name','id')->all();
        $postsRequested = Post::where('user_id',Auth::User()->id)->where('is_shown','1')->where('requestedBy', '!=', NULL)->orderBy('updated_at','desc')->take(5)->get();
        $postsRecent = Post::where('is_shown','1')->where('requestedBy', NULL)->orderBy('updated_at','desc')->take(5)->get();
        return view('user.index',compact('postsRequested','postsRecent','majors','types','users'));
    }
}
