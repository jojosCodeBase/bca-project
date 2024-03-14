@extends('layouts/admin')
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
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Profile Information</h4>
                        <p>Update your account's profile information and email address.</p>
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary w-25" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Update Password</h4>
                        <p>Ensure your account is using a long, random password to stay secure.</p>
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
                            <div class="form-group">
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
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary w-25" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- @extends('layouts/main')
@section('content')
<div class="main">
    <nav class="navbar navbar-expand px-3 border-bottom bg-light">
        <button class="btn" id="sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="breadcrumb-bar text-primary px-3">
            <span class="breadcrumb-item fs-6">
                Profile
            </span>
        </div>
        <div class="navbar-collapse navbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                        <img src="admin.png" class="avatar img-fluid" alt="profile-ph">
                        <span class="text-dark">Bikram Das</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="profile.html" class="dropdown-item">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Settings & Privacy</a>
                        <a href="#" class="dropdown-item">Help Center</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Log-Out</a>
                    </div>

                </li>
            </ul>

        </div>
    </nav>

    <main class="content p-lx-4 p-lg-4 p-md-4">
        <div class="bg-light">
            <div class="row">
                <div class="col-12">
                    <h3>Profile Update</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-2 bg-light rounded-2">
                <div class=" col-6 ms-3">
                    <h4 class="mt-2 ps-5">Profile Information</h4>
                    <p>Update your Profile's Information</p>
                    <form action="#">
                        <div class="mt-3">
                            <label for="#">Name</label>
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="mt-3">
                            <label for="#">Email</label>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mt-3">
                            <label for="#">Ph.No</label>
                            <input type="number" class="form-control" placeholder="Ph No">
                        </div>
                    </form>
                    <div class="my-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
            <div class="row mt-2 bg-light rounded-2">
                <div class="col-6 ms-3">
                    <h4 class="mt-2">Update Password</h4>
                    <p>Please ensure that you choose a strong password with random numbers and characters.</p>
                    <form action="#">
                        <div class="mt-3">
                            <label for="ops">Old Password</label>
                            <input type="text" name="#" id="ops" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="nps">New Password</label>
                            <input type="text" name="#" id="nps" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="cps">Confirm Password</label>
                            <input type="text" name="#" id="cps" class="form-control">
                        </div>
                    </form>
                    <div class="my-3 ">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection --}}
