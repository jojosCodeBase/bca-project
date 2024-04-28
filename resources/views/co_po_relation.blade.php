@extends('layouts/main')
@section('title', 'CO-PO Relation')
@section('breadcrumb', 'CO-PO Relation')
@section('content')
    <div class="container-fluid">
        @include('include/error-alert')
        <div class="row d-flex justify-content-center mt-xl-0 mt-2">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 ">
                                <h4 class="text-custom">CO PO Relations</h4>
                            </div>
                            <div class="col-xl-8 col-12 order-3 order-xl-0 mt-3 mt-xl-0">
                                <div class="row d-flex justify-content-xl-end justify-content-center pe-xl-4">
                                    <div class="col-xl-6 col-11 pe-0">
                                        <div class="input-group">
                                            <input type="search" name="" id="co_po_search"
                                                placeholder="Search by id or name" class="form-control"><span
                                                class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="bg-custom text-light">
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="co_po_filter">
                                    @include('co_po_relation-table')
                                </tbody>
                            </table>
                        </div>
                        @if(!Auth::user()->is_faculty)
                            {{ $courses->links() }}
                        @endif
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
                    <h1 class="modal-title fs-5 text-custom" id="exampleModalLabel">View CO/PO Relation</h1>
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
                    <h1 class="modal-title fs-5 text-custom" id="exampleModalLabel">Upload CO/PO Relation</h1>
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
                        <p style="color:red;">Note : If there is no relation between CO & PO then leave the box empty.<br>
                            Allowed inputs: 1, 2, 3 </p>
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
                    const data = JSON.parse(response);

                    $('.custom-width').empty();

                    // Iterate through the response data and add rows to the table
                    $.each(data, function(header, item) {
                        var itemArray = JSON.parse(item)
                        var row = $('<tr>');
                        row.append($('<th>').text(header)); // Add Course ID cell

                        // Add PO cells
                        for (var i = 1; i <= 12; i++) {
                            var poValue = itemArray['PO' + i] ||
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
                    if (response === "notfound") {
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
                    } else {
                        $('.custom-width').empty(); // Clear existing content

                        const data = JSON.parse(response);

                        $('#updateCourseId').val(courseId); // Set the course ID value

                        // Iterate through the response data and add rows to the table
                        $.each(data, function(header, item) {
                            var itemArray = JSON.parse(item)

                            // Create a new row for each CO-PO relation
                            var row = $('<tr>');

                            // Add CO cell
                            row.append($('<th>').addClass('text-center').text(header));

                            // Add input fields for POs
                            for (var i = 1; i <= 12; i++) {
                                var inputField = $('<input>').attr({
                                    type: 'text',
                                    name: header + '[PO' + i + ']',
                                    class: 'text-center',
                                    value: itemArray['PO' +
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
