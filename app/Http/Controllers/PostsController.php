<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //get ruta - jer prihvatamo podatke iz baze
    {
        //vraca sve postove iz baze
        $posts = Post::all();
        // return response()->json($posts);
        return view('blog.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //get ruta - jer zelimo da prikazemo create form view
    {
        $categories = Category::all();
        $users = User::all();
        return view('blog.create', [
            'categories' => $categories,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //post ruta - jer saljemo post zahtev i create u bazu
    {
        $newPost = Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'slug'=>$request->slug,
            'category_id'=>$request->category,
            'user_id'=>$request->user,
        ]);

        return redirect('blog/'. $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postid) //get ruta - jer prihvatamo podatke iz baze
    {
        $post = Post::find($postid);

        return view('blog.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($postid) //get ruta - jer zelimo da prikazemo edit form view
    {
        $post = Post::find($postid);
        $categories = Category::all();
        return view('blog.edit',[
            'post'=> $post,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postid) //put ruta - jer saljemo put zahtev i update u bazu
    {
        $post = Post::find($postid);
        $post->update([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'category_id'=>$request->category
        ]);

        return redirect('blog/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($postid) //delete ruta - jer zelimo da obrisemo iz baze jedan red
    {
        $post = Post::find($postid);
        $post->delete();

        return redirect('blog');
    }
}
