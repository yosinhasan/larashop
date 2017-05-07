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
                            <form action="{{ url('/cart/complete') }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">Complete</button>
                            </form>

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
                                    {{ $all[$item->id] }}
                                </td>
                            </tr>
                            <?php $total += $item->price * $all[$item->id]; ?>
                            @endforeach
                            <tr>
                                <td colspan="3">
                                    <h4> Total: {{ $total }} Euro </h4>
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
