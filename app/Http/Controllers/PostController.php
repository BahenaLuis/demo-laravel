<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tag;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getIndex() {                          
        $posts = Post::orderBy('created_at', 'asc')->paginate(2);
        return view('blog.index', ['posts' => $posts]);
    }

    public function getPost($id) {
        //$post = Post::find($id)->with('likes');
        $post = Post::where('id', $id)->with('likes')->first();
        return view('blog.post', ['post' => $post]);
    }

    public function getAbout() {        
        return view('other.about');
    }

    public function getAdminIndex() {
        //$posts = Post::all();
        $posts = Post::orderBy('title', 'asc')->get();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getAdminCreate() {
        $tags = Tag::all();
        return view('admin.create', ['tags' => $tags]);
    }

    public function getAdminEdit($id) {
        $post = Post::find($id);
        $tags = Tag::all();
        return view('admin.edit', ['post' => $post, 'postId' => $id, 'tags' => $tags]);        
    }

    public function getAdminRemove($id) {
        //$post = Post::where('id', '=', $id);   
        $post = Post::find($id);   
        $post->likes()->delete();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.index')->with('info', 'Post deleted!');        
    }

    public function addPost(Request $request) {
        
        $this->validate($request,[
            'title' => 'required|min:5',
            'content' => 'required|min:8'
        ]);

        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]); 
        $post->save();
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()
        ->route('admin.index')
        ->with('info', 'Post created, new title: ' . $request->input('title'));
    }

    public function editPost(Request $request) {

        $this->validate($request,[
            'title' => 'required|min:5',
            'content' => 'required|min:8'
        ]);

        //$post = Post::where('id', '=', $request->input('id'));
        //$post->update(['title' => $request->input('title'), 'content' => $request->input('content')]);
        
        //$post->tags()->detach();
        //$post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
        //$post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));

        $post = Post::find($request->input('id'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        $post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()
        ->route('admin.index')
        ->with('info', 'Post edited, new title: ' . $request->input('title'));
    }    

    public function addLikePost($id) {
        $post = Post::find($id);
        $like = new Like(); 
        $post->likes()->save($like);
        return redirect()->back();
    }
}
