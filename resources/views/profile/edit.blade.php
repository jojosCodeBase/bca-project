@extends('layouts.main')
@section('title', 'Profile Edit')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div id="alertMessage" class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Profile Information</h4>
                        {{-- <p>Update your account's profile information and email address.</p> --}}
                        @if (Auth::user()->is_faculty)
                            <form method="post" action="{{ route('profile.update') }}">
                            @else
                                <form method="post" action="{{ route('profile.update') }}">
                        @endif
                        @csrf
                        @method('patch')

                        <div class="form-group mt-2">
                            <label class="form-label">Faculty Id.</label>
                            <input type="text" class="form-control" name="text" value="202116057" readonly>
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-primary w-25" value="Save">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Update Password</h4>
                        {{-- <p>Ensure your account is using a long, random password to stay secure.</p> --}}
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password">
                                <div class="mt-2 text-danger">
                                    @if ($errors->updatePassword->has('current_password'))
                                        <span>{{ $errors->updatePassword->first('current_password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password">
                                <div class="mt-2 text-danger">
                                    @if ($errors->updatePassword->has('password'))
                                        <span>{{ $errors->updatePassword->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-primary" value="Change Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">

        </div>
    </div>
@endsection
