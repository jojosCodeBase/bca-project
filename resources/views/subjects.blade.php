@extends('layouts/main')
@section('title', 'Tables')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="text-muted">All Subjects</h4>
                <div class="mt-2 table-responsive" id="table">
                    <table class="table table-hover">
                        <thead>
                            <th>Sl.no</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($courses); $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $courses[$i]['cid'] }}</td>
                                    <td>{{ $courses[$i]['cname'] }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
