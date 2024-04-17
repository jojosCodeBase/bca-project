@extends('layouts/main')
@section('title', 'Assign Subjects')
@section('breadcrumb', 'Assign Subjects')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-6">
                        <h4 class="text-muted">Assign Subjects</h4>
                    </div>
                    <div class="col-xl-7 mt-3 mt-xl-0">
                        <div class="row d-flex justify-content-xl-end">
                            <div class="col-xl-6 col-10 pe-0">
                                <input type="search" name="" id="" placeholder="Search Faculty"
                                    class="form-control">
                            </div>
                            <div class="col-xl-1 col-2">
                                <div class="btn-color">
                                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-muted mt-4">List Of Faculty</h5>

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
                                <tr>
                                    <td>1</td>
                                    <td>202116045</td>
                                    <td>Sujit Mardi</td>
                                    <td>sujitmardi45@gmail.com</td>
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
                                                        data-bs-target="#bcamodal">BCA</button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item facultyEditButton" type="button"
                                                        id="editFacultyBtn" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#mcamodal">MCA</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    {{-- faculty-Edit modal start --}}
    <div class="modal fade" id="bcamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


    @endsection
