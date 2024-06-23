@extends('layouts/main')
@section('title', 'Admin Dashboard')
@section('breadcrumb', 'Dashboard')
@section('content')
    <style>
        /* Custom CSS for additional control if needed */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling on touch devices */
        }
    </style>
    <div class="container-fluid scroll-main p-lx-3 p-lg-3 p-md-3 pt-3">
        <main class="content">
            <div class="mb-3">
                <h5>Admin Dashboard</h5>
            </div>

            <div class="row mb-3">
                <div class="col-xl-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-custom">Welcome Admin</h4>
                            <p class="card-text text-muted">Last login: {{ \Carbon\Carbon::parse(Auth::user()->last_seen)->format('g:i A, F j, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-xxl-3 col-lg-4 col-md-4 col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h2>{{ $totalFaculty }}</h2>
                                    <h6>Total Faculty</h6>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-person-video3 fs-3 text-custom"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-lg-4 col-md-4 col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h2>2</h2>
                                    <h6>Total Program</h6>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-chat-left-text-fill fs-3 text-custom"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-lg-4 col-md-4 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h2>{{ $courseCount }}</h2>
                                    <h6>Total Subjects</h6>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-journal-text fs-3 text-custom"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-light mt-2" style="margin-bottom: 7.5rem">
                <div class="row p-3 mt-3">
                    <div class="mb-1">
                        <h5>Last Uploaded </h5>
                    </div>

                    <div class="col">
                        <div class="table-responsive">
                            <div class="table-content">
                                <table class="table table-hover ">
                                    <thead>
                                        <th style="width: 70px;">Sl. No</th>
                                        <th>Subject Id</th>
                                        <th>Subject Name</th>
                                        <th>Batch</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        {{-- @dump($uploaded) --}}
                                        @foreach ($uploaded as $u)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $u['cid'] }}</td>
                                                <td>{{ $u['cname'] }}</td>
                                                <td>{{ $u['batch'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($u['updated_at'])->format('d-m-Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $uploaded->links() }} --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
