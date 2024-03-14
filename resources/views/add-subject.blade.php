@extends('layouts/main')
@section('title', 'Add Subject')
@section('breadcrumb', 'Courses / Add Subject')
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
        <div class="card">
            <div class="card-body">
                <form action="{{ route('add-subject') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row pb-4 px-3">
                        <h4 class="py-3 text-muted">Add Subject</h4>
                        <div class="col-xl-4 col-lg-5 col-md-5 col-6 mt-1 mb-1">
                            <label class="form-label">Subject Code</label>
                            <input type="text" class="form-control" name="cid" placeholder="E.g. CA1603" required>
                            <div class="invalid-feedback">
                                Please select year
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-5 col-6 mt-1 mb-1">
                            <label class="form-label">Subject Name</label>
                            <input type="text" class="form-control" name="cname" placeholder="E.g. Software Engineering" required>
                            <div class="invalid-feedback">
                                Please select course
                            </div>
                        </div>
                        <div class="col my-1 d-flex align-items-end">
                            <input type="submit" class="btn btn-primary w-50" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- @if (session('data'))
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
        @endif --}}
    </div>
@endsection
