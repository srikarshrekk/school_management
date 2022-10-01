@extends('admin.admin_master')
@section('admin')

dd($data)

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Fee Amount </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('student.subject_assign.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="add_item">

                                            <div class="form-group">
                                                <h5>Class <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="student_class_id" id="student_class_id" required=""
                                                        class="form-control" aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Class
                                                        </option>
                                                        @foreach($classes as $class)
                                                        <option value="{{$class->id}}">{{$class->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>List of Subjects <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subject_types_id[]" required=""
                                                                class="form-control" aria-invalid="false">
                                                                <option value="" selected="" disabled="">Select Subject
                                                                </option>
                                                                @foreach($subjectTypes as $subjectType)
                                                                <option value="{{$subjectType->id}}">
                                                                    {{$subjectType->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Add Full Marks<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="full_mark[]" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Add Pass Marks<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="pass_mark[]" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Add Subjective Marks<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="subjective_mark[]"
                                                                class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div style="padding-top:25px" class="form-group">
                                                        <span class="btn btn-success addeventmore">
                                                            <i class="fa fa-plus-circle"></i>

                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div style="padding-left:900px" class="text-xs-right">
                                                <button type="submit" class="btn btn-rounded btn-success mb-5"
                                                    value="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>

<div style="visibility:hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>List of subjects <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subject_types_id[]" required="" class="form-control" aria-invalid="false">
                                <option value="" selected="" disabled="">Select Subject
                                </option>
                                @foreach($subjectTypes as $subjectType)
                                <option value="{{$subjectType->id}}">{{$subjectType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Add Full Marks<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="full_mark[]" class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Add Pass Marks<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="pass_mark[]" class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Add Subjective Marks<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="subjective_mark[]" class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div style="padding-top:25px" class="form-group">
                        <span class="btn btn-success addeventmore">
                            <i class="fa fa-plus-circle"></i>

                        </span>
                        <span class="btn btn-danger removeeventmore">
                            <i class="fa fa-minus-circle"></i>

                        </span>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    var counter = 0;
    $(document).on("click", ".addeventmore", function() {
        var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest(".add_item").append(whole_extra_item_add);
        counter++;

    });
    $(document).on("click", ".removeeventmore", function(event) {
        $(this).closest("#delete_whole_extra_item_add").remove();
        counter -= 1
    });

});
</script>



@endsection