@extends('includes.head')
@section('middle')
<style>
    table{
        display: block;
        overflow: scroll;
    }
</style>
<section class="content">
    <a href="{{ url('add_user') }}"><button class="btn btn-primary" style="float: right"><i class="glyphicon glyphicon-plus"></i>Add New user</button></a>
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Registered Passengers</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">



                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                           
                            <th>DOB</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->city }}</td>
                            
                            
                            @if($user->status==1)
                            <td style="color: #008000; font-weight: bold">active</td>
                            @else
                            <td style="color: red;font-weight: bold">unactive</td>
                            @endif
                            <td>

                                <a href="{{ url('edit_puser') }}/{{ $user->id }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-pencil"></i></a><a href="{{ url('delete_user') }}/{{ $user->id }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></td>

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