<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','view']);
    }

    public function index(){
    	$data=Post:: orderBy('id','desc')->paginate(5);
    	return view('posts.index',['posts'=>$data]);

    }

    public function add(){
        $categories= Category::all();

    	return  view('posts.add',[
            'categories'=> $categories
            ]);
    }

    public function create(){

    	$validator=validator(request()->all(),[
    			"title"=>"required",
    			"body"=>"required",
    			"category_id"=>"required"
    		]);

    	if($validator-> fails()){
    		return back()->withErrors($validator);
    	}

    	$post=new Post();
    	$post->title=request()->title; //$_POST['title']
    	$post->body=request()->body;
    	$post->category_id=request()->category_id;
    	$post->save();
    	return redirect('/posts');
    }

    public function view($id){
    	$post= Post::find($id);

        return view('posts.view',[
                'post'=>$post
            ]);
    }

    public function delete($id){
        $post = Post::find($id);

        $post -> delete();

        return redirect('/posts')->with('danger','Delete Successful');
    }

    public function edit($id){
        $post = Post::find($id);
        $categories= Category::all();

        return view('posts.edit',[
                'post'=> $post,
                'categories'=>$categories
            ]);
    }

    public function update($id){
        $post=Post:: find($id);
        $post->title=request()->title; //$_POST['title']
        $post->body=request()->body;
        $post->category_id=request()->category_id;
        $post->save();

        return redirect("/posts/view/$id");
    }
}
