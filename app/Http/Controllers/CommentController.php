<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function create()
    {
    	$comment = new Comment();
    	$comment->comment=request()->comment;
    	$comment->post_id=request()->post_id;
    	$comment->save();

    	return back();
    }
}
