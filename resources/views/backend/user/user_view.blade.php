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
                            <h3 class="box-title">User List</h3>
                            <a href="{{route('user.add')}}" style="float:right"
                                class="btn btn-rounded btn-success mb-5">Add User</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">S.NO</th>
                                            <th>ROLE</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th width="20%">ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key=>$user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->usertype}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-rounded btn-warning mb-5">Edit</a>
                                                <a href="{{route('user.delete',$user->id)}}" id="delete" class="btn btn-rounded btn-danger mb-5">Delete</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>ROLE</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>ACTION</th>

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