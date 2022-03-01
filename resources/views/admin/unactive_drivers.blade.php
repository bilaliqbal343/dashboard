@extends('includes.head')
@section('middle')
<style>
    table{
        display: block;
        overflow: scroll;
    }
</style>
<section class="content">
    <!--<a href="{{ url('add_user') }}"><button class="btn btn-primary" style="float: right"><i class="glyphicon glyphicon-plus"></i>Add New user</button></a>-->
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">New Drivers Requests</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">



                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>FatherName</th>
                            <th>DOB</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>City</th>
                            <th>Car model</th>
                            <th>Car Number</th>
                            <th>Car Color</th>
                            <th>license Number</th>
                            <th>NIC</th>
                            <th>Profile Pic</th>
<!--                            <th>Car Document Front Pic</th>-->
<!--                            <th>Car Document Back Pic</th>-->
<!--                            <th>License Pic</th>-->
<!--                            <th>NIC front Pic</th>-->
<!--                            <th>NIC Back Pic</th>-->
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->father_name }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->car_model }}</td>
                            <td>{{ $user->car_number }}</td>
                            <td>{{ $user->car_color }}</td>
                            <td>{{ $user->license_number }}</td>
                            <td>{{ $user->nic }}</td>
                            <td><img style="width: 40px; height: 70px;" src="public/uploads/{{$user->profile_pic}}"></td>
<!--                            <td><img style="width: 60px; height: 70px;" src="public/uploads/{{$user->document_1}}"></td>-->
<!--                            <td><img style="width: 60px; height: 70px;" src="public/uploads/{{$user->document_2}}"></td>-->
<!--                            <td><img style="width: 60px; height: 70px;" src="public/uploads/{{$user->license_pic}}"></td>-->
<!--                            <td><img style="width: 60px; height: 70px;" src="public/uploads/{{$user->nic_1}}"></td>-->
<!--                            <td><img style="width: 60px; height: 70px;" src="public/uploads/{{$user->nic_2}}"></td>-->
                            @if($user->status==1)
                            <td style="color: #008000; font-weight: bold">active</td>
                            @else
                            <td style="color: red;font-weight: bold">unactive</td>
                            @endif
                            <td>

                                <a href="{{ url('edit_user') }}/{{ $user->id }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-pencil"></i></a><a href="{{ url('delete_user') }}/{{ $user->id }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></td>

                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>


@endsection()