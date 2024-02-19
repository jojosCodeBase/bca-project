@extends('layouts/main')
@section('content')
    <div class="container-fluid">
        <div class="row bg-light">
            <div class="col-12 text-center fs-4">Analysis Data</div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-1 mb-1">
                <select name="Year" id="years" class="form-select">
                    <option value="#">Select Year</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-1 mb-1">
                <select name="branch" id="brance" class="form-select">
                    <option value="branch">Select a Branch</option>
                    <option value="BCA">BCA</option>
                    <option value="MCA">MCA</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-1 mb-1">
                <select name="semester" id="semester" class="form-select">
                    <option value="Semester">Select a Semester</option>
                    <option value="Even">Even</option>
                    <option value="Odd">Odd</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-1 mb-1">
                <select name="Course" id="courseid" class="form-select">
                    <option value="#">Select a Course Id</option>
                    <option value="CA1601">CA1601</option>
                    <option value="CA1603">CA1603</option>
                    <option value="CA1636">CA1636</option>
                    <option value="CA1637">CA1637</option>
                </select>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" onclick="show()">Submit</button>
                </div>
            </div>
        </div>
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
