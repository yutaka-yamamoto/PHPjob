<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Post;

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $posts = Post::latest()->get();

        return view('timeline', [
            'posts' => $posts,
        ]);
    }

    public function postPost(Request $request)
    {
        $request->validate([
            'body' => 'required|max:255',
        ]);

        Post::create([
            'user_id' => Auth::user()->id,
            'name'    => Auth::user()->name,
            'body'   => $request->body,
        ]);

        return back();    
    }
    public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $post = Post::find($request->user_id);
      // 削除する
      $post->delete();
      return redirect('timeline');
  } 
    
}
