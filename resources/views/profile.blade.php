@extends('layouts.app')

@section('content')
<section class="welcome" id="welcome">
      <h1 class="heading">
        <span style="color: #404d68;">Welcome</span>
        <span class="fname">{{Auth::user()->name}}</span>
      </h1>
      <div class="container">
   <div class="card-body">
              <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Exam Name</th>
                      <th>Your Result</th>
                      <th>Date </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Exam Name</th>
                      <th>Your Result</th>
                      <th>Date </th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($result as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->exam->name}}</a></td>
                      <td>{{$value->result}}/7</td>
                      <td>{{$value->created_at}}</td>

                    </tr>
               @endforeach
                  </tbody>
                </table>
                <div style="display: flex; justify-content: center;">
                  {!! $result->links() !!}
                </div>
                
              </div>
              </div>
</div>
     
     
    </section>
@endsection
