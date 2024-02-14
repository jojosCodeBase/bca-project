@extends('layouts/main')
@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <h5>Admin Dashboard</h5>
        </div>
        <div class="row dashboard">
            <div class="col-12 col-xl-4 col-lg-4 col-md-4 col-sm-4 ">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Uploaded-Files</h5>
                        <div class="fs-2">10</div>
                        <p class="card-text">Last updated: <span id="current-date"></span></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Card</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-contant mt-5">
            <h5 class="text-left">Recent Uploads</h5>
            <div class="row mt-3">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sl. No</th>
                                <th scope="col">Subject Id</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>CA1601</td>
                                <td>Software Engineering</td>
                                <td>04/02/2024</td>
                                <td><a href="#">View</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>CA1603</td>
                                <td>Python Programming</td>
                                <td>04/02/2024</td>
                                <td><a href="#">View</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>CA1636</td>
                                <td>Data Analytics Using Python</td>
                                <td>04/02/2024</td>
                                <td><a href="#">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
