@extends('layouts/main')
@section('title', 'Admin Dashboard')
@section('breadcrumb', 'Dashboard')
@section('content')
    <main class="content">
        <div class="mb-3">
            <h5>Test Page</h5>
        </div>
        <div class="bg-light mt-2">
            <div class="row p-3 mt-3">
                <div class="mb-1">
                    <h5>Last Uploaded </h5>
                </div>
                <div class="col">
                    <div>
                        <a href="{{ route('export-table') }}">
                            <button class="btn btn-primary">Export</button>
                        </a>
                    </div>
                    <div class="table-content">
                        <div class="data-table">
                                @include('include/table-style')
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
