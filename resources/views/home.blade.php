@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home">Users List</a><span style="float:right;">
                        <a href="/add">Add New User</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Fist Name</td>
                                <td>Last Name</td>
                                <td>Email</td>
                                <td>status</td>
                                <td>&nbsp;</td>
                            </tr>
                            </thead>
                        @foreach ($users as $user)
                            <tbody>

                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->active? 'Active' : 'Inactive' }}</td>
                                <td><a href="/edit?id={{ $user->id }}">Edit</a></td>
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
