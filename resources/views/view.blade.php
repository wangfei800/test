@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="/home">User List</a> > <a href="">User Details</a><span style="float:right;">
                        <a href="/edit/{{$user['id']}}">Edit</a></span></div>

                    <div class="card-body" >
                        <form style="padding: 10px;" method="post" action="/">
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
                                <input type="text" readonly class="form-control" id="firstName"  name="first_name" value={{ $user['first_name']??'' }}>
                            </div>

                            <div class="form-group">
                                <label for="title">Last Name</label>
                                <input type="text" readonly class="form-control" id="lastName"  name="last_name" value={{ $user['last_name']??'' }}>
                            </div>

                            <div class="form-group">
                                <label for="title">Email Address</label>
                                <input type="text" readonly class="form-control" id="email"  name="email" value={{ $user['email']??'' }}>
                            </div>

                            <div class="form-group">
                                <label for="title">Status</label>
                                <input type="checkbox" onclick="return false;" class="form-control" name="active" class="switch-input" value="1" @if ($user['active']) checked="checked" @endif />
                            </div>

                        </form>
                    </div>

                    @if(isset($user['id']))
                        <div class="card-header"><a href="/home">Addresses</a><span style="float:right;">
                                <a href="/addAddress/{{$user['id']}}">Add New Address</a></span>
                                    </div>
                        <div  >
                            @foreach ($user->addresses()->get() as $address)
                                <a href="/editAddress/{{$user['id']}}/{{ $address['id']}}" title="Edit">
                                    <div class="bg-info" style="margin:20px;padding:10px;"> Type: {{ $address['type']??'' }} <br/>
                                     Street Address: {{ $address['street_address']??'' }} <br/>
                                     City: {{ $address['city']??'' }} <br/>
                                     Province: {{ $address['province']??'' }} <br/>
                                    Country: {{ $address['country']??'' }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
