@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Promote Student </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post"
                                action="{{route('student.promotion_registration.update',$editData->assign_student_id)}}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value={{$editData->id}}>
                                <div class="row">
                                    <div class="col-12">



                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" required="" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Year
                                                            </option>
                                                            @foreach($years as $year)
                                                            <option value="{{$year->id}}"
                                                                {{($editData->year_id==$year->id)?"selected":""}}>
                                                                {{$year->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id" required="" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Class
                                                            </option>
                                                            @foreach($classes as $class)
                                                            <option value="{{$class->id}}"
                                                                {{($editData->class_id==$class->id)?"selected":""}}>
                                                                {{$class->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>
                                            
                                        </div>
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Shift<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="shift_id" required="" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Shift
                                                            </option>
                                                            @foreach($shifts as $shift)
                                                            <option value="{{$shift->id}}"
                                                                {{($editData->shift_id==$shift->id)?"selected":""}}>
                                                                {{$shift->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Shift<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="shift_id" required="" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Shift
                                                            </option>
                                                            @foreach($shifts as $shift)
                                                            <option value="{{$shift->id}}"
                                                                {{($editData->shift_id==$shift->id)?"selected":""}}>
                                                                {{$shift->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="row" style="padding: left 10px;">
                                            <div class="col-md-4">
                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-success mb-5"
                                                        value="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                        </div>

                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#profile_photo_path').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showimage').attr('src', e.target.result);

        }
        console.log('hi')
        reader.readAsDataURL(e.target.files['0']);
    });
});
</script>

@endsection