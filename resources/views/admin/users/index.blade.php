@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card users-card">
                <div class="card-header">

                    <div class="title">Users</div>
                    <div class="param">
                        <span>color</span>
                        <span class="color bg-dark"></span>
                        <span>size</span>
                        <span class="size"></span>
                    </div>
                
                </div>

                <div class="card-body">
                    <table class="table table-hover users-table">

                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">emaile</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)

                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>N/A</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
