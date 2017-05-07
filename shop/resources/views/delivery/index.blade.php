@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>Deliveries</a></h2>
                        </div>
                        <div class='col-sm-6 text-right'>
                            @if(Auth::user()->hasRole('manager'))
                            <form action="{{ url('/deliveries/export')}}" method='POST'>
                                {{ csrf_field() }}
                                <button class="btn btn-primary btn-sm">Export to csv</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(count($items) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Order id</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->order_id }}</td>
                                <td>{{ $item->total }} Euro</td>
                                <td>
                                    @if($item->sent_at == null)
                                    Not sent
                                    @else
                                    Sent
                                    @endif
                                </td>
                                <td><a href="{{ url('/order/'.$item->order_id)}}">view</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else 
                    <h3>No deliveries</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
