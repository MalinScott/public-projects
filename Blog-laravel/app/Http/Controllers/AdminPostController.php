<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = $this->validatePost();

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/');

    }

    public function edit(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post){
        $attributes =  $this->validatePost($post);
        //if ($attributes['thumbnail'] ?? false) Other option
        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return back()->with('success', 'Update Successful');

    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('success', 'Post Deleted');
    }

    /**
     * @param Post $post
     * @return array
     */
    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        $attributes = request()->validate([
            'title' => 'required|min:2',
            'thumbnail' => $post->exists() ? ['image'] : ['required', 'image'],
            'slug' => ['required', 'min:2', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required|min:3',
            'body' => 'required|min:3',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        return $attributes;
    }

}
