@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Manage Profile</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" id="email" class="form-control"
                                                            value="{{$editData->email}}">


                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            value="{{$editData->name}}">


                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Roll no <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="roll_no" id="roll_no"
                                                            class="form-control" value="{{$editData->roll_no}}"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Mobile No. <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" id="mobile"
                                                            class="form-control" value="{{$editDetail->mobile}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Address<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" id="address"
                                                            class="form-control" value="{{$editDetail->address}}">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Age<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="age" id="age" class="form-control"
                                                            value="{{$editDetail->age}}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Gender<span class="text-danger">*</span></h5>
                                                    <select name="gender" id="gender" required="" class="form-control"
                                                        aria-invalid="false">
                                                        <option value="" selected="" disabled="">Select Gender
                                                        </option>
                                                        <option value="Male"
                                                            {{($editDetail->gender=="Male"? "selected":"")}}>Male
                                                        </option>
                                                        <option value="Female"
                                                            {{($editDetail->gender=="Female"? "selected":"")}}>Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path"
                                                            id="profile_photo_path" class="form-control">
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <h5>Status<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="status" id="status" class="form-control"
                                                            value="{{$editDetail->status}} " disabled>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <h5>Selected Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <img id="showimage" src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}"
                                                            style="width:100px;height:100px;border:1px solid #000000">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-success mb-5"
                                        value="submit">Update</button>
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
    $(document).ready(function(){
        $('#profile_photo_path').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);

            }
            console.log('hi')
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
@endsection