@extends('layouts/main')
@section('content')
    <div class="container flex-grow-1">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-7 col-xl-7 col-md-10 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#" class="mx-3">
                            <div class="row">
                                <div class=" col-xl-9 col-lg-9 col-md-9 col-12">
                                    <input type="file" name="file" id="file" placeholder="choose a file"
                                        class="form-control">
                                    <span class="text-danger" id="file-error"></span>
                                </div>
                                <div class=" col-xl-3 col-lg-3 col-md-3 col-5 mt-xl-0 mt-lg-0 mt-md-0 mt-3 m-auto ">
                                    <button type="submit" class="btn btn-primary w-100" id="myButton"
                                        onclick="alert('file uploaded successfully')">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
