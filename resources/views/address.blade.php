@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home">Address List</a><span style="float:right;">
                        <a href="/add">Add New Address</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Type</td>
                                <td>Street Address</td>
                                <td>City</td>
                                <td>Province</td>
                                <td>Country&nbsp;</td>
                            </tr>
                            </thead>
                        @foreach ($addresses as $address)
                            <tbody>

                            <tr>
                                <td>{{ $address->type }}</td>
                                <td>{{ $address->street_address }}</td>
                                <td>{{ $address->city }}</td>
                                <td>{{ $address->province }}</td>
                                <td><a href="/edit?id={{ $address->id }}">Edit</a></td>
                            </tr>
                            </tbody>
                        @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
