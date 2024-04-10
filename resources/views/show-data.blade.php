@extends('layouts.main')
@section('title', 'Calculated Data')
@section('content')
    <div class="container-fluid">
        <h5>Attainment</h5>
        <div class="row mt-3">
            <div class="col-auto">
                <a href="{{ route('co.attainment', ['cid' => $subjectCode, 'batch' => $batch]) }}" class="btn btn-primary">CO Attainment</a>
            </div>
            <div class="col-auto">
                <a href="{{ route('final.co.attainment', ['cid' => $subjectCode, 'batch' => $batch]) }}" class="btn btn-primary">Final CO Attainment</a>
            </div>
            <div class="col-auto">
                <a href="{{ route('po.attainment', ['cid' => $subjectCode, 'batch' => $batch]) }}" class="btn btn-primary">PO Attainment</a>
            </div>
        </div>
    </div>
@endsection
