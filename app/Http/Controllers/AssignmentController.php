<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Classwork;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $checkSubmited = Assignment::where([
                                    ['classwork_id', $request->classwork_id],
                                    ['student_id', Auth::id()]
        ]);
        // print("<pre>" . var_dump($checkSubmited->count()) . "</pre>"); exit();
        if ($checkSubmited->count() > 0) {
            return redirect(route('classwork.show', ['classwork' => Classwork::find($request->classwork_id)]))
                            ->with('error', "Chỉ được nộp bài 1 lần, bạn đã nộp bài trước đó!");
        }


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

            if (!in_array($extension, ['txt', 'pdf', 'docx', 'zip'])) {
                $error = "Hệ thống chỉ chấp nhận file đính kèm định dạng txt, pdf, doc, docx, zip.";
            } else if ($size > 50000000) {
                // > 50MB
                $error = "File đính kèm dung lượng quá lớn.";
            } else {
                $attachment_path = $request->file('attachment')->storeAs('public/assignment', $filename);
            }

        } else {
            $attachment_path = '';
        }
        if (isset($attachment_path)) {
            $assignment = new Assignment;
            $assignment->student_id = Auth::id();
            $assignment->student_name = Auth::user()->name;
            $assignment->classwork_id = $request->classwork_id;
            $assignment->description = $request->description;
            $assignment->attachment_path = $attachment_path;
            $assignment->save();
            return redirect(route('classwork.show', ['classwork' => Classwork::find($request->classwork_id)]))
                            ->with('status', 'Thêm bài tập thành công!');
        } else {
            return redirect(route('classwork.show', ['classwork' => Classwork::find($request->classwork_id)]))
                            ->with('error', $error);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
        // print("<pre>" . print_r($assignment, true) . "</pre>"); exit();
        return view('assignment.show', ['assignment' => $assignment]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }

    public function download(Assignment $assignment)
    {
        // print("<pre>" . print_r($classwork->attachment_path, true) . "</pre>"); exit();
        return Storage::download($assignment->attachment_path);
    }
}
