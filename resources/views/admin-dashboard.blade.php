@extends('layouts/main')
@section('title', 'Admin Dashboard')
@section('breadcrumb', 'Dashboard')
@section('content')
    {{-- <div class="container"> --}}
        <main class="content">
            <div class="mb-1 p-1">
                <h5>Admin Dashboard</h5>
            </div>

            <div class="row mb-3">
                <div class="col-xl-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-custom">Welcome Admin</h4>
                            <p class="card-text text-muted">Last updated: 15-03-24</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6>Total Faculty</h6>
                                    <h2>{{ $totalFaculty }}</h2>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-person-video3 fs-3 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6>Total Program</h6>
                                    <h2>2</h2>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-chat-left-text-fill fs-3 text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6>Total Subjects</h6>
                                    <h2>{{ $courseCount }}</h2>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-journal-text fs-3 text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6>Remaining Sub</h6>
                                    <h2>{{ $courseCount }}</h2>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-check2-all"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="bg-light mt-2">
                <div class="row p-3 mt-3">
                    <div class="mb-1">
                        <h5>Last Uploaded </h5>
                    </div>

                    <div class="col">
                        <div class="table-content">
                            <table class="table table-hover ">
                                <thead>
                                    <th style="width: 70px;">Sl. No</th>
                                    <th>Subject Id</th>
                                    <th>Subject Name</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($courses); $i++)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $courses[$i]['cid'] }}</td>
                                            <td>{{ $courses[$i]['cname'] }}</td>
                                            <td>{{ $courses[$i]['created_at'] }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    {{-- </div> --}}

@endsection
