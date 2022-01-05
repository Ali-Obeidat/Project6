@extends('layouts.app')

@section('content')

<section class="welcome" id="welcome">
    <h1 class="heading">
        <span style="color: #404d68;">{{$exam->name}} </span>
        <span class="fname">Exam</span>
    </h1>
    <div class="container col-lg-6">
        @if($result != 0)
    @if($result >4)
    @if (Session('your_result_massage'))
    <div class="alert alert-success"> 
      {{Session('your_result_massage')}}
  </div>
  @endif
  @else
  <div class="alert alert-danger"> 
      {{Session('your_result_massage')}}
  </div>
  @endif
  @endif

     <form action="{{route('results.store')}}" method="post" enctype="multipart/form-data">
     <input type="hidden" name="exam_id" value="{{$exam->id}}">

         @foreach($exam_Q as $value)
        <div class="row form-group" style="margin-top: 30px;">
            <!-- <div class="col col-md-3">
                <h1 class=" form-control-label">Radios</h1>
            </div> -->
            <div class="col col-md-9">
            <h2 class=" form-control-label"><span style="color: #404d68;">{{$value->question_num}}-</span>{{$value->question_content}}</h2>

                <div class="form-">
                    @foreach($value->question_options as $option)
                    <fieldset>
                    <div class="radio">
                        <label for="radio1" class="form-check-label ">
                            <input type="radio" id="radio1" name="Q{{$value->question_num}}" value="@if($option == $value->correct_answer)1 @else 0 @endif" class="form-check-input"> {{$option}}
                        </label>
                    </div>
</fieldset>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        @csrf

        <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary">Finish</button>
    </form>
</div>
    

</section>
@endsection