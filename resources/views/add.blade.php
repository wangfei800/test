@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home">Users List</a><span style="float:right;">
                        <a href="/add">Add New User</a></span></div>

                <div class="card-body" >
                    <form style="padding: 10px;" method="post" action="/{{$action}}">
                        {!! csrf_field() !!}
                        @if (isset($user['id']))
                        <input type="hidden" name="id" value="{{$user['id']}}" />
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input type="text" class="form-control" id="firstName"  name="first_name" value={{ $user['first_name']??'' }}>
                        </div>

                        <div class="form-group">
                            <label for="title">Last Name</label>
                            <input type="text" class="form-control" id="lastName"  name="last_name" value={{ $user['last_name']??'' }}>
                        </div>

                        <div class="form-group">
                            <label for="title">Email Address</label>
                            <input type="text" class="form-control" id="email"  name="email" value={{ $user['email']??'' }}>
                        </div>

                        <div class="form-group">
                            <label for="title">Status</label>
                            <input type="checkbox" class="form-control" name="status" class="switch-input" value="1" {{ ($user['status']??false) ? 'checked="checked"' : '' }}/>
                        </div>

                        <div class="form-group">
                            <label for="title">Password</label>
                            <input type="password" class="form-control" id="password"  name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
