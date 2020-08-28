<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    //@var App\Post;
    private $post;
    
    public function __construct(Post $post) {
        $this->post = $post;
    }
    public function index(Request $request) {
        $posts = Post::paginate(15);
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post) {
        
        //$post = Post::findOrFail($id);
        
        return view('posts.edit')->with('post', $post);
        
    }
    public function create(Request $erequest) {
        //$data = $this->post->find(1);
       // dd($data->title);
        return view('posts.create');
    }
    public function update($id,Request $request) {
        $data = $request->all();
        $post = Post::findOrFail($id);
        if($post->update($data))
        {
           
            return redirect('admin/posts');
        }
        else
        {
         return back()->withInput();   
        }
        dd($post->update($data));
        //$data = $this->post->find(1);
       // dd($data->title);
    }
    
    public function destroy($id) {
        $post = Post::findOrFail($id);
        dd($post->delete()); 
    }
    
    public function store(Request $request) {
             $newPost = $request->all();
        try{
            $newPost['is_active'] = true;
            $user = User::find(1);
            $user->posts()->create($newPost);
            flash('Postagem inserida com sucesso!')->success();
            return redirect()->route('posts.index');
             
        } catch (Exception $ex) {
                  $message = 'Erro ao inserir postagem.';
            
            if(env('APP_DEBUG')){
                $message = $ex->getMessage();
                
            }
            flash($message)->warning();
            return redirect()->back();
        }
        return back()->withInput();
    }
}
