@if (count($courses) > 0)
    @foreach ($courses as $c)
        <tr>
            <td class="courseId" data-course-id="{{ $c['cid'] }}">{{ $c['cid'] }}</td>
            <td>{{ $c['cname'] }}</td>
            <td>
                <button type="button" class="btn btn-primary me-xl-2 mb-2 mb-md-0 mb-xl-0 modelViewBtn"
                    data-bs-toggle="modal" data-bs-target="#viewCOPOModal"><i class="bi bi-eye-fill"></i></button>
                <button class="btn btn-primary coPoUpdateBtn" data-bs-toggle="modal" data-bs-target="#updateCOPOModal"><i
                        class="bi bi-pencil-fill"></i></button>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="3" class="text-center">No results found</td>
    </tr>
@endif
