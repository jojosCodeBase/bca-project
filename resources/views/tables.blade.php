@extends('layouts/main')
@section('title', 'Tables')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="mt-2 table-responsive" id="table">
                <table class="table table-bordered table-light">
                    <thead>
                        <th>Table</th>
                        <th>Type</th>
                    </thead>
                    <tbody>
                        @foreach ($tables as $t)
                            <tr>
                                <td>{{ $t ->Tables_in_result }}</td>
                                <td>{{ $t->Table_type }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
