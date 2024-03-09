<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        // dd($id);
        $userID = Auth::id();
        $user = Auth::user();

        if ($user->hasrole('Admin')){
            $chatID = Chat::where('user_id', $id)->pluck('id')->first();
            // $chatID =2;

        } else {

            $chat = Chat::where([
                ['user_id', '=', $userID],
                ['recipient_id', '=', $id],

            ] )->exists();

            if($chat == false){ // Create chat if chat does not exist

                $chat = Chat::create([
                    'user_id' => $userID,
                    'recipient_id' => $id
                ]);

                $chatID = $chat->id;
            } else {

                $chatID = Chat::where([
                    ['user_id', '=', $userID],
                    ['recipient_id', '=', $id],

                ] )->pluck('id')->first();

            }
        }

        // dd($chatID);
        $recipient = User::find($id);



        $messages = Message::where('chat_id', $chatID)->get();

        foreach($messages as $d){
            $newtime = strtotime($d->created_at);
            $d->time = date('H:i A',$newtime);
        }

        return response()->json([
            'messages' => $messages,
            'recipient' => $recipient,
            'chat_id'=> $chatID
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'chat_id' => $request->chat_id,
        ]);


        return response()->json([
            "success" => "Message Sent!",
            "message" => $message
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
