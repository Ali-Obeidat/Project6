<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use Doctrine\Inflector\Rules\Ruleset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $result= Result::where('user_id',Auth::user()->id)->paginate(5);
        // return $result[0]->exam;
        return view('profile',compact('result'));
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
        // return $request;
        $exam =Exam::find ($request['exam_id']);
        // return count($exam->questions);
        $result =0;
            for ($i=0; $i <= count($exam->questions); $i++) { 
             $result+=  $request['Q'.$i] ;
            }
        // return $result;
        $user_result = new Result();
        $user_result->user_id = auth()->user()->id;
        $user_result->exam_id = $request['exam_id'];
        $user_result->result = $result;
        $user_result->save();
        session()->flash('your_result_massage','your result is '.$result.' from ' .count($exam->questions));
        $exam_Q =$exam->questions;
        // return $exam_Q;
        return view('exam_page',compact('exam','exam_Q','result'));
        // return redirect()->route('show_exam',$request['exam_id'])->with(['result',$result]);
        // return $user_result->user_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
