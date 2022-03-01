@extends('includes.head')
@section('middle')

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ url('insert_user') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box-body">



                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input  type="text" name="name"  class="form-control" id="exampleInputEmail1" placeholder="Enter Name " >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Father Name</label>
                                <input  type="text" name="father_name"  class="form-control" id="exampleInputEmail1" placeholder="Enter Father name " >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">DOB</label>
                                <input type="date" value="" name="dob" class="form-control" id="theDate" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input  type="text" name="email"  class="form-control" id="exampleInputEmail1" placeholder="Enter License Number " >
                            </div>
                        </div>



<style type="text/css">
    .cc-picker-code{
        display: none;
    }
    .cc-picker{
        border: 1px solid #ccc;
        border-right: 0;
    }
    #phoneField1{
        border-left: 0;
        padding-left: 0;
    }
    
    .cc-picker-code-select-enabled::after{
        top: 20px;
        right: 10px
    }
    .cc-picker-flag.es{
        margin: 5px;
    }

</style>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <div style="display: flex;">
                                <input type="text"  name="number" class="form-control" id="phoneField1" placeholder="Enter Contact Number " >
                            </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">City</label>
                                <input  type="text" name="city"  class="form-control" id="exampleInputEmail1" placeholder="Enter City Name " >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Car Model</label>
                                <input  type="text" name="car_model"  class="form-control" id="exampleInputEmail1" placeholder="Enter Car Model " >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Car Number</label>
                                <input type="text" value="" name="car_number" class="form-control" id="theDate" placeholder="Enter Car Number " >
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Car Color</label>
                                <input  type="text" name="car_color"  class="form-control" id="exampleInputEmail1" placeholder="Enter Car Color " >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">License Number</label>
                                <input  type="text" name="license_number"  class="form-control" id="exampleInputEmail1" placeholder="Enter License Number " >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIC</label>
                                <input type="text" value="" name="nic" class="form-control" id="theDate" placeholder="Enter NIC Number " >
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" value="" name="password" class="form-control" id="theDate" placeholder="Enter Password " >
                            </div>
                        </div>




                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea class="form-control" placeholder="Enter Complete Address " style="height: 110px" name="address"></textarea>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Profile Pic</label>
                                <input type="file"  name="profile_pic" class="form-control" id="theDate"  required="required" >
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Car Document Front Pic</label>
                                <input type="file"  name="document_1" class="form-control" id="theDate" required="required"  >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Car Document Back Pic</label>
                                <input type="file"  name="document_2" class="form-control" id="theDate"  required="required" >
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">License Card Pic</label>
                                <input type="file"  name="license_pic" class="form-control" id="theDate"  required="required" >
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIC Front Pic</label>
                                <input type="file"  name="nic_1" class="form-control" id="theDate"  required="required" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIC Back Pic</label>
                                <input type="file"  name="nic_2" class="form-control" id="theDate"  required="required" >
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