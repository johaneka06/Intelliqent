<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicsReq;
use App\Topic;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function index($id)
    {
        $topics = Topic::where('material_id', '=', $id)->get();
        return view('topic-editor', ['topics' => $topics, 'id' => $id]);
    }

    
    public function store($id, TopicsReq $request)
    {
        $request = $request->validated();

        $topic = new Topic;
        $topic->topic_name = $request['name'];
        $topic->material_id = $id;
        $topic->topic_description = $request['desc'];
        $topic->topic_video = $request['video'];
        $topic->save();

        return redirect('/topic/'.$id.'/view');
    }

    public function update(TopicsReq $request, $material_id, $topic_id)
    {
        $request = $request->validated();

        $topic = Topic::join('materials', 'materials.id', '=', 'topics.material_id')
            ->where('topics.id', '=', $topic_id)
            ->where('topics.material_id', '=', $material_id)
            ->first();
        
        $topic->topic_name = $request['name'];
        $topic->topic_description = $request['desc'];
        $topic->topic_video = $request['video'];
        $topic->save();

        return redirect('/course/'.$material_id);
    }

}
