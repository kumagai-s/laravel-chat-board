<?php

namespace App\Http\Controllers;

use App\Events\MessageReceived;
use App\Models\Comment;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    
    public function index()
    {
        $comments = $this->comment->fetchAll();
        return view('chat.index', [
            'comments' => $comments,
        ]);
    }

    public function register(Request $request)
    {
        $this->comment->register($request);
        $comment = $this->comment->fetchRecentComment();
        broadcast(new MessageReceived($comment))->toOthers();
    }
}
