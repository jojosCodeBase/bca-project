<table class="table table-hover">
    <thead>
        <th style="width: 70px;">Sl. No</th>
        <th>Subject Id</th>
        <th>Subject Name</th>
        <th>Date</th>
    </thead>
    <tbody>
        @for ($i = 0; $i < count($courses); $i++)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $courses[$i]['cid'] }}</td>
                <td>{{ $courses[$i]['cname'] }}</td>
                <td>{{ $courses[$i]['created_at'] }}</td>
            </tr>
        @endfor
    </tbody>
</table>
