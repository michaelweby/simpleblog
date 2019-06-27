<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(25);
        return view('dashboard.posts.index',['title'=>'All Posts','action'=>true,'posts'=>$posts,'route'=>'posts']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $authors = User::all();
        return view('dashboard.posts.create',['title'=>'Add Post','action'=>false,'categories'=>$categories,'authors'=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:191',
            'category' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);
        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'author_id' => $request->author,
            'description' => $request->description,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $authors = User::all();
        return view('dashboard.posts.edit',['title'=>'Add Post','action'=>false,'categories'=>$categories,'authors'=>$authors,'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $valid = $request->validate([
            'title' => 'required|max:191',
            'category' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);
        $post->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'author_id' => $request->author,
            'description' => $request->description,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function userShow(Post $id){
        $post = $id;
        return view('user.post',compact('post'));
    }
}
