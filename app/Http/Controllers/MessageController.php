<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Message;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all message of auth user in messages table
        // $messages = DB::table('messages')
        //             ->where('sender_id', Auth::id())
        //             ->orWhere('receiver_id', Auth::id())
        //             ->get();
        $messages = Message::select("*")
                            ->where('sender_id', Auth::id())
                            ->orWhere('receiver_id', Auth::id())
                            ->get();
        
        $messages = $messages->reverse();
        // print("<pre>" . print_r($messages, true) . "</pre>"); exit();

        // get all user who message with auth user
        $users = [];
        foreach ($messages as $m) {
            if ($m->sender_id == Auth::id()) {
                $u = User::find($m->receiver_id);
                // print("<pre>" . var_dump($u) . "</pre>"); exit();
                if (!$this->existsInArray($u, $users)) {
                    array_push($users, $u);
                    // print($u->name.'\n');
                }
            }
            else {
                $u = User::find($m->sender_id);
                // print("<pre>" . var_dump($u) . "</pre>"); exit();
                if (!$this->existsInArray($u, $users)) {
                    array_push($users, $u);
                    // print($u->name.'\n');
                }
            }
        }
        // print("<pre>" . print_r($users, true) . "</pre>"); exit();

        return view('message.index', ['users' => $users, 
                                      'messages' => $messages]);
    }

    function existsInArray($entry, $array) {
        foreach ($array as $compare)
            if ($compare->id == $entry->id)
                return true;
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // print("<pre>" . print_r($request->all(), true) . "</pre>"); exit();
        $message = new Message;
        $message->sender_id = $request->sender_id;
        $message->receiver_id = $request->receiver_id;
        $message->content = $request->content;
        $message->save();
        return redirect()->route('message.index');

    }

    /**
     * Handle ajax request.
     * Get all messages between $user_id and auth user.
     * 
     * @param  int  $user_id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getMessages(int $user_id)
    {
        // print("<pre>" . print_r(Auth::id(), true) . "</pre>"); exit();
        // get all message of auth user in messages table
        // $messages = DB::table('messages')
        //             ->where('sender_id', Auth::id())
        //             ->orWhere('receiver_id', Auth::id())
        //             ->get();
        $messages = Message::select("*")
                            ->where('sender_id', Auth::id())
                            ->orWhere('receiver_id', Auth::id())
                            ->get();

        // $messages = $messages->reverse();

        //
        // print("<pre>" . print_r($messages, true) . "</pre>"); exit();

        foreach ($messages as $key => $m) {
            if ($m->sender_id != $user_id && $m->receiver_id != $user_id) {
                unset($messages[$key]);
            }
        }
        // print("<pre>" . print_r($messages, true) . "</pre>"); exit();

        return view('message.show', ['messages' => $messages]);
    }

    /**
     * Handle ajax request.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
        // return 1;
        
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
        // return 1;
        // print("<pre>" . print_r($message, true) . "</pre>"); exit();
        return view('message.edit', ['message' => $message]);

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
        // print("<pre>" . print_r($request->all(), true) . "</pre>"); exit();
        $message->content = $request->content;
        $message->save();
        return redirect(route('message.edit', ['message' => $message]))->with('status', 'Sửa tin nhắn thành công!');

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
        $message->delete();
        return back();
    }
}
