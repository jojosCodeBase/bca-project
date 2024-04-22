@extends('layouts/main')
@section('title', 'Direct Attainment')
@section('breadcrumb', 'Direct Attainment')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="text-custom">Direct Attainment</h4>
                <form action="" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 my-3">
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
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 my-3">
                            <select name="course" id="course" class="form-select" required>
                                <option selected disabled value="">Select course</option>
                                <option value="BCA">BCA</option>
                                <option value="MCA">MCA</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Course
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 my-3">
                            <a href={{route('direct-po-attainment')}}>
                            <button type="submit" class="btn btn-primary w-50 w-md-100" id="myButton">Submit
                            </button>
                        </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
