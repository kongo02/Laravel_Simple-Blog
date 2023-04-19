<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function update(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        $formFields = $request->validate([
            'title' =>'required',
            'body' => 'required'
        ]);
        $formFields['title'] = strip_tags($formFields['title']);
        $formFields['body'] = strip_tags($formFields['body']);

        $post->update($formFields);
        return redirect('/');

    }
    //
    public function editPost(Post $post){

        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        return view('edit-post',['post' => $post]);
    }

    public function createPost(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        // Strip the content before storing
        $formFields['title'] = strip_tags($formFields['title']);
        $formFields['body'] = strip_tags($formFields['body']);
        $formFields['user_id'] = auth()->id();
        Post::create($formFields);
        return redirect('/');


    }
    public function delete(Post $post) {
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }
    }
}
