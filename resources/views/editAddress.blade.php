@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home">User List</a> >
                    <a href="/view/{{$userId}}">User Details</a> >
                    Address Edit<span style="float:right;">
                        <a href="/add"></a></span></div>

                <div class="card-body" >
                    <form style="padding: 10px;" method="post" action="/{{$action}}">
                        {!! csrf_field() !!}
                        @if (isset($address['id']))
                        <input type="hidden" name="id" value="{{$address['id']}}" />
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
                            <label for="title">Type</label>
                            <input type="text" class="form-control" id="type"  name="type" value={{ $address['type']??'' }}>
                        </div>

                        <div class="form-group">
                            <label for="title">Street Address</label>
                            <input type="text" class="form-control" id="street_address"  name="street_address" value={{ $address['street_address']??'' }}>
                        </div>

                        <div class="form-group">
                            <label for="title">City</label>
                            <input type="text" class="form-control" id="city"  name="city" value={{ $address['city']??'' }}>
                        </div>

                        <div class="form-group">
                            <label for="title">Province</label>
                            <input type="text" class="form-control" id="province"  name="province" value={{ $address['province']??'' }}>
                        </div>

                        <div class="form-group">
                            <label for="title">Country</label>
                            <input type="text" class="form-control" id="country"  name="country" value={{ $address['country']??'' }}>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
