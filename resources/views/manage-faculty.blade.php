@extends('layouts/main')
@section('title', 'CO-PO Relation')
@section('content')

    <style>
        .dropdown-menu {
            background-color: #fff;
            /* Background color for the dropdown menu */
            border-color: #fff;
        }

        .more-btn .dropdown {
            box-shadow: none;
            border: none;
            background: transparent;
        }
    </style>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>List of Faculty</h3>
                <table class="table table-hover my-4">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Name</th>
                            <th>Reg.No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Bikram Das</td>
                            <td>202116057</td>
                            <td>
                                <div class="more-btn">
                                    <button class="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots fs-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item" type="button" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Kunsang Moktang</td>
                            <td>202116032</td>
                            <td>

                                <div class="more-btn">
                                    <button class="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots fs-4"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item" type="button" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- faculty-view modal start --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Faculty Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <span class="title fw-bold">
                                Name
                            </span>
                            <div>Bikram Das</div>
                        </div>
                        <div class="col-6">
                            <span class="title fw-bold">
                                Reg.No
                            </span>
                            <div>202116057</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- faculty-view modal end --}}
@endsection
