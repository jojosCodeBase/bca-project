@extends('layouts.main')
@section('title', 'Subject Report')
@section('breadcrumb', 'Subject Report')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="" id="reportForm" class="needs-validation" novalidate>
                <div class="row">
                    <h4 class="py-2 text-custom">Subject Report</h4>
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12">
                        <select name="course" id="course-select" class="form-select" required>
                            <option selected disabled value="">Select course</option>
                            <option value="BCA">BCA</option>
                            <option value="MCA">MCA</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select course
                        </div>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-10 col-12">
                        <select name="subjectId" class="form-control selectpicker border" id="subjectId"
                            data-live-search="true" required>
                            <option value="" selected disabled class="text-dark">Select subject</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select subject
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12">
                        <button type="submit" class="btn btn-primary w-50">Fetch</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-2" id="chartCard" style="display: none;">
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
    <script>
        // Chart Script for MCA/Bca Report Start
        function generateYears(count) {
            const currentYear = new Date().getFullYear();
            const years = [];
            for (let i = 0; i < count; i++) {
                years.push(currentYear - count + 1 + i);
            }
            return years;
        }

        // Generate labels for 5 years
        const labels = generateYears(5);

        // Data configuration
        const data = {
            labels: labels,
            datasets: [{
                label: 'PO Attainment',
                data: [1.5, 2.1, 1.8, 2.1, 1.9 /* Add your data for 5 years here */ ],
                fill: false,
                borderColor: '#355389',
                tension: 0.2
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
                        min: 1,
                        max: 3,
                        ticks: {
                            stepSize: 0.1
                        }
                    }
                }
            }
        });

        // Chart Script for MCA/BCA Report End

        $('#reportForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            const courseId = $('#subjectId').val();
            if(courseId === null){
                return;
                // alert('Please select course');
            }else{
                fetchSubjectData(courseId);
            }
        });

        function fetchSubjectData(courseId) {
            $.ajax({
                url: '/admin/getSubjectData/' + courseId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#chartCard').css('display', 'block');
                    updateChart(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching subject data:', error);
                }
            });
        }

        function updateChart(data) {
            // Assuming data is an array of numerical values
            myChart.data.datasets[0].data = data;
            myChart.update();
        }
    </script>
@endsection
