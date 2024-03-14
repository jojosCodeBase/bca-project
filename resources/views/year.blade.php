@extends('layouts.main')
@section('title', 'Yearly')
@section('breadcrumb', 'Analysis / Year Wise')
@section('content')
    <div class="container-fluid">
        <div class="row bg-light">
            <div class="col-12 text-center fs-4">Analysis Data</div>
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
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-12 d-flex justify-content-center">
            <input type="submit" name="#" id="#" class="btn btn-primary ">
        </div>
    </div>
    <div class="row ">
        <div class="col d-flex justify-content-center card">
            <div style="width: 80%; margin: 0 auto;">
                <!-- Canvas element for the chart -->
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function generateYears(count) {
            const currentYear = new Date().getFullYear();
            const years = [];
            for (let i = 0; i < count; i++) {
                years.push(currentYear - count + 1 + i);
            }
            return years;
        }

        // Generate labels for 11 years
        const labels = generateYears(11);

        // Data configuration
        const data = {
            labels: labels,
            datasets: [{
                label: 'Yearly CO/PO Attainment',
                data: [65, 59, 80, 81, 56, 55, 40, 57, 45, 75, 68, /* Add your data for 11 years here */ ],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };

        const ctx = document.getElementById('myChart').getContext('2d');

        // Create the chart
        const myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
