<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $posts = Post::latest('id')
            ->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDACIONES
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'required|exists:categories,id',
        ]);
        $post = Post::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Correcto',
            'text' => 'El post se ha creado correctamente',
        ]);

        return redirect()->route('admin.posts.edit',$post);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();


        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {


        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'excerpt' => $request->published ? 'required ': 'nullable',
            'body' => $request->published ? 'required ': 'nullable',
            'published' => 'required|boolean',
            'tags' => 'nullable|array',
        ]);

        $tags = [];

        foreach($request->tags ?? [] as $name) {
            $tag = Tag::firstOrCreate([
                'name' => $name,
            ]);
            $tags[] = $tag->id;
        }



        $post->tags()->sync($tags);


        $post->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Correcto',
            'text' => 'El post se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.posts.edit',$post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Correcto',
            'text' => 'El post se ha eliminado correctamente.',
        ]);
        return redirect()->route('admin.posts.index');
    }
}
