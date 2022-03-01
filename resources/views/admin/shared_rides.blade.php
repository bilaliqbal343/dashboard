@extends('includes.head')
@section('middle')
<style>
    table{
        display: block;
        overflow: scroll;
    }
</style>
<section class="content">
   
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Shared Rides</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">



                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
            
                            <th>Driver Name</th>
                            <th>Driver Number</th>
                            <th>Car Number</th>
                            <th>Car Model</th>
                            <th>Car Color</th>
                            <th>City</th>
                            <th>Starting Point</th>
                            <th>Destination Point</th>
                            <th>Seats</th>
                            <th>Seat Cost</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Status</th>
                            

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            
                            <td>{{ $user->driver_name }}</td>
                            <td>{{ $user->driver_number }}</td>
                            <td>{{ $user->car_number }}</td>
                            <td>{{ $user->car_model }}</td>
                            <td>{{ $user->car_color }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->start_name }}</td>
                            <td>{{ $user->dest_name }}</td>
                            <td>{{ $user->seat_no }}</td>
                            <td>{{ $user->seat_cost }}</td>
                            <td>{{ $user->time }}</td>
                            <td>{{ $user->date }}</td>
                            <td>{{ $user->status }}</td>
                          
                            
                            @if($user->status==1)
                            <td style="color: #008000; font-weight: bold">active</td>
                            @else
                            <td style="color: red;font-weight: bold">unactive</td>
                            @endif
                            <td>

                                <a href="{{ url('update_ride_status') }}/{{ $user->id }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></td>

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