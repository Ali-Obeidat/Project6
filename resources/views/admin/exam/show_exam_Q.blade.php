<x-admin_master>


    @section('content')
    @if(Session('massage'))
  <div class="alert alert-danger"> 
      {{Session('massage')}}
  </div>
    @elseif (Session('Exam_create_massage'))
    <div class="alert alert-success"> 
      {{Session('Exam_create_massage')}}
  </div>
    @elseif (Session('que_updated_massage'))
    <div class="alert alert-success"> 
      {{Session('que_updated_massage')}}
  </div>
    
  @endif
    <h3 class="title-5 m-b-35">{{$exam->name}}</h3>

    <div class="table-responsive table-responsive-data2 table-bordered ">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>
                        Q_NUM
                    </th>
                    <th>Question</th>
                    <th>Options</th>
                    <th>The correct answer</th>
                    <th>Question Points</th>
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($ex as $value)
                <tr class="tr-shadow">
                    <td>
                        {{$value->question_num}}
                    </td>
                    <td>{{$value->question_content}}</td>
                    <td>
                        <ul>
                            @foreach ($value->question_options as $option)
                            <li>{{$option}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="desc">{{$value->correct_answer}}</td>
                    <td class="desc">{{$value->question_content}} </td>

                    <td>
                        <div class="table-data-feature">

                            <a href="{{route('questions.edit',$value->id)}}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="far fa-edit"></i>
                                </button></a>
                           

                        </div>
                    </td>
                    <td>
                        <form method="post" action="{{route('questions.destroy',$value->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <a href=""><button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button></a>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @endsection
</x-admin_master>