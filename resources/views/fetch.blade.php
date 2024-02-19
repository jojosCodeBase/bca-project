@extends('layouts/main')
@section('title', 'Fetch')
@section('content')
    <div class="container-fluid">
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
                        @foreach ((session('data')) as $row)
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
    </div>
@endsection
