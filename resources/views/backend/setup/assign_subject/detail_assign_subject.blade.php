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
                            <h3 class="box-title"><strong>{{$detailData['0']->StudentClass->name}} Details</strong></h3>
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive table-hover display">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="5%">S.NO</th>
                                            
                                            <th>Student Subject</th>
                                            <th>Full Marks</th>
                                            <th>Pass Mark</th>
                                            <th>Subjective Marks</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detailData as $key=>$subject)
                                        <tr>
                                            <td>{{$key+1}}</td>

                                            <td>{{$subject->StudentSubject->name}}</td>
                                            <td>{{$subject->full_mark}}</td>
                                            <td>{{$subject->pass_mark}}</td>
                                            <td>{{$subject->subjective_mark}}</td>
                                            

                                            

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot class="tfoot-light">
                                        <tr>
                                            <th width="5%">S.NO</th>
                                            
                                            <th>Student Subject</th>
                                            <th>Full Marks</th>
                                            <th>Pass Mark</th>
                                            <th>Subjective Marks</th>
                                            
                                            

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