<x-admin_master>

@section('content')
<div class="container" >
  <h2>Create Exam</h2>
  <form action="{{route('exams.store')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter The title" name="name">
    </div>
    <div class="form-group">
      <label for="pwd">exam Image:</label>
      <input type="file" class="form-control-file" id="pwd" placeholder="Enter password" name="exam_img">
    </div>
    <div class="form-group">
      <label for="Content">Description:</label>
      <textarea type="text" class="form-control" id="Content" placeholder="Enter The Content" name="description"></textarea>
    </div>
    @csrf
   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
</x-admin_master>