<x-admin_master>
@section('content')

  <h2>All Exams</h2>
  @if(Session('massage'))
  <div class="alert alert-danger"> 
      {{Session('massage')}}
  </div>
    @elseif (Session('Exam_create_massage'))
    <div class="alert alert-success"> 
      {{Session('Exam_create_massage')}}
  </div>
    @elseif (Session('exam_updated_massage'))
    <div class="alert alert-success"> 
      {{Session('exam_updated_massage')}}
  </div>
    
  @endif
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Exams Tables </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Exam Name</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Created At</th>
                      <th>Delete </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Exam Name</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Created At</th>
                      <th>Delete </th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($exams as $exam)
                    <tr>
                      <td>{{$exam->id}}</td>
                      <td><a style="cursor: pointer;" href="{{route('exams.edit',$exam->id)}}">{{$exam->name}}</a></td>
                      <td><img width="100" src="{{$exam->exam_img}}" alt=""> </td>
                      <td>{{$exam->description}}</td>
                      <td>{{$exam->created_at}}</td>
                      <td>
                        <form method="get" action="{{route('exams.show',$exam->id)}}" enctype="multipart/form-data">
                          <input class="btn btn-primary" type="submit" name="submit" value="Show">
                        </form>
   
                         </td>
                      <td>
                         
                      <form method="post" action="{{route('exams.destroy',$exam->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input class="btn btn-danger" type="submit" name="submit" value="DELETE">
                     </form>
                    
                      </td>
                     
                    </tr>
               @endforeach
                  </tbody>
                </table>
                
            </div>
        </div>
    </div>
   
                            
@endsection

@section('script')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

@endsection

</x-admin_master>