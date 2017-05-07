@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if(isset($order))
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>Order made by:    {{$orderUser->name}}</a></h2>
                            <h2><a>Order id:    {{$order->id}}</a></h2>
                        </div>
                        @if (Auth::user()->hasRole('manager') && $order->status_id == 1) 
                        <div class='col-sm-3 col-sm-offset-3'>
                            <form class="form-inline" action='{{ url('/order/update')}}' method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$order->id}}">
                                <select class='form-control' name='status_id'>
                                    @foreach($statuses as $status)
                                    <option <?= ($status->id == $order->status_id) ? 'selected' : '' ?> value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class='btn btn-primary btn-sm'>Update</button>
                            </form>
                        </div>
                        @else
                        @foreach($statuses as $status)
                        @if($status->id == $order->status_id)
                        <div class='col-sm-6 text-right' >
                            <h2>Status: {{$status->name}} </h2>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    @if (\Session::has('isDeliveryAdded') && \Session::get('isDeliveryAdded'))
                    <div class="alert alert-success">
                        <ul>
                            <li>New delivery package was added</li>
                        </ul>
                    </div>
                    @endif
                    @if(count($items) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->amount }}</td>
                                <td><a href="{{ url('/item/'.$item->item_id)}}">view</a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">
                                    Total
                                </td>
                                <td colspan="2">
                                    {{$order->total}} Euro
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @else 
                    <h3>No items</h3>
                    @endif
                </div>
                @else 
                <div class="panel-heading">
                    <h3>Order not found</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
