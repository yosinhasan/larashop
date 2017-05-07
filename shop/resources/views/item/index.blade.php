@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>All Items</a></h2>
                        </div>
                        @if (Auth::user()->hasRole('manager'))
                        <div class='col-sm-6  text-right'>
                            <a class="btn btn-primary btn-sm" href="{{ url('/item/new') }}">new item</a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="panel-body">
                    <div class="container">
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>
                                    A new item was added
                                </li>
                            </ul>
                        </div>
                        @endif
                        @if(count($items) > 0)
                        @foreach($items as $item)
                        <div class="col-sm-4">
                            <h3> <a href="{{ url('/item/'.$item->id)}}">{{$item->name}}</a></h3>
                            <h5>{{$item->price}} Euro </h5>
                            @if (!Auth::user()->hasRole('manager'))
                            <form action="{{ url('/cart')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="amount" value="1"/>
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-primary add-to-cart">add to cart</button>
                            </form>
                            @else
                            <a href="{{ url('/item/edit/'.$item->id) }}" class="btn btn-default btn-sm">&nbsp;&nbsp;edit&nbsp;&nbsp;</a>
                            <a href="#" class="btn btn-danger btn-sm">delete</a>
                            @endif
                        </div>
                        @endforeach
                        @else 
                        <h3>No items</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
