@extends('layouts.main')
@section('title', 'Upload Data')
@section('breadcrumb', 'Upload Data')

@section('Progress-bar')
<div class="progress" role="progressbar" aria-label="Example 1px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 3.5px">
    <div class="progress-bar" style="width: 0%"></div>
  </div>
@endsection

@section('content')
    <div class="container-fluid flex-grow-1">
        @include('include/error-alert')
        <div class="card">
            <div class="card-body">
                <h4 class="text-custom">Upload Data</h4>
                <form action="{{ route('file-upload') }}" method="POST" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 my-3">
                            <select name="batch" id="batch" class="form-select" required>
                                <option selected disabled value="">Select batch</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Batch
                            </div>
                        </div>


                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 my-3">
                            <select name="course" id="course-select" class="form-select" required>
                                <option selected disabled value="">Select course</option>
                                <option value="BCA">BCA</option>
                                <option value="MCA">MCA</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Course
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-10 col-12 my-3">
                            <select name="subjectId" class="form-control selectpicker border" id="subjectId"
                                data-live-search="true" required>
                                <option value="" selected disabled class="text-dark">Select subject</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select subject
                            </div>
                        </div>

                        <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-10 col-12 my-3">
                            <input type="file" name="file" id="file" class="form-control"
                                aria-label="file example" required accept=".xls, .xlsx">
                            <span class="text-danger" id="file-error"></span>
                            <div class="invalid-feedback">
                                Please Choose a file
                            </div>
                        </div>
                        <div class=" col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-12 mt-xl-3 mt-lg-3 mt-3">
                            <button type="submit" class="btn btn-primary w-100" id="myButton">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
 
 $(document).ready(function () {
    var progress= $(".progress")
    var progress-bar= $(".progress-bar")
 
    $('form').ajaxForm({

        beforeSend:function(){
            var percentVal='0%';
            progress.width(percentVal);
            progress.html(percentVal);
        },
        uploadProgress:function( event,position,total,percentComplete){
            var percentVal= percentComplete + '%';
            progress.width(percentVal);
            progress.html(percentVal);
        },
        complete:function(res){
            console.log(res);
            alert("File has uploaded")
        }
    })
})

</script>
