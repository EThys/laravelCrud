<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index', compact('posts'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'body'=>'required'
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success','Post ajouté avec succéss');
        
    }

    public function storeApi(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'body'=>'required'
        ]);
        $post=Post::create($request->all());
        return response()->json(
            [
                'message'=>"enregistrément reussie",
                'status'=>200,
                
            ]
        );
        
    }

    public function create(){
        return view('posts.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required|max:255',
            'body'=>'required'
        ]);
        $post=Post::find($id);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success','Modification reussie');
    }

    public function edit(string $id){
        $post=Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success','Suppression reussie');
    }
}
