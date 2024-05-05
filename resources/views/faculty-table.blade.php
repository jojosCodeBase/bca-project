@if (count($faculty) > 0)
    @foreach ($faculty as $index => $f)
        <tr>
            {{-- <td>{{ ($currentPage - 1) * $perPage + $index + 1 }}</td> --}}
            <td class="facultyId">{{ $f['regno'] }}</td>
            <td>{{ $f['name'] }}</td>
            <td>{{ $f['email'] }}</td>
            <td>
                <div class="more-btn">
                    <button class="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots fs-4"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <button class="dropdown-item facultyViewButton" id="viewFacultyBtn" type="button"
                                class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#facultyViewModal">View</button>
                        </li>
                        <li>
                            <button class="dropdown-item facultyEditButton" type="button" id="editFacultyBtn"
                                class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#facultyEditModal">Edit</button>
                        </li>
                        <li>
                            <button class="dropdown-item facultyDeleteButton" id="deleteFacultyBtn" type="button"
                                class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#facultyDeleteModal" data-faculty-id="{{ $f['id'] }}">Delete</button>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="5" class="text-center">No results found</td>
    </tr>
@endif
