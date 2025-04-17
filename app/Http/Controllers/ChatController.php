<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::with('lastMessage')
            ->orderByDesc(Message::select('created_at')->whereColumn('messages.id', 'chats.last_message_id')->limit(1))
            ->paginate(20);

        return response()->json(
            $chats->through(function ($chat) {
                return [
                    'id' => $chat->id,
                    'last_message' => Str::limit($chat->lastMessage->text ?? '', 100),
                    'last_message_time' => $chat->lastMessage->created_at ?? null,
                ];
            }),
        );
    }
}
