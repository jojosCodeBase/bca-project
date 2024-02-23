@extends('layouts.main')
@section('title', 'Semester')
@section('content')
    <div class="container table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" class="bg-light">Regno</th>
                    <th colspan="4" class="bg-info">Quiz 1</th>
                    <th colspan="4" class="bg-light">Sessional 1</th>
                    <th colspan="4" class="bg-info">Quiz 2</th>
                    <th colspan="4" class="bg-info">Sessional 2</th>
                    <th colspan="6" class="bg-info">Assignment</th>
                    <th rowspan="2">Total</th>
                </tr>
                <tr>
                    @php
                        $q1 = json_decode($data[0]['q1'], true);
                        $s1 = json_decode($data[0]['s1'], true);
                        $q2 = json_decode($data[0]['q2'], true);
                        $s2 = json_decode($data[0]['s2'], true);
                        $assignment = json_decode($data[0]['assignment'], true);
                    @endphp

                    @foreach ($q1 as $key => $marks)
                        @if (!is_null($marks))
                            <th>{{ $key }}</th>
                        @endif
                    @endforeach
                    @foreach ($s1 as $key => $marks)
                        @if (!is_null($marks))
                            <th>{{ $key }}</th>
                        @endif
                    @endforeach
                    @foreach ($q2 as $key => $marks)
                        @if (!is_null($marks))
                            <th>{{ $key }}</th>
                        @endif
                    @endforeach
                    @foreach ($s2 as $key => $marks)
                        @if (!is_null($marks))
                            <th>{{ $key }}</th>
                        @endif
                    @endforeach
                    @foreach ($assignment as $key => $marks)
                        @if (!is_null($marks))
                            <th>{{ $key }}</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $x)
                    <tr>
                        <td>{{ $x['regno'] }}</td>
                        @php
                            $q1 = json_decode($x['q1'], true);
                        @endphp
                        @foreach ($q1 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @php
                            $s1 = json_decode($x['s1'], true);
                        @endphp
                        @foreach ($s1 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @php
                            $q2 = json_decode($x['q2'], true);
                        @endphp
                        @foreach ($q2 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @php
                            $s2 = json_decode($x['s2'], true);
                        @endphp
                        @foreach ($s2 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @php
                            $assignment = json_decode($x['assignment'], true);
                        @endphp

                        @foreach ($assignment as $value)
                            @if (!is_null($value))
                                <td>{{ $value }}</td>
                            @endif
                        @endforeach

                        <td>{{ $x['total'] }}</td>
                    </tr>
                @endforeach
                @foreach ($max_marks as $x)
                    <tr>
                        <td>Max Marks/CO</td>
                        @php
                            $q1 = json_decode($x['q1'], true);
                        @endphp
                        @foreach ($q1 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @php
                            $s1 = json_decode($x['s1'], true);
                        @endphp
                        @foreach ($s1 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @php
                            $q2 = json_decode($x['q2'], true);
                        @endphp
                        @foreach ($q2 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @php
                            $s2 = json_decode($x['s2'], true);
                        @endphp
                        @foreach ($s2 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @php
                            $assignment = json_decode($x['assignment'], true);
                        @endphp

                        @foreach ($assignment as $value)
                            @if (!is_null($value))
                                <td>{{ $value }}</td>
                            @endif
                        @endforeach

                        <td>{{ $x['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
