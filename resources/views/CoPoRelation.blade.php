@extends('layouts/main')
@section('title', 'CoPoRelation')
@section('content')
    <style>
        input {
            max-width: 50px;
            /* padding-left: 0px; */
            /* display: flex;
                            justify-content:space-around; */
        }

        th {
            align-items: center;
        }

        td:hover {
            background-color: #c5c7c9;
        }
    </style>
    <div class="container">
        <h3 class="text-muted">PO Attainment</h3>
        <div class="card">
            <div class="card-body">
                <h4 class="text-muted py-2">Upload PO Attainment Level</h4>
                <form action="#">
                    <table class="table table-bordered border-dark bg-secondary bg-opacity-25">
                        <thead>
                            <tr>
                                <th class="bg-danger" style="width: 5px;">CA1601</th>
                                <th class="bg-warning text-center">PO1</th>
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
                        <tbody>
                            <tr>
                                <th class="">CO1</th>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                            </tr>

                            <tr>
                                <th class="">CO2</th>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                            </tr>

                            <tr>
                                <th class="">CO3</th>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                            </tr>

                            <tr>
                                <th class="">CO3</th>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                            </tr>

                            <tr>
                                <th class="">CO5</th>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                                <td class="text-center"><input type="text" class="#"></td>
                            </tr>

                            <tr>
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
                            </tr>

                            <tr>
                                <th class="">CO Attainment</th>
                                <td class="text-center" colspan="12">1</td>
                            </tr>

                            <tr>
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
                            </tr>
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center">
                        <div class="col-4 d-flex justify-content-center">
                            <div class=" col-xl col-lg col-md col-5 mt-xl-0 mt-lg-0 mt-md-0 mt-3 m-auto ">
                                <button type="submit" class="btn btn-primary w-100"
                                    id="myButton">Upload</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
