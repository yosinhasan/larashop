@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><a>Edit item</a></h2></div>
                <div class="panel-body">
                    {{ Form::model($item, ['class' => 'form-horizontal', 'url' => '/item/update/'.$item->id]) }}    
                    <!-- name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name', 'Name',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::text('name', $item->name, ['class' => 'form-control', 'required' => 'required']) }}
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> 
                    <!-- price -->
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        {{ Form::label('price', 'Price',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::text('price', $item->price, ['class' => 'form-control', 'required' => 'required']) }}
                            @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> 
                    <!-- details -->
                    <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                        {{ Form::label('details', 'Details',['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::textarea('details', $item->details, ['class' => 'form-control', 'required' => 'required']) }}
                            @if ($errors->has('details'))
                            <span class="help-block">
                                <strong>{{ $errors->first('details') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
