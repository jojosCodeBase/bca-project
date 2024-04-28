@extends('layouts.main')
@section('title', 'BCA Report')
@section('breadcrumb', 'BCA Report')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="" class="needs-validation" novalidate>
                    <div class="row">
                        <h4 class="py-2 text-custom">BCA Report</h4>
                        <div class="col-xl-5 col-lg-3 col-md-3 col-6">
                            <select name="Course" id="courseid" class="form-select" required>
                                <option selected disabled value="">Select Subject from list</option>
                                <option value="CA1601">CA1601-Softwaew Engineering</option>
                                <option value="CA1603">CA1603-Python</option>
                                <option value="CA1636">CA1636-Data Analytics</option>
                                <option value="CA1637">CA1637-Security&Privacy</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Batch
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <button type="submit" class="btn btn-primary">Fetch</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="row ">
                    <div class="col d-flex justify-content-center">
                        <div style="width: 80%; margin: 0 auto;">
                            <!-- Canvas element for the chart -->
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
