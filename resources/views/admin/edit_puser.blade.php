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