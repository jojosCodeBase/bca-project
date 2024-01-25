<!-- resources/views/excel/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Excel Data</title>
</head>
<body>

<table border="1">
    <thead>
        <tr>
            @foreach($rows->first() as $key => $value)
                <th>{{ $key }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $row)
            <tr>
                @foreach($row as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
