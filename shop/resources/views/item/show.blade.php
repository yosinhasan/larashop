@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if(isset($item))
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>{{$item->name}}</a></h2>
                        </div>
                        @if (Auth::user()->hasRole('manager'))
                        <div class='col-sm-6 text-right'>
                            <a href="{{ url('/item/edit/'.$item->id) }}" class="btn btn-default btn-sm">&nbsp;&nbsp;edit&nbsp;&nbsp;</a>
                            <a href="#" class="btn btn-danger btn-sm">delete</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    <div class="container">
                        <div class='row'>
                            <div class="col-md-6">
                                <h3>Price:</h3>
                                {{$item->price}} Euro
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-md-8">
                                <h3>Detail:</h3>
                                <p>
                                    {{$item->details}}
                                </p>
                            </div>
                        </div>
                        @if (!Auth::user()->hasRole('manager'))
                        <div class='row'>
                            <div class="col-md-6">
                                <form class="form-inline" action="{{ url('/cart/update')}}" method="POST">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <input type="number" class="form-control" name="amount" id="quantity" placeholder="Input quantity">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add to cart</button>
                                </form>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                @else 
                <div class="panel-heading">
                    <h3>Item not found</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
