@extends('layouts/main')
@section('title', 'CO-PO Relation')
@section('breadcrumb', 'CO-PO Relation')
@section('content')
    <div class="container">
        @include('include/error-alert')
        <div class="row d-flex justify-content-center mt-xl-0 mt-3">
            <div class="col-xl-6 col-12">
                <div class="card pe-3">
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-10">
                                    <input type="search" name="" id="" placeholder="E.g. CA1603"
                                        class="form-control">
                                </div>
                                <div class="col-2 d-flex justify-content-center">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-body">
                        <table class="table table-hover table-bordered border-dark">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- @dump($relation) --}}
                            <tbody>
                                @foreach ($courses as $c)
                                    <tr>
                                        <td class="courseId" data-course-id="{{ $c['cid'] }}">{{ $c['cid'] }}</td>
                                        <td>{{ $c['cname'] }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary me-xl-2 mb-2 mb-xl-0 modelViewBtn"
                                                data-bs-toggle="modal" data-bs-target="#viewCOPOModal"><i
                                                    class="bi bi-eye-fill"></i></button>
                                            <button class="btn btn-warning coPoUpdateBtn" data-bs-toggle="modal"
                                                data-bs-target="#updateCOPOModal"><i class="bi bi-pencil-fill"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- View CO/PO Modal Start --}}
    <div class="modal fade" id="viewCOPOModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View CO/PO Relation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered border-dark bg-secondary bg-opacity-25">
                        <thead>
                            <tr>
                                <th class="" style="width: 5px;">CA2313</th>
                                <th class="text-center">PO1</th>
                                <th class="text-center">PO2</th>
                                <th class="text-center">PO3</th>
                                <th class="text-center">PO4</th>
                                <th class="text-center">PO5</th>
                                <th class="text-center">PO6</th>
                                <th class="text-center">PO7</th>
                                <th class="text-center">PO8</th>
                                <th class="text-center">PO9</th>
                                <th class="text-center">PO10</th>
                                <th class="text-center">PO11</th>
                                <th class="text-center">PO12</th>
                            </tr>
                        </thead>
                        <tbody class="custom-width coPoRelation">
                        </tbody>
                    </table>
                    {{-- @foreach ($relation as $r)
                        <tr>
                            <th class="">{{ $r['CO'] }}</th>
                            <td class="text-center">{{ $r['PO1'] }}</td>
                            <td class="text-center">{{ $r['PO2'] }}</td>
                            <td class="text-center">{{ $r['PO3'] }}</td>
                            <td class="text-center">{{ $r['PO4'] }}</td>
                            <td class="text-center">{{ $r['PO5'] }}</td>
                            <td class="text-center">{{ $r['PO6'] }}</td>
                            <td class="text-center">{{ $r['PO7'] }}</td>
                            <td class="text-center">{{ $r['PO8'] }}</td>
                            <td class="text-center">{{ $r['PO9'] }}</td>
                            <td class="text-center">{{ $r['PO10'] }}</td>
                            <td class="text-center">{{ $r['PO11'] }}</td>
                            <td class="text-center">{{ $r['PO12'] }}</td>
                        </tr>
                    @endforeach --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- View CO/PO Modal Start --}}

    {{-- Update CO/PO Modal Start --}}
    <div class="modal fade" id="updateCOPOModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload CO/PO Relation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update-co-po-relation') }}" method="POST">
                    @csrf
                    <input type="text" name="courseId" id="updateCourseId" hidden>
                    {{-- <input type="text" name="batch" id="updateBatch" hidden> --}}
                    <div class="modal-body">
                        <table class="table table-bordered border-dark bg-secondary bg-opacity-25">
                            <thead>
                                <tr class="text-center">
                                    <th class="" style="width: 5px;">CA2313</th>
                                    <th>PO1</th>
                                    <th>PO2</th>
                                    <th>PO3</th>
                                    <th>PO4</th>
                                    <th>PO5</th>
                                    <th>PO6</th>
                                    <th>PO7</th>
                                    <th>PO8</th>
                                    <th>PO9</th>
                                    <th>PO10</th>
                                    <th>PO11</th>
                                    <th>PO12</th>
                                </tr>
                            </thead>
                            <tbody class="custom-width"></tbody>
                        </table>
                        <p style="color:red;">Note : If there is no relation between CO & PO then leave the box empty.<br> Allowed inputs:  1, 2, 3 </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Update CO/PO Modal End --}}
@endsection
@section('scripts')
    <script>
        $('.modelViewBtn').click(function() {
            var courseId = $(this).closest('tr').find('.courseId').data('course-id');
            $.ajax({
                url: "/get_CO_PO_Relation/" + courseId,
                type: 'GET',
                dataType: "json",
                success: function(response) {
                    $('.custom-width').empty();

                    // Iterate through the response data and add rows to the table
                    $.each(response, function(index, item) {
                        var row = $('<tr>');
                        row.append($('<th>').text(item['CO'])); // Add Course ID cell

                        // Add PO cells
                        for (var i = 1; i <= 12; i++) {
                            var poValue = item['PO' + i] ||
                                ''; // Get PO value or empty string if null
                            row.append($('<td>').addClass('text-center').text(poValue));
                        }

                        // Append the row to the table body
                        $('.custom-width').append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching details:', error);
                }
            });
        });

        $('.coPoUpdateBtn').click(function() {
            var courseId = $(this).closest('tr').find('.courseId').data('course-id');
            $.ajax({
                url: "/get_CO_PO_Relation/" + courseId,
                type: 'GET',
                dataType: "json",
                success: function(response) {
                    if(response === "notfound"){
                        $('.custom-width').empty();
                        $('#updateCourseId').val(courseId);
                        var co_array = ['CO1', 'CO2', 'CO3', 'CO4', 'CO5'];
                        $.each(co_array, function(index, item) {
                            // Create a new row for each CO-PO relation
                            var row = $('<tr>');

                            // Add CO cell
                            row.append($('<th>').addClass('text-center').text(co_array[index]));

                            // Add input fields for POs
                            for (var i = 1; i <= 12; i++) {
                                var inputField = $('<input>').attr({
                                    type: 'text',
                                    name: co_array[index] + '[PO' + i + ']',
                                    class: 'text-center',
                                    // value: item['PO' + i],
                                    // Populate the 'value' attribute with the fetched data
                                    onkeypress: 'return restrictInput(event)'
                                });
                                var td = $('<td>').addClass('text-center').append(inputField);
                                row.append(td);
                            }

                            // Append the row to the table body
                            $('.custom-width').append(row);
                        });
                    }else{
                        $('.custom-width').empty();
                        $('#updateCourseId').val(response[0]['cid'])
                        $.each(response, function(index, item) {
                            // Create a new row for each CO-PO relation
                            var row = $('<tr>');

                            // Add CO cell
                            row.append($('<th>').addClass('text-center').text(item.CO));

                            // Add input fields for POs
                            for (var i = 1; i <= 12; i++) {
                                var inputField = $('<input>').attr({
                                    type: 'text',
                                    name: item.CO + '[PO' + i + ']',
                                    class: 'text-center',
                                    value: item['PO' +
                                        i
                                    ], // Populate the 'value' attribute with the fetched data
                                    onkeypress: 'return restrictInput(event)'
                                });
                                var td = $('<td>').addClass('text-center').append(inputField);
                                row.append(td);
                            }

                            // Append the row to the table body
                            $('.custom-width').append(row);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching details:', error);
                }
            });
        });
    </script>
@endsection
