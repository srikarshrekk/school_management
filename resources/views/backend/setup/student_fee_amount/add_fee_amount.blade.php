@extends('admin.admin_master')
@section('admin')
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
                            <form method="post" action="{{route('student.fee_amount.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="add_item">

                                            <div class="form-group">
                                                <h5>Fee Category <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="student_fee_id" id="student_fee_id" required=""
                                                        class="form-control" aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Fee Category
                                                        </option>
                                                        @foreach($fee_categories as $fee_category)
                                                        <option value="{{$fee_category->id}}">{{$fee_category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5>List of Classes <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="student_class_id[]" required=""
                                                                class="form-control" aria-invalid="false">
                                                                <option value="" selected="" disabled="">Select Class
                                                                </option>
                                                                @foreach($classes as $class)
                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5>Add Amount<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="amount[]" class="form-control"
                                                                required="">
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
                                            <div style="padding-left:1100px" class="text-xs-right">
                                                <button type="submit"  class="btn btn-rounded btn-success mb-5"
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
                <div class="col-md-5">
                    <div class="form-group">
                        <h5>List of Classes <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="student_class_id[]" required="" class="form-control" aria-invalid="false">
                                <option value="" selected="" disabled="">Select Class
                                </option>
                                @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <h5>Add Amount<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="amount[]" class="form-control" required="">
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
    $(document).on("click", ".addeventmore", function(){
        var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest(".add_item").append(whole_extra_item_add);
        counter++;

    });
    $(document).on("click", ".removeeventmore",function(event) {
        $(this).closest("#delete_whole_extra_item_add").remove();
        counter -= 1
    });

});
</script>



@endsection