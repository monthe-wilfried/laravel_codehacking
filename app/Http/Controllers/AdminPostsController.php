<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(PostsRequest $request)
    {
        //
        $input = $request->except('category_id');

        $user = Auth::user();

        if ($file = $request->file('path')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        $post = $user->posts()->create($input);

        $category_id = $request->category_id;

        $post->categories()->sync($category_id);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');


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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->except('category_id');

        if ($file = $request->file('path')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        $post = Post::findOrFail($id);

        $category_id = $request->category_id;

        $post->categories()->sync($category_id);

        return redirect()->route('posts.index')->with('info', 'Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

//        unlink(public_path().$post->photo->file);

        $post->delete();

        return redirect()->route('posts.index')
            ->with('warning', 'Post delete successfully');


    }

    public function post($id)
    {

        $post = Post::findOrFail($id);
        $comments = $post->comments()->where('is_active', 1)->get();
        $categories = Category::all();

        return view('post', compact('post', 'categories', 'comments'));

    }

}
