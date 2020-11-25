<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ForumRequest;
use App\Reply;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class ForumController extends Controller
{
    public function index()
    {
        $threads = Thread::all();
        $categories = Category::all();

        return view('forum', ['threads' => $threads, 'categories' => $categories]);
    }


    public function create($id)
    {
        $threads = Thread::where('category_id', '=', $id)->get();
        $categories = Category::all();

        return view('forum', ['threads' => $threads, 'categories' => $categories]);
    }

    public function store(ForumRequest $request)
    {
        $request = $request->validated();
        $id = Uuid::uuid4();

        $thread = new Thread;
        $thread->id = $id;
        $thread->user_id = Auth::user()->id;
        $thread->category_id = $request['category'];
        $thread->thread_name = $request['title'];
        $thread->thread_question = $request['question'];
        $thread->save();
        
        return redirect('/forum');
    }

    public function show($id)
    {
        $thread = Thread::where('id', '=', $id)->first();
        $replies = Reply::where('thread_id', '=', $id)->get();

        return view('forum-reply', ['thread' => $thread, 'replies' => $replies]);
    }

    public function reply(Request $request, $id)
    {
        $request = $request->validate([
            'question' => 'required'
        ]);
        $current_id = Uuid::uuid4();

        $reply = new Reply;
        $reply->id = $current_id;
        $reply->user_id = Auth::user()->id;
        $reply->thread_id = $id;
        $reply->reply = $request['question'];
        $reply->save();

        return redirect('/forum/thread/'.$id);
    }

    public function search(Request $request)
    {
        if($request->search == null) return redirect('/forum');

        $threads = Thread::where('thread_name', 'like', "%".$request->search."%")->get();
        $categories = Category::all();

        return view('forum', ['threads' => $threads, 'categories' => $categories]);

    }
}
