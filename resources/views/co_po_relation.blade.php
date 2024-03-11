@extends('layouts/main')
@section('title', 'co_po_relation')
@section('content')
    <style>
        input {

            /* padding-left: 0px; */
            /* display: flex;
                justify-content:space-around; */
        }

        /* th,td {
                    align-items: center;
                } */

        /* td:hover {
                    background-color: #c5c7c9;
                } */
    </style>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-8">
                                    <input type="search" name="" id="" placeholder="E.g. CA1603"
                                        class="form-control">
                                </div>
                                <div class="col-4 d-flex justify-content-center">
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
                                    <th>Subject-Name</th>
                                    <th>Subject-Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Python</td>
                                    <td>CA1603</td>
                                    <td>
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop"><i class="bi bi-eye-fill"></i></button>
                                        <button class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Software Engineering</td>
                                    <td>CA1601</td>
                                    <td>
                                        <button class="btn btn-primary"><i class="bi bi-eye-fill"></i></button>
                                        <button class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data Analytics Using Python</td>
                                    <td>CA1636</td>
                                    <td>
                                        <button class="btn btn-primary"><i class="bi bi-eye-fill"></i></button>
                                        <button class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="pagination d-flex justify-content-center pt-3">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        {{-- <h3 class="text-muted">PO Attainment</h3>
        <div class="card">
            <div class="card-body">
                <h4 class="text-muted py-2">CO/PO Relation</h4>
                <form action="#">
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
        </div> --}}
    </div>
    <div class="modal fade" id="staticBackdrop," data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
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
                        {{-- <div class="row d-flex justify-content-center">
                            <div class="col-4 d-flex justify-content-center">
                                <div class=" col-xl col-lg col-md col-5 mt-xl-0 mt-lg-0 mt-md-0 mt-3 m-auto ">
                                    <button type="submit" class="btn btn-primary w-100"
                                        id="myButton">Upload</button>
                                </div>
                            </div>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Upload</button>
                </div>
            </div>
            {{-- <div class="modal-dialog modal-dialog-centered">
            </div> --}}
        </div>
    </div>
@endsection
