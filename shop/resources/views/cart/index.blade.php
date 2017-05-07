@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>Cart</a></h2>
                        </div>
                        @if (!Auth::user()->hasRole('manager'))
                        <div class='col-sm-6 text-right'>
                            <a href="{{ url('/subscription/new') }}" class="btn btn-default">Create subscription</a>
                            <a href="{{ url('/cart/checkout') }}" class="btn btn-primary">Check out</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    @if(count($items) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach($items as $item)
                            <tr>
                                <td><a href="{{ url('/item/'.$item->id)}}">{{ $item->name }}</a></td>
                                <td>{{ $item->price }} Euro</td>
                                <td>
                                    <form class="form-inline" action="{{ url('/cart/update')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="number" class="form-control" name="amount" id="quantity" placeholder="Input quantity" value="{{ $all[$item->id] }}"> 
                                        <button type="submit" class="btn btn-primary btn-sm">update</button>
                                        <a class="btn btn-danger btn-sm" href="{{ url('/cart/delete/'.$item->id) }}">delete</a>
                                    </form>
                                </td>
                            </tr>
                            <?php $total += $item->price * $all[$item->id]; ?>
                            @endforeach
                            <tr>
                                <td colspan="2">
                                    <h4> Total: {{ $total }} Euro </h4>
                                </td>
                                <td colspan="1" class="text-right">
                                    <form action="{{url('/cart/clear')}}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">Clear cart</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @else 
                    <h3>Cart is empty</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
