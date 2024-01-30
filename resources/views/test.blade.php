<!-- resources/views/excel/index.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Test Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <h2>Add CO</h2>
        <form action="">
            <div class="row">
                <div class="col-3">
                    {{-- <label for="" class="form-label">Test</label> --}}
                    <select name="" id="" class="form-select">
                        <option value="" selected>Select test from list</option>
                        <option value="">Quiz 1</option>
                        <option value="">Quiz 2</option>
                        <option value="">Sessional 1</option>
                        <option value="">Sessional 2</option>
                        <option value="">Assignment</option>
                        <option value="">End Semester</option>
                    </select>
                </div>
                {{-- <div class="col-2">
                    <label for="" class="form-label">Select </label>
                    <select name="" id="" class="form-select">
                        <option value="" selected>Select CO</option>
                        <option value="">CO1</option>
                        <option value="">CO2</option>
                        <option value="">CO3</option>
                        <option value="">CO4</option>
                        <option value="">CO5</option>
                    </select>
                </div> --}}
                <div class="col-2">
                    <button class="btn btn-primary">Add</button>
                </div>
            </div>
            <div class="row mt-4">
                <h4 class="text-center">Quiz 1</h4>
                <div class="col">
                    <table class="table table-bordered">
                        <thead>
                            <th>Subject</th>
                            <th>
                                <select name="" id="" class="form-select border-0">
                                    <option value="" selected>CO1</option>
                                    <option value="">CO2</option>
                                    <option value="">CO3</option>
                                    <option value="">CO4</option>
                                    <option value="">CO5</option>
                                </select>
                            </th>
                            <th>
                                <select name="" id="" class="form-select border-0">
                                    <option value="">CO1</option>
                                    <option value="" selected>CO2</option>
                                    <option value="">CO3</option>
                                    <option value="">CO4</option>
                                    <option value="">CO5</option>
                                </select>
                            </th>
                            <th>
                                <select name="" id="" class="form-select border-0">
                                    <option value="">CO1</option>
                                    <option value="">CO2</option>
                                    <option value="" selected>CO3</option>
                                    <option value="">CO4</option>
                                    <option value="">CO5</option>
                                </select>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CA1601</td>
                                <td><input type="text" name="" id="" value="2"
                                        class="form-control"></td>
                                <td><input type="text" name="" id="" value="2"
                                        class="form-control"></td>
                                <td><input type="text" name="" id="" value="1"
                                        class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <h4 class="text-center">Sessional 1</h4>
                <div class="col">
                    <table class="table table-bordered">
                        <thead>
                            <th>Subject</th>
                            <th>
                                <select name="" id="" class="form-select border-0">
                                    <option value="" selected>CO1</option>
                                    <option value="">CO2</option>
                                    <option value="">CO3</option>
                                    <option value="">CO4</option>
                                    <option value="">CO5</option>
                                </select>
                            </th>
                            <th>
                                <select name="" id="" class="form-select border-0">
                                    <option value="">CO1</option>
                                    <option value="" selected>CO2</option>
                                    <option value="">CO3</option>
                                    <option value="">CO4</option>
                                    <option value="">CO5</option>
                                </select>
                            </th>
                            <th>
                                <select name="" id="" class="form-select border-0">
                                    <option value="">CO1</option>
                                    <option value="">CO2</option>
                                    <option value="" selected>CO3</option>
                                    <option value="">CO4</option>
                                    <option value="">CO5</option>
                                </select>
                            </th>
                            <th>
                                <select name="" id="" class="form-select border-0">
                                    <option value="">CO1</option>
                                    <option value="" selected>CO2</option>
                                    <option value="">CO3</option>
                                    <option value="">CO4</option>
                                    <option value="">CO5</option>
                                </select>
                            </th>
                            <th>
                                <select name="" id="" class="form-select border-0">
                                    <option value="">CO1</option>
                                    <option value="">CO2</option>
                                    <option value="" selected>CO3</option>
                                    <option value="">CO4</option>
                                    <option value="">CO5</option>
                                </select>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CA1601</td>
                                <td><input type="text" name="" id="" value="10"
                                        class="form-control"></td>
                                <td><input type="text" name="" id="" value="10"
                                        class="form-control"></td>
                                <td><input type="text" name="" id="" value="10"
                                        class="form-control"></td>
                                <td><input type="text" name="" id="" value="10"
                                        class="form-control"></td>
                                <td><input type="text" name="" id="" value="10"
                                        class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
