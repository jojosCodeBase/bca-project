@extends('layouts/main')
@section('title', 'CO-PO Relation')
@section('breadcrumb', 'Menu/CO-PO Relation')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center mt-xl-0 mt-3">
            <div class="col-xl-6 col-12">
                <div class="card">
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
                            <tbody>
                                @foreach ($courses as $c)
                                    <tr>
                                        <td class="courseId" data-course-id="{{ $c['cid'] }}">{{ $c['cid'] }}</td>
                                        <td>{{ $c['cname'] }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary me-xl-2 mb-2 mb-xl-0 modelViewBtn"
                                                data-bs-toggle="modal" data-bs-target="#viewCOPOModal"><i
                                                    class="bi bi-eye-fill"></i></button>
                                            <button class="btn btn-warning " data-bs-toggle="modal"
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View CO/PO Relation Level</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('include/co_po_relation_table')
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
                <div class="modal-body">
                    <table class="table table-bordered border-dark bg-secondary bg-opacity-25">
                        <thead>
                            <tr>
                                <th class="" style="width: 5px;">CA1601</th>
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
                        <tbody class="custom-width">
                            <tr>
                                <th class="">CO1</th>
                                <td class="text-center"><input type="text" name="co1_po1" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po2" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po3" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po4" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po5" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po6" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po7" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po8" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po9" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po10" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po11" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co1_po12" class="#" onkeypress="return restrictInput(event)"></td>
                            </tr>

                            <tr>
                                <th class="">CO2</th>
                                <td class="text-center"><input type="text" name="co2_po1" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po2" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po3" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po4" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po5" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po6" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po7" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po8" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po9" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po10" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po11" class="#"onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co2_po12" class="#"onkeypress="return restrictInput(event)"></td>
                            </tr>

                            <tr>
                                <th class="">CO3</th>
                                <td class="text-center"><input type="text" name="co3_po1" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po2" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po3" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po4" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po5" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po6" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po7" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po8" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po9" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po10" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po11" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co3_po12" class="#" onkeypress="return restrictInput(event)"></td>
                            </tr>

                            <tr>
                                <th class="">CO4</th>
                                <td class="text-center"><input type="text" name="co4_po1" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po2" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po3" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po4" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po5" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po6" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po7" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po8" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po9" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po10" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po11" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co4_po12" class="#" onkeypress="return restrictInput(event)"></td>
                            </tr>

                            <tr>
                                <th class="">CO5</th>
                                <td class="text-center"><input type="text" name="co5_po1" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po2" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po3" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po4" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po5" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po6" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po7" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po8" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po9" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po10" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po11" class="#" onkeypress="return restrictInput(event)"></td>
                                <td class="text-center"><input type="text" name="co5_po12" class="#" onkeypress="return restrictInput(event)"></td>
                            </tr>

                            {{-- <tr>
                                <th class="">Average CO</th>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                            </tr> --}}

                            {{-- <tr>
                                <th class="">CO Attainment</th>
                                <td class="text-center" colspan="12">1</td>
                            </tr> --}}

                            {{-- <tr>
                                <th class="">PO Attainment</th>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <p class=text-danger>Note : If there is no relation between CO & PO then leave the box empty. </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
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
                data: json,
                success: function(response) {
                    console.log(response());
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching details:', error);
                }
            });
        });
    </script>
@endsection
