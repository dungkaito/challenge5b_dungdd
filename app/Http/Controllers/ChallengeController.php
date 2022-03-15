<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('challenge.index', ['challenges' => Challenge::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('challenge.create');

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

        if ($request->hasFile('attachment')) {
            // $attachment_path = $request->file('attachment')->storeAs('public/attachment', );
            // print("<pre>" . print_r($path, true) . "</pre>"); exit();
            $filename = $request->file('attachment')->getClientOriginalName();
            $filename1 = pathinfo($filename, PATHINFO_FILENAME);

            // die($filename);

            // die($destination);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            // die($extension);

            $size = $request->file('attachment')->getSize();
            // var_dump($size);exit();
            $filename = $filename1 . '-' . Str::random(10) . '.' . $extension;
            // die($filename);

            if (!in_array($extension, ['txt'])) {
                $error = "Hệ thống chỉ chấp nhận file đính kèm định dạng txt.";
            } else if ($size > 50000000) {
                // > 50MB
                $error = "File đính kèm dung lượng quá lớn.";
            } else {
                $attachment_path = $request->file('attachment')->storeAs('public/challenge', $filename);
            }

        } else {
            $attachment_path = '';
        }
        if (isset($attachment_path)) {
            $challenge = new Challenge;
            $challenge->teacher_id = Auth::id();
            $challenge->title = $request->title;
            $challenge->hint = $request->hint;
            $challenge->attachment_path = $attachment_path;
            $challenge->save();
            return redirect(route('challenge.create'))
                ->with('status', 'Thêm câu đố thành công!');
        } else {
            return redirect(route('challenge.create'))->with('error', $error);
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        //
        // print("<pre>" . print_r($challenge, true) . "</pre>"); exit();
        return view('challenge.show', ['challenge' => $challenge]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        //
    }

    public function submitChall(Request $request, int $id)
    {
        //
        // print("<pre>" . print_r($id, true) . "</pre>"); exit();
        $userAns = $request->ans;
        $challenge = Challenge::find($id);

        $ans = explode('/', $challenge->attachment_path);
        $ans = explode('.', end($ans));
        $ans = substr($ans[count($ans)-2], 0, -11);

        // print("<pre>" . print_r($ans, true) . "</pre>"); exit();

        if ($ans == $userAns) {
            return '<h2 class="mt-4">Chính xác!!</h2><pre><p style="text-align: center; font-size: 40px">' 
            . Storage::get($challenge->attachment_path). '</p></pre>';
        }
        return '<p style="text-align: center; font-size: 40px">Đáp án không chính xác, hãy xem gợi ý ^^</p>';
    }
}
