@extends('layouts/main')
@section('title', 'Manage-Faculty')
@section('breadcrumb', 'Faculty / Manage Faculty')
@section('content')
    <div class="container">
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
        <div class="card mt-3 mt-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-6 ">
                        <h4 class="text-muted">List of Faculty</h4>
                    </div>
                    <div class="col-xl-7 col-12 order-3 order-xl-0 mt-3 mt-xl-0">
                        <div class="row d-flex justify-content-xl-end">
                            <div class="col-xl-6 col-10 pe-0">
                                <input type="search" name="" id="" placeholder="Search by id or name"
                                    class="form-control">
                            </div>
                            <div class="col-xl-1 col-2">
                                <div class="btn-color">
                                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-6 d-flex justify-content-end justify-content-xl-start">
                        <button class="btn btn-success"data-bs-toggle="modal" data-bs-target="#addModal"></i>Add Faculty +
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover my-4">
                        <thead>
                            <tr>
                                <th>Sl.No.</th>
                                <th>Faculty ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($faculty as $f)
                                <tr>
                                    <td>1</td>
                                    <td class="facultyId">{{ $f['regno'] }}</td>
                                    <td>{{ $f['name'] }}</td>
                                    <td>{{ $f['email'] }}</td>
                                    <td>
                                        <div class="more-btn">
                                            <button class="dropdown" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-three-dots fs-4"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button class="dropdown-item facultyViewButton" id="viewFacultyBtn"
                                                        type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#facultyViewModal">View</button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item facultyEditButton" type="button"
                                                        id="editFacultyBtn" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#facultyEditModal">Edit</button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item facultyDeleteButton" id="deleteFacultyBtn"
                                                        type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#facultyDeleteModal">Delete</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- faculty-view modal start --}}
    <div class="modal fade" id="facultyViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Faculty Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-2 fw-bold">Faculty Id</div>
                            <div class="mb-2 fw-bold">Faculty Name</div>
                            <div class="mb-2 fw-bold">Email</div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2" id="faculty-view-id"></div>
                            <div class="mb-2" id="faculty-view-name"></div>
                            <div class="mb-2" id="faculty-view-email"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- faculty-view modal end --}}

    {{-- faculty-Edit modal start --}}
    <div class="modal fade" id="facultyEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Faculty Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="">
                            <div class="col">
                                <label for="" class="form-label">Faculty Id</label>
                                <input type="text" id="faculty-edit-id" class="form-control">
                            </div>
                            <div class="col mt-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" id="faculty-edit-name" class="form-control">
                            </div>
                            <div class="col mt-2">
                                <label for="" class="form-label">Email</label>
                                <input type="text" id="faculty-edit-email" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- faculty-Edit modal end --}}

    {{-- faculty-Delete modal start --}}
    <div class="modal fade" id="facultyDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-6 d-flex justify-content-center">
                            <i class="rounded-circle bi bi-exclamation-triangle-fill text-warning fs-1"></i>
                        </div>
                    </div>

                    <h4 class="text-center text-muted">Delete Faculty</h4>
                    <p class="text-danger text-center">Are you sure you want to delete this faculty? <br>This action cannot
                        be undone !
                    </p>

                    <div class="row d-flex justify-content-center">
                        <div class="col-8   d-flex justify-content-center">
                            <button class="btn btn-secondary me-5" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-danger">Yes, Delete !</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- faculty-Delete modal end --}}

    {{-- Add-faculty modal start --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Faculty</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('add-faculty') }}" method="POST">
                            @csrf
                            <div class="col mb-2">
                                <label for="" class="form-label">Faculty Id
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="id" class="form-control" request>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label for="" class="form-label">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" class="form-control" request>
                            </div>
                            <div class="col mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="text" name="password" value="cadept@1234"
                                    class="form-control text-muted" readonly>
                            </div>
                            <p class="text-danger">Note: The above given is the default password for the newly created
                                faculty which can be changed by the faculty from their profile section.</p>
                            <button type="submit" class="btn btn-primary w-100">Add</button>
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Add-faculty modal end --}}
@endsection
