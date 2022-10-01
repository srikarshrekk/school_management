@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Designations</h3>
                            <a href="{{route('student.designation.add')}}" style="float:right"
                                class="btn btn-rounded btn-success mb-5">Add Designation</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive table-hover display">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="5%">S.NO</th>
                                            
                                            <th>Designation</th>
                                            
                                            <th width="20%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key=>$designation)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            
                                            <td>{{$designation->name}}</td>
                                            
                                            <td><a href="{{route('student.designation.edit',$designation->id)}}" class="btn btn-rounded btn-warning mb-5 ">Edit</a>
                                                <a href="{{route('student.designation.delete',$designation->id)}}" id="delete" class="btn btn-rounded btn-danger mb-5">Delete</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.NO</th>
                                            
                                            <th>Designation</th>
                                            
                                            <th>Action</th>

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