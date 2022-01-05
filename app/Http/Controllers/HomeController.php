<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $exams =Exam::all();
        return view('home',compact('exams'));
    }
    public function show($id)
    {
        $result =0;
        $exam =Exam::find($id);
        $exam_Q =$exam->questions;
        // return $exam->questions;
        return view('exam_page',compact('exam','exam_Q','result'));
    }
   
    
}
