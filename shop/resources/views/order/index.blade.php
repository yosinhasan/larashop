@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>Orders</a></h2>
                        </div>
                        <div class='col-sm-4 col-sm-offset-2'>
                            <select name="orderStatus" class="form-control">
                                @foreach($statuses as $status)
                                <option <?=($statusId == $status->id) ? 'selected' : ''?> value="{{$status->id}}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="url" value="{{ url('/orders')}}">
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(count($orders) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $item)
                            <tr>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->name }}</td>
                                <td><a href="{{ url('/order/'.$item->id)}}">view</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else 
                    <h3>No orders</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
