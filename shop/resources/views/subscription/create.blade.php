@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>New subscription</a></h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/subscription/new') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Start date</label>
                                <div class="col-md-6">
                                    <input id="name" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
                                    @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('day_iteration') ? ' has-error' : '' }}">
                                <label for="day_iteration" class="col-md-4 control-label">Day iteration</label>
                                <div class="col-md-6">
                                    <input id="day_iteration" type="number" min="1" class="form-control" name="day_iteration" value="{{ old('day_iteration') }}" required>
                                    @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('day_iteration') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('activated') ? ' has-error' : '' }}">
                                <label for="activated" class="col-md-4 control-label">Status</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="activated">
                                        <option value="0" selected="">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                    @if ($errors->has('activated'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('activated') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add subscription
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(count($items) > 0)
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Subscription items</h3>
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
                                        <td>{{ $all[$item->id] }}</td>
                                        <td><a href="{{ url('/item/'.$item->item_id)}}">view</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else 
                    <h3>No items</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
