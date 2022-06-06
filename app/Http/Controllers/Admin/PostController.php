<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', ['categories'=> $categories], ['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|min:5|max:100',
            'category_id' =>'required',
            'tags'=>'exists:tags,id'
        ], [
            'title.required' => 'Ttitolo deve essere valorizzato',
            'title.max' => 'Hai superato i :attribute caratteri',
            'content.min' => 'Minimo 5 caratteri'
        ]);
        $postData = $request->all();

        $newPost = new Post();

        $newPost->fill($postData);

        $newPost->slug = Post::convertToSlug($newPost->title);

        $newPost->save();
        // ADD TAGS
        $newPost->tags()->sync($postData['tags']);

        $newPost->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        if (!$id) {
        abort(404);
        }

        // $category = Category::find($post->category_id);

        return view('admin.posts.show', compact('post')); //
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
        $post= Post::find($id);
        if (!$id) {
        abort(404);
        }

        $categories = Category::all();
        return view('admin.posts.edit', compact('post'), ['categories'=> $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:250',
            'content' => 'required',
            'category_id' =>'required',
            'tags'=>'exists:tags,id'
        ]);
        $post = Post::find($id);
        $postData = $request->all();

        $post->fill($postData);
        $post->slug = Post::convertToSlug($post->title);

        $post->update();
        return redirect()->route('admin.posts.index',);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts= Post::find($id);
        $posts->delete();
        return redirect()->route('admin.posts.index');
    }
}
