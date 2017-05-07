@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h2><a>Users</a></h2>
                        </div>
                        <div class='col-sm-4 col-sm-offset-2'>
                            <select name="userAction" class="form-control">
                                <option <?= ($currentActionId == 1) ? 'selected' : '' ?> value="1">All</option>
                                <option <?= ($currentActionId == 2) ? 'selected' : '' ?> value="2">Customers with more than one paid order</option>
                                <option <?= ($currentActionId == 3) ? 'selected' : '' ?> value="3">Customers with an active subscription and at least one paid order</option>
                                <option <?= ($currentActionId == 4) ? 'selected' : '' ?> value="4">Customers with failed orders and without an active subscription</option>
                            </select>
                            <input type="hidden" name="userUrl" value="{{ url('/users')}}">
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(count($users) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if($item->hasRole('manager'))
                                    Admin
                                    @else
                                    User
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else 
                    <h3>No users</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
