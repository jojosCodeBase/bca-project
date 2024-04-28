@extends('layouts.main')
@section('title', 'MCA Report')
@section('breadcrumb', 'MCA Report')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h4 class="py-2 text-custom">MCA Report</h4>
                    {{-- <div class="col-xl-2 col-lg-3 col-md-3 col-6 mt-1">
                        <select name="Year" id="years" class="form-select">
                            <option value="#">Select year</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div> --}}
                    {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-1">
                        <select name="branch" id="brance" class="form-select">
                            <option value="branch">Select a course</option>
                            <option value="BCA">BCA</option>
                            <option value="MCA">MCA</option>
                        </select>
                    </div> --}}
                    {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-1">
                        <select name="branch" id="brance" class="form-select">
                            <option value="branch">Select a semester</option>
                            <option value="odd">Odd</option>
                            <option value="even">Even</option>
                        </select>
                    </div> --}}
                    <div class="col-xl-5 col-lg-3 col-md-3 col-6 mt-1">
                        <select name="Course" id="courseid" class="form-select">
                            <option value="#">Select Subject Id</option>
                            <option value="CA1601">CA1601</option>
                            <option value="CA1603">CA1603</option>
                            <option value="CA1636">CA1636</option>
                            <option value="CA1637">CA1637</option>
                        </select>
                    </div>
                    <div class="col-xl-5 col-lg-3 col-md-3 col-6 mt-1">
                        <select name="Course" id="courseid" class="form-select">
                            <option value="#">Select Subject Name</option>
                            <option value="">Python</option>
                            <option value="">Software Engineering</option>
                            <option value="">Data Analytics</option>
                            <option value="">Security</option>
                        </select>
                    </div>
                    <div class="col-xl-2 d-flex">
                        <input type="submit" name="#" id="#" value="Fetch" class="btn btn-primary ">
                    </div>
                </div>
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
        const labels = generateYears(10);

        // Data configuration
        const data = {
            labels: labels,
            datasets: [{
                label: 'Subject Report',
                data: [1.5,2.1,1.8,2.1,1.9,2.6,1.5,1.8,2.5,1.0/* Add your data for 11 years here */ ],
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
            // options: {
            //     scales: {
            //         // y: {
            //         //     beginAtZero: true
            //         // }
            //         y: {
            //             min: 0,
            //             max: 10,
            //             stepSize: 0.5
            //         }
            //     }
            // }
            options: {
                scales: {
                    y: {
                        min: 1,
                        max: 3,
                        ticks: {
                            stepSize: 0.1
                        }
                    }
                }
            }
        });
    </script>
@endsection
