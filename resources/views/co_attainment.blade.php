@extends('layouts.table-style')
@section('title', 'CO Attainment')
@section('breadcrumb', 'CO Attainment')

@section('content')
    <div class="container-fluid scroll-main">
        <h5>{{ $subjectCode }}-{{ $subjectName }} - CO Attainment, Batch - {{ $batch }}</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead>
                    <tr class="bg-light text-center">
                        <th rowspan="2">Regno</th>
                        @php
                            $q1 = json_decode($data[0]['q1'], true);
                            $s1 = json_decode($data[0]['s1'], true);
                            $q2 = json_decode($data[0]['q2'], true);
                            $s2 = json_decode($data[0]['s2'], true);
                            $assignment = json_decode($data[0]['assignment'], true);
                            $end_sem = json_decode($data[0]['end_sem'], true);

                            // count marks which are not null to make colspan dynamic
                            $q1Colspan = count(
                                array_filter($q1, function ($value) {
                                    return $value !== null;
                                }),
                            );
                            $s1Colspan = count(
                                array_filter($s1, function ($value) {
                                    return $value !== null;
                                }),
                            );
                            $q2Colspan = count(
                                array_filter($q2, function ($value) {
                                    return $value !== null;
                                }),
                            );
                            $s2Colspan = count(
                                array_filter($s2, function ($value) {
                                    return $value !== null;
                                }),
                            );
                            $assignmentColspan = count(
                                array_filter($assignment, function ($value) {
                                    return $value !== null;
                                }),
                            );
                            $endSemColspan = count(
                                array_filter($end_sem, function ($value) {
                                    return $value !== null;
                                }),
                            );

                        @endphp
                        <th colspan="{{ $q1Colspan }}">Quiz 1</th>
                        <th colspan="{{ $s1Colspan }}">Sessional 1</th>
                        <th colspan="{{ $q2Colspan }}">Quiz 2</th>
                        <th colspan="{{ $s2Colspan }}">Sessional 2</th>
                        <th colspan="{{ $assignmentColspan }}">Assignment</th>
                        <th colspan="{{ $endSemColspan }}">End Semester</th>
                    </tr>
                    <tr>
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

                    {{-- display target marks --}}
                    @php
                        $q1 = json_decode($targetMarks['q1'], true);
                        $s1 = json_decode($targetMarks['s1'], true);
                        $q2 = json_decode($targetMarks['q2'], true);
                        $s2 = json_decode($targetMarks['s2'], true);
                        $assignment = json_decode($targetMarks['assignment'], true);
                        $end_sem = json_decode($targetMarks['end_sem'], true);
                    @endphp

                    <tr>
                        <td>Target Marks</td>
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


                    {{-- display more than sixty percent --}}
                    @php
                        $q1 = json_decode($more_than_sixty['q1'], true);
                        $s1 = json_decode($more_than_sixty['s1'], true);
                        $q2 = json_decode($more_than_sixty['q2'], true);
                        $s2 = json_decode($more_than_sixty['s2'], true);
                        $assignment = json_decode($more_than_sixty['assignment'], true);
                        $end_sem = json_decode($more_than_sixty['end_sem'], true);
                        // dd($end_sem)
                    @endphp
                    <tr>
                        <td>Students>=60%</td>
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
                                {{-- {{ $loop->iteration }} - {{ $marks }}, --}}
                                <td>{{ $marks }}</td>
                            @endif
                        @endforeach
                        {{-- {{ dd($q2) }} --}}

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

                    {{-- display attainment percentage --}}
                    @php
                        $q1 = json_decode($attainment_percentage['q1'], true);
                        $s1 = json_decode($attainment_percentage['s1'], true);
                        $q2 = json_decode($attainment_percentage['q2'], true);
                        $s2 = json_decode($attainment_percentage['s2'], true);
                        $assignment = json_decode($attainment_percentage['assignment'], true);
                        $end_sem = json_decode($attainment_percentage['end_sem'], true);
                    @endphp

                    <tr>
                        <td>Attainment %</td>
                        @foreach ($q1 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}%</td>
                            @endif
                        @endforeach

                        @foreach ($s1 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}%</td>
                            @endif
                        @endforeach

                        @foreach ($q2 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}%</td>
                            @endif
                        @endforeach

                        @foreach ($s2 as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}%</td>
                            @endif
                        @endforeach

                        @foreach ($assignment as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}%</td>
                            @endif
                        @endforeach

                        @foreach ($end_sem as $marks)
                            @if (!is_null($marks))
                                <td>{{ $marks }}%</td>
                            @endif
                        @endforeach
                    </tr>

                    {{-- display co attainment marks --}}
                    @php
                        $q1 = json_decode($attainment['q1'], true);
                        $s1 = json_decode($attainment['s1'], true);
                        $q2 = json_decode($attainment['q2'], true);
                        $s2 = json_decode($attainment['s2'], true);
                        $assignment = json_decode($attainment['assignment'], true);
                        $end_sem = json_decode($attainment['end_sem'], true);
                    @endphp

                    <tr>
                        <td>CO Attainment</td>
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
