<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams =Exam::all();
        return view('admin.exam.index',compact('exams'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exam.create_exam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= $request->validate([
            'name'=> 'required',
            // 'post_img'=>'mimes:jpeg,png',
            'exam_img'=>'file',
            'description'=>'required'
        ]);
        if (request('exam_img')) {
            $input['exam_img']= request('exam_img')->store('images');
        }
        Exam::create($input);
        session()->flash('Exam_create_massage','Exam was created');
        // return back();
        return redirect()->route('exams.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        // return $exam->questions['question_options'];
        $ex= $exam->questions;
        // return $ex; 
        $exams =Exam::all();
        return view('admin.exam.show_exam_Q',compact('exams','exam','ex'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('admin.exam.edit_exam',compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $exam= Exam::find($id);
        $input= $request->validate([
            'name'=> 'required',
            // 'post_img'=>'mimes:jpeg,png',
            'exam_img'=>'file',
            'description'=>'required'
        ]);
        if (request('exam_img')) {
            $input['exam_img']= request('exam_img')->store('images');
        }else{
            $img= Exam::find($exam);
            $input['exam_img'] = $exam->exam_img;
        }
        // return $input;
        // return Post::find($post);
        // $this->authorize('update',$exam);

        $exam->update($input);
        session()->flash('exam_updated_massage','exam was updated');
        return redirect()->route('exams.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam-> delete();
       Session::flash('massage','Exam was deleted');
        return back();
    }
}
