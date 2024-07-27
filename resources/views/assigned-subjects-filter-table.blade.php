{{-- @foreach ($facultyDropdown as $key => $fd)
    @foreach ($fd as $facultyId => $courses)
        <tr>
            <td>{{ $key }}</td>
            <td>
                <select name="courses[{{ $facultyId }}]" class="form-select">
                    @foreach ($courses as $cid => $cname)
                        <option value="{{ $cid }}">2024 - {{ $cid }} -
                            {{ $cname }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <button class="btn btn-primary editAssignedSubject" type="button" data-faculty-id="{{ $facultyId }}"
                    data-bs-toggle="modal" data-bs-target="#assignEditModal"><i class="bi bi-pencil-fill"></i></button>
            </td>
        </tr>
    @endforeach
@endforeach --}}

@foreach ($facultyDropdown as $facultyName => $facultyAssignments)
    @foreach ($facultyAssignments as $facultyId => $years)
        @foreach ($years as $year => $subjects)
            <tr>
                <td>{{ $facultyName }}</td>
                <td>
                    <select name="courses[{{ $facultyId }}][{{ $year }}]" class="form-select">
                        @foreach ($subjects as $cid => $subjectName)
                            <option value="{{ $cid }}">
                                {{ $year }} - {{ $cid }} - {{ $subjectName }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <button class="btn btn-primary editAssignedSubject" type="button" data-faculty-id="{{ $facultyId }}"
                        data-bs-toggle="modal" data-bs-target="#assignEditModal">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    @endforeach
@endforeach



