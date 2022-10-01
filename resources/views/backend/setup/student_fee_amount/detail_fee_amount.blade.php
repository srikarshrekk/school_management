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
                            <h3 class="box-title"><strong>{{$detailData['0']->Student_Fee->name}} Details</strong></h3>
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive table-hover display">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="5%">S.NO</th>
                                            
                                            <th>Student Class</th>
                                            <th>Amount</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detailData as $key=>$amount)
                                        <tr>
                                            <td>{{$key+1}}</td>

                                            <td>{{$amount->Class_Name->name}}</td>
                                            <td>{{$amount->amount}}</td>
                                            

                                            

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot class="tfoot-light">
                                        <tr>
                                            <th width="5%">S.NO</th>
                                            
                                            <th>Student Class</th>
                                            <th width="20%">Amount</th>
                                            
                                            

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