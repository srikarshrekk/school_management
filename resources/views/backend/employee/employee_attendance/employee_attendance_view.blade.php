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
                            <h3 class="box-title">Add Attendance </h3>
                            <a href="{{ route('employee.leave.add') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5"> Add  Attendance</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Name</th>
                                            <th>ID No </th>
                                            
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $value )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{ $value->employee_id }}</td>
                                            <td> {{ $leave['user']['id_no'] }}</td>
                                            
                                            <td> {{ $leave->start_date }}</td>
                                            <td> {{ $leave->end_date }}</td>

                                            <td>
                                                <a href="{{ route('employee.leave.edit',$value->id) }}"
                                                    class="btn btn-rounded btn-info mb-5">Edit</a>
                                                <a href="{{ route('employee.leave.delete',$value->id) }}"
                                                    class="btn btn-rounded btn-danger mb-5" id="delete">Delete</a>

                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
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