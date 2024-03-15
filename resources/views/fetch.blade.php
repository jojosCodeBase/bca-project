@extends('layouts/main')
@section('title', 'Fetch')
@section('breadcrumb', 'Menu / Fetch')
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
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin-fetch-data') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <h4 class="py-3 text-muted">Fetch Data</h4>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-12 my-3">
                            <select name="batch" id="batch" class="form-select" required>
                                <option selected disabled value="">Select batch</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Course
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-12 my-3">
                            <select name="course" id="course" class="form-select" required>
                                <option selected disabled value="">Select course</option>
                                <option value="bca">BCA</option>
                                <option value="mca">MCA</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Course
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-12 my-3">
                            <select name="year" id="years" class="form-select" required>
                                <option selected disabled value="">Select year</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Year
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-12 my-3">
                            <select name="semester" id="semester" class="form-select" required>
                                <option selected disabled value="" disabled>Select semester</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Semester
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-3 col-md-3 col-12 my-3">
                            <select name="subject" id="subjectId" class="form-select" required>
                                <option selected disabled value=""disabled>Select subject</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select subject
                            </div>
                        </div>

                        <div class=" col-xl-2 col-lg-3 col-md-3 col-5 my-3">
                            <button type="submit" class="btn btn-primary w-100" id="myButton">Fetch</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
