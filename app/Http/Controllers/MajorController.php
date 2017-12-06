<?php

namespace App\Http\Controllers;

use App\Http\Requests\MajorRequest;
use App\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::all();
        return view('admin.posts.major.index',compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.major.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MajorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MajorRequest $request)
    {
        $input = $request->all();
        $input['name'] = $request->major_name;
        Major::create($input);
        return redirect('/admin/majors');
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
        $major = Major::findOrFail($id);
        return view('admin.posts.major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MajorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MajorRequest $request, $id)
    {
        $major = Major::findOrFail($id);
        $major->update($request->all());
        return redirect('/admin/majors');
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
