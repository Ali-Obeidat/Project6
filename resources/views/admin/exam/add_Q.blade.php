<x-admin_master>

@section('content')
<div class="page-container">
            <!-- HEADER DESKTOP-->
       
           
            <div class="main-content">
                <div class="section__content section__content--p30">
                <div class="row form-group">
                        <div class="col-lg-2 col-md-3">
                            <label for="selectLg" class=" form-control-label">Exams</label>
                        </div>
                        
                        <div class="col-lg-6 col-md-9">
                            <form action="{{route('questions.store')}}" method="post">
                            <select name="exam_id" id="selectLg" class="form-control-lg form-control">
                                <option value="0"> select The Exam</option>
                                @foreach($exams as $exam)
                                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach     
                            </select>

                                </div>
                                </div>
                                @csrf

                            <div class="col-lg-12">
                                <div class="card c">
                                    <div class="card-header">
                                        <strong>Add </strong>
                                        <small> question</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">question Num</label>
                                            <input type="text" name="question_num" id="company" placeholder="Enter your question " class="form-control">
                                            <small><?php global $error; echo $error; ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">question Points</label>
                                            <input type="text" name="question_point" id="company" placeholder="Enter your question " class="form-control">
                                            <small><?php global $error; echo $error; ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">question</label>
                                            <input type="text" name="question_content" id="company" placeholder="Enter your question " class="form-control">
                                        </div>
                                        <div>
                                        <h3>Options</h3>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Option #1</label>
                                            <input type="text" name="Option#1" id="vat" placeholder="Enter your Option" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Option #2</label>
                                            <input type="text" name="Option#2" id="vat" placeholder="Enter your Option" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Option #3</label>
                                            <input type="text" name="Option#3" id="vat" placeholder="Enter your Option" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Option #4</label>
                                            <input type="text" name="Option#4" id="vat" placeholder="Enter your Option" class="form-control">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">The correct answer</label>
                                            <input type="text" name="correct_answer" id="street" placeholder="Enter The correct answer" class="form-control">
                                        </div>
                                       
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="add" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Add
                                        </button>
                                        <a href="{{route('exams.index')}}"><button type="button"  class="btn btn-danger btn-sm">Close</button></a>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                           

                                    <!-- DATA TABLE -->
                               
                                <!-- END DATA TABLE -->
            </div>
            </div>
            </div>
@endsection
</x-admin_master>