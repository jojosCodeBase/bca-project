@extends('layouts/main')
@section('content')
    <main class="content p-lx-4 p-lg-4 p-md-4">
        <div class="mb-3 p-1">
            <h5>Admin Dashboard</h5>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Welcome Admin</h4>
                        <p class="card-text text-muted">Last updated: 16-02-24</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- <div class="col-3 p-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6>Total Student</h6>
                                    <h2>369</h2>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-mortarboard-fill fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6>Total Faculty</h6>
                                <h2>25</h2>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-person-video3 fs-3 text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 p-1">
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
            <!-- <div class="col-3 p-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6>Department</h6>
                                    <h2>1</h2>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-ui-checks-grid fs-3 text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>
        <div class=" mt-2">
            <div class="row mt-3">
                <div class="mb-1">
                    <h5>Last Uploaded </h5>
                </div>

                <div class="col">
                    <div class="table-contant">
                        <table class="table table-hover ">
                            <thead>
                                <th style="width: 70px;">Sl. No</th>
                                <th>Subject Id</th>
                                <th>Subject Name</th>
                                <th>Date</th>
                                <th>View</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>CA1601</td>
                                    <td>Software Engineering</td>
                                    <td>
                                        16-02-24
                                    </td>
                                    <td><a href="#">View</a></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>CA1603</td>
                                    <td>Python Programming</td>
                                    <td>16-02-24</td>
                                    <td><a href="#">View</a></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>CA1636</td>
                                    <td>Data Analytics Using Python</td>
                                    <td>16-02-24</td>
                                    <td><a href="#">View</a></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>CA1637</td>
                                    <td>Security and Privacy for Data Science</td>
                                    <td>16-02-24</td>
                                    <td><a href="#">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
