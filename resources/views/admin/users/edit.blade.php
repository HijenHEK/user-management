@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('update-success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('update-success')}} .
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    
            @endif
            <div class="card">
                <div class="card-header">{{ __('Profile Information') }}</div>

                <div class="card-body">
                    @if (session('status') == 'profile-information-updated')
                        <div class="alert alert-success" role="alert">
                            {{ __('Profile information saved successfully.') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.users.update', $user->id)  }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            @foreach ($roles as $role)
                            
                            <div class="form-check row mr-3">
                                    
                                    <input type="checkbox" class="@error('roles') is-invalid @enderror " value="{{$role->id}}" name="roles[]" {{$user->hasRole($role) ? 'checked' : '' }} >
                                    <label for="roles">{{$role->name}}</label>
    
                                    @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            @endforeach
    
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection