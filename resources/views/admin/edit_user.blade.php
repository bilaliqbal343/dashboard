@extends('includes.head')
@section('middle')

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ url('update_user') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id" value="{{ $user[0]->id }}">
                    <div class="box-body">



                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input  type="text" name="name"  value="{{ $user[0]->name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Name Here" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Father Name</label>
                                <input  type="text" name="father_name"  value="{{ $user[0]->father_name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Fathername Here" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">DOB</label>
                                <input type="date"  value="{{ $user[0]->dob }}" name="dob" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input  type="text" name="email" value="{{ $user[0]->email }}"  class="form-control" id="exampleInputEmail1" placeholder="Enter License Number Here" >
                            </div>
                        </div>




                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input type="text" value="{{ $user[0]->number }}" name="number" class="form-control" id="theDate" placeholder="Enter NIC Number Here" >
                            </div>
                        </div>




                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">City</label>
                                <input  type="text" value="{{ $user[0]->city }}" name="city"  class="form-control" id="exampleInputEmail1" placeholder="Enter City Name Here" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Car Model</label>
                                <input  type="text" value="{{ $user[0]->car_model }}" name="car_model"  class="form-control" id="exampleInputEmail1" placeholder="Enter Car Model Here" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Car Number</label>
                                <input type="text" value="{{ $user[0]->car_number }}" name="car_number" class="form-control" id="theDate" placeholder="Enter Car Number Here" >
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Car Color</label>
                                <input  type="text" name="car_color" value="{{ $user[0]->car_color }}"  class="form-control" id="exampleInputEmail1" placeholder="Enter City Color Here" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">License Number</label>
                                <input  type="text" name="license_number" value="{{ $user[0]->license_number }}"  class="form-control" id="exampleInputEmail1" placeholder="Enter License Number Here" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIC</label>
                                <input type="text" value="{{ $user[0]->nic }}" name="nic" class="form-control" id="theDate" placeholder="Enter NIC Number Here" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea class="form-control" placeholder="Enter Complete Address Here" style="height: 110px" name="address">{{ $user[0]->address }}</textarea>
                            </div>
                        </div>





                        <div class="col-md-4">
                            <div class="form-group">
                                <img id="profile_pic" style="width: 120px; height: 90px;" src="{{ url('public/uploads/') }}/{{ $user[0]->profile_pic }}"><br>
                                <input type="hidden" name="edit_profile_pic" value="{{ $user[0]->profile_pic }}">
                                <label for="exampleInputEmail1">Profile Pic</label>
                                <input  onchange="document.getElementById('profile_pic').src = window.URL.createObjectURL(this.files[0])" type="file"  name="profile_pic" class="form-control" id="theDate"  >
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <img id="document_1" style="width: 120px; height: 90px;" src="{{ url('public/uploads/') }}/{{ $user[0]->document_1 }}"><br>
                                <input type="hidden" name="edit_document_1" value="{{ $user[0]->document_1 }}">
                                <label for="exampleInputEmail1">Car Document Front Pic</label>
                                <input onchange="document.getElementById('document_1').src = window.URL.createObjectURL(this.files[0])" type="file"  name="document_1" class="form-control" id="theDate" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <img id="document_2" style="width: 120px; height: 90px;" src="{{ url('public/uploads/') }}/{{ $user[0]->document_2 }}"><br>
                                <input type="hidden" name="edit_document_2" value="{{ $user[0]->document_2 }}">
                                <label for="exampleInputEmail1">Car Document Back Pic</label>
                                <input type="file" onchange="document.getElementById('document_2').src = window.URL.createObjectURL(this.files[0])"  name="document_2" class="form-control" id="theDate"   >
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <img id="license_pic" style="width: 120px; height: 90px;" src="{{ url('public/uploads/') }}/{{ $user[0]->license_pic }}"><br>
                                <input type="hidden" name="edit_license_pic" value="{{ $user[0]->license_pic }}">
                                <label for="exampleInputEmail1">License Card Pic</label>
                                <input onchange="document.getElementById('license_pic').src = window.URL.createObjectURL(this.files[0])" type="file"  name="license_pic" class="form-control" id="theDate"   >
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <img id="nic_1" style="width: 120px; height: 90px;" style="width: 60px; height: 70px;" src="{{ url('public/uploads/') }}/{{ $user[0]->nic_1 }}"><br>
                                <input type="hidden" name="edit_nic_1" value="{{ $user[0]->nic_1 }}">
                                <label for="exampleInputEmail1">NIC Front Pic</label>
                                <input onchange="document.getElementById('nic_1').src = window.URL.createObjectURL(this.files[0])" type="file"  name="nic_1" class="form-control" id="theDate"  >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <img id="nic_2" style="width: 120px; height: 90px;" src="{{ url('public/uploads/') }}/{{ $user[0]->nic_2 }}"><br>
                                <input type="hidden" name="edit_nic_2" value="{{ $user[0]->nic_2 }}">
                                <label for="exampleInputEmail1">NIC Back Pic</label>
                                <input onchange="document.getElementById('nic_2').src = window.URL.createObjectURL(this.files[0])"  type="file"  name="nic_2" class="form-control" id="theDate"   >
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select class="form-control" name="status">

                                    <option value="1" {{ '1' == $user[0]->status ? "selected" : "" }}>Active</option>
                                    <option value="0" {{ '0' == $user[0]->status ? "selected" : "" }}>UnActive</option>

                                </select>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection()