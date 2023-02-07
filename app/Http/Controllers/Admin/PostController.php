<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $active;

    public function __construct()
    {
        $this->middleware('auth');
        $this->active = "posts";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', [
            'posts' => $posts,
            'active' => $this->active,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('admin.posts.create', [
            'topics' => $topics,
            'active' => $this->active,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->topic_id = $request->topic_id;
        $post->description = $request->description;

        $post->image = $this->uploadImage($request->file('image'));

        $post->save();

        return redirect()->route('admin.posts.index')->with('status', $request->name . ' a été enregistrer avec succes !');
    }

    private function uploadImage($requestImage)
    {
        if ($requestImage) {
            $file = $requestImage;
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/posts'), $filename);
            return $filename;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $topics = Topic::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'topics' => $topics,
            'active' => $this->active
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $image = $request->file('image');

        if ($image) {
            try {
                unlink("assets/posts/" . $post->image);
            } catch (\Throwable $th) {
            }
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;

        if ($image) {
            $post->image = $this->uploadImage($request->file('image'));
        }

        $post->update();

        return redirect()->route('admin.posts.index')->with('status', $request->name . ' a été modifier avec success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            unlink("assets/posts/" . $post->image);
        } catch (\Throwable $th) {
        }

        $name = $post->name;

        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', "L'article " . $name . " vient d'être supprimer !");
    }
}
