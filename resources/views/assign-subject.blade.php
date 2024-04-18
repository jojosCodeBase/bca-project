@extends('layouts/main')
@section('title', 'Assign Subjects')
@section('breadcrumb', 'Assign Subjects')
@section('content')
    <div class="container">
        @include('include/error-alert')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-6">
                        <h4 class="text-custom">Assign Subjects</h4>
                    </div>
                    <div class="col-xl-7 mt-3 mt-xl-0">
                        <div class="row d-flex justify-content-xl-end">
                            <div class="col-xl-6 col-10 pe-0">
                                <input type="search" name="" id="" placeholder="Search Faculty"
                                    class="form-control">
                            </div>
                            <div class="col-xl-4 col-3">
                                <div class="btn-color">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#assignSubjectModal">Assign subject<i
                                            class="bi bi-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-muted mt-4">List Of Faculty</h5>

                    <div class="table-responsive">
                        <table class="table table-striped my-4">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Faculty Name</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($facultyDropdown as $key => $fd)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $key }}</td>
                                        <td>
                                            <select name="" id="" class="form-select">
                                                @foreach($fd as $subject)
                                                    <option value="">{{ $subject }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary" type="button"><i class="bi bi-pencil-fill"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- assign subject modal start --}}
        <div class="modal fade" id="assignSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Assign Subject</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="{{ route('assign-subject') }}" method="POST">
                                @csrf
                                <div class="col">
                                    <label for="subject-name" class="form-label">Subject Name</label>
                                    <select id="subject-name" name="subject" class="selectpicker form-control"
                                        data-live-search="true">
                                        <option value="" selected disabled>Select subject from list</option>
                                        @foreach ($courses as $c)
                                            <option value="{{ $c['cid'] }}">{{ $c['cid'] }} - {{ $c['cname'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col mt-2">
                                    <label for="faculty-name" class="form-label">Faculty</label>
                                    <select id="faculty-name" name="faculty" class="selectpicker form-control"
                                        data-live-search="true">
                                        <option value="" selected disabled>Select faculty from list</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty['id'] }}">{{ $faculty['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col mt-2">
                                    <label for="course" class="form-label">Course</label>
                                    <select id="course" name="course" class="form-select">
                                        <option value="" selected disabled>Select course from list</option>
                                        <option value="bca">BCA</option>
                                        <option value="mca">MCA</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col mt-2">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select id="semester" name="semester" class="form-select">
                                        <option value="" selected disabled>Select semester from list</option>
                                        <option value="first">First</option>
                                        <option value="second">Second</option>
                                        <option value="third">Third</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- assign subject modal end --}}

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
    </div>
@endsection
