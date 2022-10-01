@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Student </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('student.registration.update',$editData->assign_student_id)}}"  enctype="multipart/form-data">
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
                                                    <h5>Student Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" value="{{$editData->Data_Student->name}}" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Fathers Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="f_name" value="{{$editData->Data_Student->f_name}}" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Mothers Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="m_name" value="{{$editData->Data_Student->m_name}}" class="form-control"
                                                            required="">
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
                                                    <h5>Mobile No<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" value="{{$editData->Data_Student->mobile}}" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" value="{{$editData->Data_Student->address}}" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" required="" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Gender
                                                            </option>
                                                            <option value="Male" {{($editData->Data_Student->gender=='Male')?"selected":""}}>Male
                                                            </option>
                                                            <option value="Female" {{($editData->Data_Student->gender=='Female')?"selected":""}}>Female
                                                            </option>
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
                                                    <h5>Religion <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="religion"  value="{{$editData->Data_Student->religion}}" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="dob"  value="{{$editData->Data_Student->dob}}" class="form-control" required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <h5>Discount <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount"  value="{{$editData->Discount_Student->discount}}" class="form-control"
                                                            required="">
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
                                                    <h5>Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" required="" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Year
                                                            </option>
                                                            @foreach($years as $year)
                                                            <option value="{{$year->id}}" {{($editData->year_id==$year->id)?"selected":""}}>{{$year->name}}
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
                                                            <option value="" selected="" disabled="">Select Year
                                                            </option>
                                                            @foreach($classes as $class)
                                                            <option value="{{$class->id}}"  {{($editData->class_id==$class->id)?"selected":""}}>{{$class->name}}
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
                                                    <h5>Group <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="group_id" required="" class="form-control"
                                                            aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Group
                                                            </option>
                                                            @foreach($groups as $group)
                                                            <option value="{{$group->id}}"  {{($editData->group_id==$group->id)?"selected":""}}>{{$group->name}}
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
                                                            <option value="" selected="" disabled="">Select Year
                                                            </option>
                                                            @foreach($shifts as $shift)
                                                            <option value="{{$shift->id}}"  {{($editData->shift_id==$shift->id)?"selected":""}}>{{$shift->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Profile Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path"
                                                            id="profile_photo_path" class="form-control">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Selected Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <img id="showimage"
                                                            src="{{(!empty($editData->Data_Student->profile_photo_path))? url('upload/user_images/'.$editData->Data_Student->profile_photo_path):url('upload/no_image.jpg')}}"
                                                            style="width:80px;height:80px;border:1px solid #000000">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row" style="padding: left 10px;">
                                            <div class="col-md-4" >
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