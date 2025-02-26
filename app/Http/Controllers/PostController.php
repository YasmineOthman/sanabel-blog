<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\PostPublished;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth')->except(['index', 'show']);
      //  $this->middleware('verified')->only('create');
    }

    public function index()
    {
        $posts = Post::paginate(2);

        return view('post.index', ['posts' => $posts]);
    }

    public function create ()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function show ($id) {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post]);
    }

    public function store (Request $request) {
        $request->validate([
            'title'                     => 'required|min:4|max:255',
            'content'                   => 'required|min:4',
            'category_id'               => 'required|numeric|exists:categories,id',
            'tags'                      => 'array',
            'featured_image_url'        => 'required_without:featured_image_upload|url|nullable',
            'featured_image_upload'     => 'required_without:featured_image_url|file|image',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        if ($request->has('featured_image_upload')) {
            $image = $request->featured_image_upload;
            $path = $image->store('post-images', 'public');
            $post->featured_image = $path;
        } else {
            $post->featured_image = $request->featured_image_url;
        }
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        // $post = Post::create($request->all());
        Notification::send(User::all() , new PostPublished($post));
        return redirect()->route('posts.show', $post);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $post = Post::findOrFail($id);

        return view('post.edit', ['post' => $post] ,  ['categories' => $categories, 'tags' => $tags]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title'             => 'required|min:4|max:255',
            'content'           => 'required|min:4',
            'category_id'       => 'required|numeric|exists:categories,id',
            'tags'              => 'array',
             'featured_image_url'   => 'required_without:featured_image_upload|url|nullable',
            'featured_image_upload'  => 'required_without:featured_image_url|file|image',
        ]);

        // TODO: Handel file upload here

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
       
        if ($request->has('featured_image_upload')) {
            $image = $request->featured_image_upload;
            $path = $image->store('post-images', 'public');
            $post->featured_image = $path;
        } else {
            $post->featured_image = $request->featured_image_url;
        }

        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);

       // Notification::send(User::all() , new PostPublished($post));

        return redirect("/posts/{$post->id}");
    }
    public function POSTS_UNDER_CATEGORY(Category $category)
    {
       // return $category;
       $posts = $category->posts;
       $posts = $category->posts()->paginate(2);
       $title=$category->name;
       return view('post.index',compact('posts','title'));
      

    }
    public function destory($id)
    {
        # code...
    }
}
