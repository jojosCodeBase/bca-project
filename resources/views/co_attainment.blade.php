@extends('layouts.main')
@section('title', 'CO Attainment')
@section('content')
    <div class="container-fluid">
        <h5>{{ $subjectCode }} - CO Attainment, Batch - {{ $batch }}</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead>
                    <tr class="bg-light text-center">
                        <th rowspan="2">Regno</th>
                        <th colspan="4">Quiz 1</th>
                        <th colspan="4">Sessional 1</th>
                        <th colspan="4">Quiz 2</th>
                        <th colspan="4">Sessional 2</th>
                        <th colspan="6">Assignment</th>
                        <th colspan="6">End Semester</th>
                        {{-- <th rowspan="2">Total</th> --}}
                    </tr>
                    <tr>
                        @php
                            $q1 = json_decode($data[0]['q1'], true);
                            $s1 = json_decode($data[0]['s1'], true);
                            $q2 = json_decode($data[0]['q2'], true);
                            $s2 = json_decode($data[0]['s2'], true);
                            $assignment = json_decode($data[0]['assignment'], true);
                            $end_sem = json_decode($data[0]['end_sem'], true);
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
                        @foreach ($end_sem as $key => $marks)
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

                            @foreach ($assignment as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                @endif
                            @endforeach

                            @php
                                $end_sem = json_decode($x['end_sem'], true);
                            @endphp

                            @foreach ($end_sem as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach

                    {{-- display max marks --}}
                    @php
                        $q1 = json_decode($max_marks['q1'], true);
                        $s1 = json_decode($max_marks['s1'], true);
                        $q2 = json_decode($max_marks['q2'], true);
                        $s2 = json_decode($max_marks['s2'], true);
                        $assignment = json_decode($max_marks['assignment'], true);
                        $end_sem = json_decode($max_marks['end_sem'], true);
                    @endphp

                    <tr>
                        <td>Max Marks/CO</td>
                        @foreach ($q1 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @foreach ($s1 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @foreach ($q2 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @foreach ($s2 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @foreach ($assignment as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach

                        @foreach ($end_sem as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
