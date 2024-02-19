@extends('layouts/main')
@section('content')
    <div class="container-fluid bg-light">
        <div class="text-center fs-3 my-4 pt-3">Analysis Data</div>
        <form class="needs-validation pb-5" novalidate>
            <div class="row pb-4 px-3 d-flex justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-5 col-6 mt-1 mb-1">
                    <select name="Year" id="years" class="form-select" required>
                        <option selected disabled value="">Select Year</option>
                        <option value="fgdfgd">2024 </option>
                    </select>
                    <div class="invalid-feedback">
                        Please select before submit.
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5 col-6 mt-1 mb-1">
                    <select name="Course" id="courseid" class="form-select" required>
                        <option selected disabled value="">Select a Course Id</option>
                        <option value="CA1601">CA1601</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select before submit.
                    </div>
                </div>
                <div class="col-2 my-1 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
        <div class="mt-2" style="display: none;" id="table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Subject Id</th>
                        <th>Subject Name</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>CA1601</td>
                        <td>Software Engineering</td>
                        <td>
                            <span id="current-date"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>CA1603</td>
                        <td>Python Programming</td>
                        <td>
                            <span id="current-date"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>CA1636</td>
                        <td>Data Analytics Using Ptyhon</td>
                        <td>
                            <span id="current-date"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
