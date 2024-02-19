@extends('layouts.main')
@section('title', 'Semester')
@section('content')
    <div class="container-fluid">
        <div class="row bg-light">
            <div class="col-12  text-center fs-4 my-4 fw-bold">Analysis Data</div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-1 mb-3">
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
            <div class="row mt-2 mb-3 mb-2">
                <div class="col-12 d-flex justify-content-center">
                    <input type="submit" name="#" id="#" class="btn btn-primary ">
                </div>
            </div>

        </div>
        <div class="row mt-2">
            <div class="col d-flex justify-content-center">
                <div id="piechart" style="width: 900px; height: 400px;"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['CO', 60],
                ['PO', 40]
            ]);

            var options = {
                title: 'CO/PO Attainment'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection
