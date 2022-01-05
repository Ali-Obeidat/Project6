<x-admin_master>
@section('content')
<div class="container">
  <h2>Edit Exam</h2>
  <form action="{{route('exams.update',$exam->id)}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter The title" value="{{$exam->name}}" name="name">
    </div>
    <div class="form-group">
      <label for="pwd">Exam Image:</label>
      <div style="margin-bottom: 10px;">
          <img width="300" src="{{$exam->exam_img}}" alt="">
      </div>
      <input type="file" class="form-control-file" id="pwd" placeholder="Enter password" name="exam_img">
    </div>
    <div class="form-group">
      <label for="Content">Description:</label>
      <textarea type="text" class="form-control" id="Content" placeholder="Enter The Content" name="description">{{$exam->description}}</textarea>
    </div>
    @csrf
        @method('PUT')      
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    <a href="{{route('exams.index')}}"><input type="button" value="Close" class="btn btn-danger"></a>
        
  </form>
</div>

@endsection


</x-admin_master>