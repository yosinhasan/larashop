@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if(isset($subscription))
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>Subscription id: {{$subscription->id}}</a></h2>
                        </div>
                        <div class='col-sm-6 text-right' >
                            @if(!empty($subscription->activated_at))
                            <h2>Status: Active</h2>
                            @if (!Auth::user()->hasRole('manager'))
                            <a href="{{ url('/subscription/deactivate/'.$subscription->id) }}" class="btn btn-danger btn-sm">deactivate</a>
                            @endif
                            @else 
                            <h2>Status: Inactive</h2>
                            @if (!Auth::user()->hasRole('manager'))
                            <a href="{{ url('/subscription/activate/'.$subscription->id) }}" class="btn btn-success btn-sm">activate</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3><strong>Start date:</strong> {{$subscription->start_date}}</h3>
                            <h3><strong>Next order date:</strong> {{$subscription->next_order_date}}</h3>
                            <h3><strong>Day iteration:</strong> {{$subscription->day_iteration}}</h3>
                        </div>
                    </div>
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
                        </tbody>
                    </table>
                    @else 
                    <h3>No items</h3>
                    @endif
                </div>
                @else 
                <div class="panel-heading">
                    <h3>Subscription not found</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
