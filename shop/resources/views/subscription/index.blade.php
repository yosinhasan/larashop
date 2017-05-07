@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-4'>
                            <h2><a>Subscriptions</a></h2>
                        </div>
                        @if(Auth::user()->hasRole('manager'))
                        <div class='col-sm-4 text-right'>
                            <form action="{{ url('order/subscription/create')}}" method='POST'>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default btn-sm">Create orders based on next order date</button>
                            </form>
                        </div>
                        <div class='col-sm-4'>
                            <form action="{{ url('order/subscription/create')}}" method='POST'>
                                {{ csrf_field() }}
                                <input type="hidden" name='includeStartDate' value='1' />
                                <button type="submit" class="btn btn-default btn-sm">Create orders based on start/next order date</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    @if (\Session::has('wasntAdded'))
                    <div class="alert alert-warning">
                        <ul>
                            <li>No orders were created</li>
                        </ul>
                    </div>
                    @endif
                    @if (\Session::has('added'))
                    <div class="alert alert-success">
                        <ul>
                            <li>
                                @if(\Session::get('added') == 1)
                                a new order was created
                                @else
                                {!! \Session::get('added') !!} new orders were created
                                @endif
                            </li>
                        </ul>
                    </div>
                    @endif
                    @if(count($subscriptions) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Start date</th>
                                <th>Next order date</th>
                                <th>Day iteration</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subscriptions as $item)
                            <tr>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->next_order_date }}</td>
                                <td>{{ $item->day_iteration }}</td>
                                <td>
                                    @if(!empty($item->activated_at))
                                    Activated
                                    @if (!Auth::user()->hasRole('manager'))
                                    <a  href="{{ url('/subscription/deactivate/'.$item->id) }}" class="btn btn-danger btn-sm">deactivate</a>
                                    @endif
                                    @else 
                                    Deactivated
                                    @if (!Auth::user()->hasRole('manager'))
                                    <a href="{{ url('/subscription/activate/'.$item->id) }}" class="btn btn-success btn-sm">activate</a>
                                    @endif
                                    @endif
                                </td>
                                <td><a href="{{ url('/subscription/'.$item->id)}}">view</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else 
                    <h3>No subscriptions</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
