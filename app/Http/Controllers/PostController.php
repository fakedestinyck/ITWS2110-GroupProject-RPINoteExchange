<?php

namespace App\Http\Controllers;

use App\Events\NewAskRequest;
use App\File;
use App\Major;
use App\Post;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('is_shown','1')->where('requestedBy', NULL)->paginate(10);
        $users = User::all();
        $majors = Major::pluck('name','id')->all();
        $types = Type::pluck('name','id')->all();
        if (Auth::user()->isAdmin()) {
            return view('admin.posts.index',compact('posts','users','majors','types'));
        } else {
            return view('user.posts.index',compact('posts','users','majors','types'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::pluck('name','id')->all();
        $types = Type::pluck('name','id')->all();
        return view('user.posts.create',compact('majors','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $input = $request->all();

        if ($up_file = $request->file('file_id')) {
            $name = time() . $up_file->getClientOriginalName();
            $up_file->move('files', $name);
            $file = File::create(['file' => $name]);
            $input['file_id'] = $file->id;

        }

        $input['user_id'] = Auth::User()->id;
        Post::create($input);
        return redirect('user/posts');
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
        $post = Post::findOrFail($id);
        $majors = Major::pluck('name','id')->all();
        $types = Type::pluck('name','id')->all();
        return view('user.posts.edit',compact('post','majors','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();
        if ($up_file = $request->file('file_id')) {
            $name = time() . $up_file->getClientOriginalName();
            $up_file->move('files', $name);
            $file = File::create(['file' => $name]);
            $input['file_id'] = $file->id;

        }

        $input['user_id'] = Auth::User()->id;
        $post->update($input);
        return redirect('user/posts/manage');
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

    /**
     * Hide the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hide($id)
    {
        $post = Post::findOrFail($id);
        if (!Auth::user()->isAdmin()) {
            if ($id != Auth::user()->id) {
                return abort(401);
            }
            $post->is_shown = 0;
            $post->save();
            return redirect('user/posts/manage');
        } else {
            $post->is_shown = 0;
            $post->save();
            return redirect('admin/posts');
        }

    }

    public function filter(Request $request)
    {
      $posts = Post::where('is_shown','1')->where('major_id',$request->courses)->where('material_type_id', $request->type)->where('share_or_ask',$request->category)->where('free_or_paid',$request->paid)->where('requestedBy', NULL)->paginate(10);
      $users = User::all();
      $majors = Major::pluck('name','id')->all();
      $types = Type::pluck('name','id')->all();
      if (Auth::user()->isAdmin()) {
          return view('admin.posts.index',compact('posts','users','majors','types'));
      } else {
          return view('user.posts.index',compact('posts','users','majors','types'));
      }
      return abort(404);
    }
    
    public function manage() {
        $posts = Post::where('is_shown','1')->where('user_id' , Auth::User()->id)->paginate(10);
        $types = Type::pluck('name','id')->all();
        return view('user.posts.manage',compact('posts','types'));
    }

    public function askFor($id) {
        $post = Post::findOrFail($id);
        if ($post->is_shown == 0 || $post->requestedBy != NULL) {
            return abort(400);
        }
        $post->requestedBy = Auth::User()->id;
        $post->save();

        event(new NewAskRequest($id, $post->user_id, Auth::User()->id, Auth::User()->name));
        return redirect('user/posts');
    }
}
