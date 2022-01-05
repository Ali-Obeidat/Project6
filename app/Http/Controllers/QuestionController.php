<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.exam.show_exam_Q');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams= Exam::all();
        return view('admin.exam.add_Q',compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $input= $request->validate([
            'exam_id'=> 'required',
            // 'post_img'=>'mimes:jpeg,png',
            'question_num'=>'numeric',
            'question_content'=>'required',
            'correct_answer'=>'required',
            'question_point'=>'numeric'
        ]);
        $array= [$request['Option#1'],$request['Option#2'],$request['Option#3'],$request['Option#4']];
        $options = implode(",",$array);
        $input['question_options']= $options;

        // return $input;
       Question:: create($input);
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $exam = Exam::where('id',$question->exam_id )->first();
        // return $question->question_options[0];
        $exams =Exam::all();
        return view('admin.exam.edit_question',compact('question','exams','exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $question = Question::find($id);
        $input= $request->validate([
            'exam_id'=> 'required',
            // 'post_img'=>'mimes:jpeg,png',
            'question_num'=>'numeric',
            'question_content'=>'required',
            'correct_answer'=>'required',
            'question_point'=>'numeric'
        ]);
        $array= [$request['Option#1'],$request['Option#2'],$request['Option#3'],$request['Option#4']];
        $options = implode(",",$array);
        $input['question_options']= $options;

        // return $input;
        $question->update($input);
        $exam=Exam::find ($request['exam_id']);
        $ex= $exam->questions;
        // return $exam; 
        $exams =Exam::all();
        session()->flash('que_updated_massage','Question was updated');

        return view('admin.exam.show_exam_Q',compact('exams','exam','ex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question-> delete();
        Session::flash('massage','question was deleted');
        return back();
    }
}
