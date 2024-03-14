@extends('layouts/main')
@section('title', 'Fetch')
@section('breadcrumb', 'Menu / Fetch')
@section('content')
    {{-- <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('fetch-data') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row pb-4 px-3">
                        <h4 class="py-3 text-muted">Fetch Data</h4>
                        <div class="col-xl-4 col-lg-5 col-md-5 col-6 mt-1 mb-1">
                            <select name="year" id="years" class="form-select" required>
                                <option selected disabled value="">Select Year</option>
                                <option value="2024">2024</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select year
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-5 col-6 mt-1 mb-1">
                            <select name="cid" id="courseid" class="form-select" required>
                                <option disabled selected value="">Select a Course</option>
                                @foreach ($courses as $c)
                                    <option value="{{ $c['cid'] }}">{{ $c['cname'] }} ({{ $c['cid'] }})</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select course
                            </div>
                        </div>
                        <div class="col-2 my-1">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (session('data'))
            <div class="mt-2 table-responsive" id="table">
                <table class="table table-bordered text-center table-light">
                    <thead>
                        <th>Regno</th>
                        <th>Course ID</th>
                        <th>Name</th>
                        <th>Quiz 1</th>
                        <th>Sessional 1 (15)</th>
                        <th>Sessional 1 (50)</th>
                        <th>Quiz 2</th>
                        <th>Sessional 2 (15)</th>
                        <th>Sessional 2 (50)</th>
                        <th>Assignment</th>
                        <th>Attendance</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        @foreach (session('data') as $row)
                            <tr>
                                <td>{{ $row['regno'] }}</td>
                                <td>{{ $row['cid'] }}</td>
                                <td>{{ $row['name'] }}</td>
                                <td>{{ $row['q1'] }}</td>
                                <td>{{ $row['s1_50'] }}</td>
                                <td>{{ $row['s1_15'] }}</td>
                                <td>{{ $row['q2'] }}</td>
                                <td>{{ $row['s2_15'] }}</td>
                                <td>{{ $row['s2_50'] }}</td>
                                <td>{{ $row['assignment'] }}</td>
                                <td>{{ $row['attendance'] }}</td>
                                <td>{{ $row['total'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div> --}}
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
                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
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

                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                            <select name="course" id="course" class="form-select" required>
                                <option selected disabled value="">Select course</option>
                                <option value="bca">BCA</option>
                                <option value="mca">MCA</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Course
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                            <select name="year" id="years" class="form-select" required>
                                <option selected disabled value="">Select year</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Year
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                            <select name="semester" id="semester" class="form-select" required>
                                <option selected disabled value="" disabled>Select semester</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Semester
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-3 col-md-3 col-3 my-3">
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
