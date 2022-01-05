@extends('layouts.app')

@section('content')
<section class="welcome" id="welcome">
      <h1 class="heading">
        <span style="color: #404d68;">Welcome</span>
        <span class="fname">{{Auth::user()->name}}</span>
      </h1>
      <p class="sub-heading font-weight-bold">
        Choose your quiz to strengthen your knowledge.
        <br />
        <br />
      </p>
      <div class="container">
        <div class="categories-container text-center row">
          @foreach($exams as $exam)
          <div class="box-container col-md-12 col-lg-3 m-3 p-2">
            <div class="box text-center">
              <div class="image m-3">
                <img src="{{$exam->exam_img}}" alt="" />
              </div>
              <h3>{{$exam->name}}</h3>
              <p>
                {{$exam->description}}
                <br />
                <span class="time-text">
                  <br />
                  The test contains {{count($exam->questions) }} questions.
                  <br />
                  <br />
                </span>
              </p>
              <a href="{{route('show_exam',$exam->id)}}" class="category-button start_btn">
                Start Quiz!
              </a>
            </div>
          </div>
          @endforeach
          
          
        </div>
      </div>
    </section>
@endsection
