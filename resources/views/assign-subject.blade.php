@extends('layouts/main')
@section('title', 'Assign Subjects')
@section('breadcrumb', 'Assign Subjects')
@section('content')
    <div class="container-fluid">
        @include('include/error-alert')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-6">
                        <h4 class="text-custom">Assign Subject</h4>
                    </div>
                    {{-- <div class="col-xl-8 col-12 bg-primary mt-3 mt-xl-0"> --}}
                    {{-- <div class="row d-flex justify-content-xl-end"> --}}
                    <div class="col-xl-6 col-11 order-3 order-xl-0 pt-3 pt-xl-0 m-auto">
                        <div class="input-group ">
                            <input type="search" name="" id="" placeholder="Search Faculty"
                                class="form-control"><span class="input-group-text bg-transparent"><i
                                    class="bi bi-search"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6 order-2 order-xl-0 d-flex justify-content-md-end pe-md-4">
                        <div class="btn-color">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#assignSubjectModal">Assign subject</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-2">
                <h5 class="text-muted mt-4">List Of Faculty</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-striped my-4">
                    <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Faculty Name</th>
                            <th>Subjects Assigned</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facultyDropdown as $key => $fd)
                            @foreach ($fd as $facultyId => $courses)
                                <tr>
                                    <td>{{ $loop->parent->iteration }}</td>
                                    <td>{{ $key }}</td>
                                    <td>
                                        <select name="courses[{{ $facultyId }}]" class="form-select">
                                            @foreach ($courses as $cid => $cname)
                                                <option value="{{ $cid }}">{{ $cid }} -
                                                    {{ $cname }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary editAssignedSubject" type="button"
                                            data-faculty-id="{{ $facultyId }}" data-bs-toggle="modal"
                                            data-bs-target="#assignEditModal"><i class="bi bi-pencil-fill"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}

    {{-- assign subject modal start --}}
    <div class="modal fade" id="assignSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Assign Subject</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('assign-subject') }}" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <label for="subject-name" class="form-label">Subject Name</label>
                                <select id="subject-name" name="subject" class="selectpicker form-control"
                                    data-live-search="true">
                                    <option value="" selected disabled>Select subject from list</option>
                                    @foreach ($allCourses as $c)
                                        <option value="{{ $c['cid'] }}">{{ $c['cid'] }} - {{ $c['cname'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="faculty-name" class="form-label">Faculty</label>
                                <select name="faculty" class="selectpicker form-control" data-live-search="true">
                                    <option value="" selected disabled>Select faculty from list</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty['id'] }}">{{ $faculty['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="course" class="form-label">Course</label>
                                <select id="course" name="course" class="form-select">
                                    <option value="" selected disabled>Select course from list</option>
                                    <option value="bca">BCA</option>
                                    <option value="mca">MCA</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="semester" class="form-label">Semester</label>
                                <select id="semester" name="semester" class="form-select">
                                    <option value="" selected disabled>Select semester from list</option>
                                    <option value="first">First</option>
                                    <option value="second">Second</option>
                                    <option value="third">Third</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- assign subject modal end --}}

    {{-- assign subject edit modal start --}}
    <div class="modal fade" id="assignEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Assigned Subjects</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('edit-assign-subject') }}" id="editForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="faculty-edit-id" class="form-label">Faculty Name</label>
                                <input type="text" id="faculty-name" class="form-control" disabled>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="subject-checkboxes" class="form-label">Assigned Subjects:</label>
                                <div id="subject-checkboxes">
                                    <!-- Assigned subjects checkboxes will be inserted here dynamically -->
                                </div>
                                <span id="alert-message" class="text-danger" style="display: none;">No subejcts are
                                    checked. Please select at least one subject</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="removeBtn">Remove Selected</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- assign subject edit modal end --}}
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.editAssignedSubject').click(function() {
                var facultyId = $(this).data('faculty-id');
                // console.log(facultyId);
                // alert(facultyId);
                $.ajax({
                    url: '/admin/get_assigned_courses',
                    method: 'GET',
                    data: {
                        faculty_id: facultyId
                    },
                    success: function(response) {
                        console.log(response);
                        $('#faculty-name').val(response[0]['faculty_name']);
                        $('#subject-checkboxes').empty(); // Clear previous checkboxes

                        if (response.length > 0) {
                            response.forEach(function(course) {
                                var checkbox =
                                    '<div class="form-check"><input class="form-check-input" type="checkbox" value="' +
                                    course.course_id + // Accessing the course ID
                                    '" name="checked_courses[]"><label class="form-check-label">' +
                                    course.course_name +
                                    '</label></div>'; // Accessing the course name
                                $('#subject-checkboxes').append(checkbox);
                            });
                        } else {
                            $('#subject-checkboxes').html(
                                '<p>No courses assigned to this faculty.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#removeBtn').on('click', function() {
                // Check if any checkboxes are checked
                var checkedCheckboxes = $('input[type="checkbox"]:checked');
                if (checkedCheckboxes.length == 0) {
                    $('#alert-message').css('display', 'block');
                } else {
                    $('#alert-message').css('display', 'none');
                }
            });

        });
    </script>

@endsection
