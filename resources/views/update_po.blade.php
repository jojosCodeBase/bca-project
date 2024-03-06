@extends('layouts/main')
@section('title', 'update_po')
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

        .hidden {
            display: none;
        }
    </style>
    <div class="container">
        <h3 class="text-muted">PO Attainment</h3>
        <div class="card my-4">
            <div class="card-body">
                <form action="#" class="needs-validation" novalidate>
                    <div class="row">
                        <h4 class="py-3 text-muted">Upload Data</h4>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                            <select name="batch" id="batch" class="form-select" required>
                                <option selected disabled value="">Select batch</option>
                                <option value="">2019</option>
                                <option value="">2020</option>
                                <option value="">2021</option>
                                <option value="">2022</option>
                                <option value="">2023</option>
                                <option value="">2024</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Course
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                            <select name="year" id="course" class="form-select" required>
                                <option selected disabled value="">Select course</option>
                                <option value="bca">BCA</option>
                                <option value="mca">MCA</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Course
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                            <select name="year" id="years" class="form-select" required>
                                <option selected disabled value="">Select year</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Year
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                            <select name="year" id="semester" class="form-select" required>
                                <option selected disabled value="" disabled>Select semester</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Semester
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-3 my-3">
                            <select name="year" id="subjectId" class="form-select" required>
                                <option selected disabled value=""disabled>Select subject code</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Subject-Id
                            </div>
                        </div>

                        <div class="col-lg-7 col-xl-7 col-md-10 col-12 my-3">
                            <form action="{{ route('file-upload') }}" method="POST" enctype="multipart/form-data"
                                class="mx-3 was-validated">
                                @csrf
                                <div class=" col-xl-5 col-lg-5 col-md-5 col-5 mt-xl-0 mt-lg-0 mt-md-0 mt-3 m-auto ">
                                    <button type="submit" class="btn btn-primary w-100" id="myButton"
                                        onclick="toggleCard()">Find</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div id="show">
            <h3 class="text-muted my-3 hidden">PO Update Table</h3>
            <div class="card hidden" id="show1">
                <div class="card-body">
                    <h4 class="text-muted py-2">Update PO Attainment Level</h4>
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
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>

                                <tr>
                                    <th class="">CO Attainment</th>
                                    <td class="text-center" colspan="12">1</td>
                                </tr>

                                <tr>
                                    <th class="">PO Attainment</th>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row d-flex justify-content-center">
                            <div class="col-4 d-flex justify-content-center">
                                <div class=" col-xl col-lg col-md col-5 mt-xl-0 mt-lg-0 mt-md-0 mt-3 m-auto ">
                                    <button type="submit" class="btn btn-primary w-100" id="myButton">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
<script>
    // JavaScript function to show the card
    function showCard() {
      var show = document.getElementById("show1");
      show.classList.remove("hidden");
    }
  </script>