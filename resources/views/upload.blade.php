@extends('layouts/main')
@section('title', 'Upload')
@section('content')
    <div class="container flex-grow-1">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="#"  class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                                <select name="year" id="course" class="form-select" required>
                                    <option selected disabled value="">Select Course</option>
                                    <option value="bca">BCA</option>
                                    <option value="mca">MCA</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select Course
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                                <select name="year" id="years" class="form-select" required>
                                    <option selected disabled value="">Select Year</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select Year
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                                <select name="year" id="semester" class="form-select" required>
                                    <option selected disabled value="" disabled>Select Semester</option>

                                </select>
                                <div class="invalid-feedback">
                                    Please select Semester
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                                <select name="year" id="subjectId" class="form-select" required>
                                    <option selected disabled value=""disabled>Select Subject-ID</option>

                                </select>
                                <div class="invalid-feedback">
                                    Please select year
                                </div>
                            </div>

                            <div class="col-lg-7 col-xl-7 col-md-10 col-12 my-4 ">
                                <form action="{{ route('file-upload') }}" method="POST" enctype="multipart/form-data"
                                    class="mx-3 was-validated" >
                                    @csrf
                                    <div class="row">
                                        <div class=" col-xl-9 col-lg-9 col-md-9 col-12">
                                            <input type="file" name="file" id="file" class="form-control" aria-label="file example" required>
                                            <span class="text-danger" id="file-error"></span>
                                            <div class="invalid-feedback">
                                                Please Choose a file
                                            </div>
                                        </div>
                                        <div class=" col-xl-3 col-lg-3 col-md-3 col-5 mt-xl-0 mt-lg-0 mt-md-0 mt-3 m-auto ">
                                            <button type="submit" class="btn btn-primary w-100"
                                                id="myButton">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-center mt-5">
            <div class="col-lg-7 col-xl-7 col-md-10 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('file-upload') }}" method="POST" enctype="multipart/form-data"
                            class="mx-3">
                            @csrf
                            <div class="row">
                                <div class=" col-xl-9 col-lg-9 col-md-9 col-12">
                                    <input type="file" name="file" id="file" class="form-control">
                                    <span class="text-danger" id="file-error"></span>
                                </div>
                                <div class=" col-xl-3 col-lg-3 col-md-3 col-5 mt-xl-0 mt-lg-0 mt-md-0 mt-3 m-auto ">
                                    <button type="submit" class="btn btn-primary w-100" id="myButton">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
