@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Search</strong></h4>
                        </div>

                        <div class="box-body">
                            <form method="get" action="{{route('student.year.class.search')}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <h5>Year</h5>
                                            <div class="controls">
                                                <select name="year_id" required="" class=" form-control"
                                                    aria-invalid="false">
                                                    <option value="" selected="" disables="">Select Year
                                                    </option>
                                                    @foreach($years as $year)
                                                    <option value="{{$year->id}}"
                                                        {{(@$year_id == $year->id)?"selected":""}}>{{$year->name}}
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
                                            <h5>Class</h5>
                                            <div class="controls">
                                                <select name="class_id" required="" class="form-control"
                                                    aria-invalid="false">
                                                    <option value="" selected="" disables="">Select Class
                                                    </option>
                                                    @foreach($classes as $class)
                                                    <option value="{{$class->id}}"
                                                        {{(@$class_id == $class->id)?"selected":""}}>{{$class->name}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4" style="padding-top:25px">
                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search"
                                            value="search">


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Student List</h3>
                            <a href="{{route('student.registration.add')}}" style="float:right"
                                class="btn btn-rounded btn-success mb-5">Add Student </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive table-hover display">
                                



                                <table id="example1" class="table table-bordered table-striped table-hover display">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="5%">S.NO</th>

                                            <th>NAME</th>
                                            <th>ID NO</th>
                                            <th>ROLL</th>
                                            <th>YEAR</th>
                                            <th>CLASS</th>
                                            <th>IMAGE</th>
                                            @if(Auth::user()->role=='Admin')
                                            <th>CODE</th>
                                            @endif

                                            <th width="25%">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key=>$value)
                                        <tr>
                                            <td>{{$key+1}}</td>

                                            <td>{{$value->Data_Student->name}}</td>
                                            <td>{{$value->Data_Student->id_no}}</td>
                                            <td>{{$value->roll}}</td>
                                            <td>{{$value->Year_Student->name}}</td>
                                            <td>{{$value->Class_Student->name}}</td>
                                            <td><img id="showimage"
                                                    src="{{(!empty($value->Data_Student->profile_photo_path))? url('upload/student_images/'.$value->Data_Student->profile_photo_path):url('upload/no_image.jpg')}}"
                                                    style="width:70px;height:70px;border:1px solid #000000"></td>
                                            @if(Auth::user()->role=='Admin')
                                            <td>{{$value->Data_Student->code}}</td>
                                            @endif




                                            <td><a href="{{route('student.registration.edit',$value->assign_student_id)}}"
                                                    class="btn btn-rounded btn-warning mb-5">Edit</a>
                                                <a href="{{route('student.registration.delete',$value->assign_student_id)}}"
                                                    id="delete" class="btn btn-rounded btn-danger mb-5">Delete</a>
                                                <a href="{{route('student.registration.promote',$value->assign_student_id)}}"
                                                    class="btn btn-rounded btn-success mb-5">Promote</a>
                                                <a target='_blank'href="{{route('student.registration.detail',$value->assign_student_id)}}"
                                                    class="btn btn-rounded btn-info mb-5">Details</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.NO</th>

                                            <th>NAME</th>
                                            <th>ID NO</th>
                                            <th>ROLL</th>
                                            <th>YEAR</th>
                                            <th>CLASS</th>
                                            <th>IMAGE</th>
                                            @if(Auth::user()->role=='Admin')
                                            <th>CODE</th>
                                            @endif
                                            <th width="25%">ACTION</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                                
                               
                                

                                



                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>













@endsection