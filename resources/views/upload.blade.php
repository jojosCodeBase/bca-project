@extends('layouts.main')
@section('title', 'Upload')
@section('breadcrumb', 'Menu / Upload Data')
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

        <div class="card mt-xl-0 mt-3">
            <div class="card-body">
                <h4 class="text-muted">Upload Data</h4>
                <form action="{{ route('admin-file-upload') }}" method="POST" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-12 my-3">
                            <select name="batch" id="batch" class="form-select" required>
                                <option selected disabled value="">Select batch</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Batch
                            </div>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-12 col-md-3 col-12 my-3">
                            <select name="course" id="course" class="form-select" required>
                                <option selected disabled value="">Select course</option>
                                <option value="BCA">BCA</option>
                                <option value="MCA">MCA</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Course
                            </div>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-12 my-3">
                            <select name="year" id="year" class="form-select" required>
                                <option selected disabled value="">Select year</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                            </select>
                            {{-- <select name="year" id="year" class="form-select" required>
                                <option selected disabled value="">Select year</option>
                            </select> --}}
                            <div class="invalid-feedback">
                                Please select Year
                            </div>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-12 my-3">
                            {{-- <select name="semester" id="semester" class="form-select" required>
                                <option selected disabled value="" disabled>Select semester</option>
                            </select> --}}
                            <select name="semester" id="semester" class="form-select" required>
                                <option selected disabled value="" disabled>Select semester</option>
                                <option value="odd">Odd</option>
                                <option value="even">Even</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Semester
                            </div>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-12 my-3">
                            {{-- <select name="year" id="subjectId" class="form-select" required>
                                <option value="" selected disabled>Select subject code</option>
                            </select> --}}
                            <select name="subjectId" id="subjectId" class="form-select" required>
                                <option value="" selected disabled>Select subject code</option>
                                @foreach ($courses as $c)
                                    <option value="{{ $c['cid'] }}">{{ $c['cid'] }} - {{ $c['cname'] }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select Subject-Id
                            </div>
                        </div>

                        <div class="col-xxl-7 col-xl-7 col-lg-7  col-md-10 col-12 my-3">
                            <div class="row">
                                <div class=" col-xl-9 col-lg-9 col-md-9 col-12">
                                    <input type="file" name="file" id="file" class="form-control"
                                        aria-label="file example" required>
                                    <span class="text-danger" id="file-error"></span>
                                    <div class="invalid-feedback">
                                        Please Choose a file
                                    </div>
                                </div>
                                <div
                                    class=" col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-12 mt-xl-0 mt-lg-0 mt-md-0 mt-3 m-auto ">
                                    <button type="submit" class="btn btn-primary w-100" id="myButton">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
