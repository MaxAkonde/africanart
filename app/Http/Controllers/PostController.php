<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('topics')
            ->select(["topics.name", "topics.slug", DB::raw("COUNT(posts.topic_id) as post_count")])
            ->join('posts', 'posts.topic_id', '=', 'topics.id')
            ->groupBy('topics.name')
            ->groupBy('topics.slug')
            ->get();
        //dd($categories);
        $posts = Post::latest()->paginate(10);
        return view('pages.post.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = DB::table('topics')
            ->select(["topics.name", "topics.slug", DB::raw("COUNT(posts.topic_id) as post_count")])
            ->join('posts', 'posts.topic_id', '=', 'topics.id')
            ->groupBy('topics.name')
            ->groupBy('topics.slug')
            ->get();

        return view('pages.post.show', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }
}
