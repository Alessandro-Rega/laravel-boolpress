<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentMail;

class CommentController extends Controller
{
    public function store(Request $request){
        
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'nullable|string|max:50',
            'comment' => 'required|string',
            'post_id' => 'exists:posts,id'
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ], 400);
        }

        $newComment = new Comment();
        if(!empty($data['name']))$newComment->name = $data['name'];
        $newComment->comment = $data['comment'];
        $newComment->post_id = $data['post_id'];
        $newComment->save();

        Mail::to('account@mail.it')->send(new CommentMail());
        return response()->json([
            "success" => true
        ]);
    }
}
