@foreach ($facultyDropdown as $key => $fd)
    @foreach ($fd as $facultyId => $courses)
        <tr>
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
                <button class="btn btn-primary editAssignedSubject" type="button" data-faculty-id="{{ $facultyId }}"
                    data-bs-toggle="modal" data-bs-target="#assignEditModal"><i class="bi bi-pencil-fill"></i></button>
            </td>
        </tr>
    @endforeach
@endforeach
