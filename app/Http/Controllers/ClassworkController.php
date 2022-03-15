<?php

namespace App\Http\Controllers;

use App\Models\Classwork;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClassworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classworks = Classwork::all();
        $classworks = $classworks->reverse();

        return view('classwork.index', ['classworks' => $classworks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('classwork.create');
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
        // print("<pre>" . print_r($request->file('attachment')->getClientOriginalName(), true) . "</pre>"); exit();

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
            die($filename);

            if (!in_array($extension, ['txt', 'pdf', 'docx', 'zip'])) {
                $error = "Hệ thống chỉ chấp nhận file đính kèm định dạng txt, pdf, doc, docx, zip.";
            } else if ($size > 50000000) {
                // > 50MB
                $error = "File đính kèm dung lượng quá lớn.";
            } else {
                $attachment_path = $request->file('attachment')->storeAs('public/attachment', $filename);
            }

        } else {
            $attachment_path = '';
        }
        if (isset($attachment_path)) {
            $classwork = new Classwork;
            $classwork->teacher_id = Auth::id();
            $classwork->title = $request->title;
            $classwork->description = $request->description;
            $classwork->attachment_path = $attachment_path;
            $classwork->save();
            return view('classwork.create', ['status' => 'Thêm bài tập thành công!']);
        } else {
            return view('classwork.create', ['status' => $error]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classwork  $classwork
     * @return \Illuminate\Http\Response
     */
    public function show(Classwork $classwork)
    {
        //
        return view('classwork.show', ['classwork' => $classwork]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classwork  $classwork
     * @return \Illuminate\Http\Response
     */
    public function edit(Classwork $classwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classwork  $classwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classwork $classwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classwork  $classwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classwork $classwork)
    {
        //
    }

    public function download(Classwork $classwork)
    {
        // print("<pre>" . print_r($classwork->attachment_path, true) . "</pre>"); exit();
        return Storage::download($classwork->attachment_path);
    }
}
