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
                        <th colspan="6">Ens Semester</th>
                        <th rowspan="2">Total</th>
                    </tr>
                    <tr>
                        @php
                            $q1 = json_decode($data['q1'], true);
                            $s1 = json_decode($data['s1'], true);
                            $q2 = json_decode($data['q2'], true);
                            $s2 = json_decode($data['s2'], true);
                            $assignment = json_decode($data['assignment'], true);
                            $end_sem = json_decode($data['end_sem'], true);
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
                    @php
                        $ddArrayIndex = 0;
                        $marks_track_array = [];
                        $marks_array = [];
                    @endphp
                    @foreach ($data as $x)
                        <tr>
                            <td>{{ $x['regno'] }}</td>
                            @php
                                $q1 = json_decode($x['q1'], true);
                            @endphp
                            @foreach ($q1 as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $marks_array[] = $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $s1 = json_decode($x['s1'], true);
                            @endphp
                            @foreach ($s1 as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $marks_array[] = $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $q2 = json_decode($x['q2'], true);
                            @endphp
                            @foreach ($q2 as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $marks_array[] = $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $s2 = json_decode($x['s2'], true);
                            @endphp
                            @foreach ($s2 as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $marks_array[] = $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $assignment = json_decode($x['assignment'], true);
                            @endphp

                            @foreach ($assignment as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $marks_array[] = $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $end_sem = json_decode($x['end_sem'], true);
                            @endphp

                            @foreach ($end_sem as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $marks_array[] = $marks;
                                    @endphp
                                @endif
                            @endforeach

                            <td>{{ $x['total'] }}</td>

                            @php
                                $marks_array[] = $x['total'];
                                $marks_track_array[] = $marks_array;
                                $marks_array = [];
                            @endphp
                        </tr>
                    @endforeach
                    @foreach ($max_marks as $x)
                        <tr>
                            <td>Max Marks/CO</td>
                            @php
                                $count = 0;
                                $target_marks_array = [];
                                $q1 = json_decode($x['q1'], true);
                            @endphp
                            @foreach ($q1 as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $target_marks_array[$count++] = (60 / 100) * $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $s1 = json_decode($x['s1'], true);
                            @endphp
                            @foreach ($s1 as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $target_marks_array[$count++] = (60 / 100) * $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $q2 = json_decode($x['q2'], true);
                            @endphp
                            @foreach ($q2 as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $target_marks_array[$count++] = (60 / 100) * $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $s2 = json_decode($x['s2'], true);
                            @endphp
                            @foreach ($s2 as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $target_marks_array[$count++] = (60 / 100) * $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $assignment = json_decode($x['assignment'], true);
                            @endphp

                            @foreach ($assignment as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $target_marks_array[$count++] = (60 / 100) * $marks;
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $end_sem = json_decode($x['end_sem'], true);
                            @endphp

                            @foreach ($end_sem as $marks)
                                @if (!is_null($marks))
                                    <td>{{ $marks }}</td>
                                    @php
                                        $target_marks_array[$count++] = (60 / 100) * $marks;
                                    @endphp
                                @endif
                            @endforeach

                            <td>{{ $x['total'] }}</td>
                            @php
                                $target_marks_array[$count++] = (60 / 100) * $x['total'];
                            @endphp
                        </tr>
                    @endforeach
                    <tr>
                        <td>Target Marks/CO</td>
                        @foreach ($target_marks_array as $tm)
                            <td>{{ $tm }}</td>
                        @endforeach
                    </tr>
                    @php
                        $index = 0;
                        $target_marks_count = 0;
                        $marks_more_than_sixty_percent_array = [];
                    @endphp
                    @for ($i = 0; $i < count($target_marks_array); $i++)
                        @foreach ($marks_track_array as $ms)
                            @php
                                if ($ms[$index] >= $target_marks_array[$i] && $ms[$index] != 'AB') {
                                    $target_marks_count++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $marks_more_than_sixty_percent_array[] = $target_marks_count;
                            $target_marks_count = 0;
                        @endphp
                        @php
                            $index++;
                        @endphp
                    @endfor
                    <tr>
                        <td>Students>=60%</td>
                        @foreach ($marks_more_than_sixty_percent_array as $marks)
                            <td>{{ $marks }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Attainment %</td>
                        @php
                            $attainment_array = [];
                            $student_count = count($data);
                        @endphp
                        @for ($i = 0; $i < count($marks_more_than_sixty_percent_array); $i++)
                            @php
                                $attainment_array[] = intval(
                                    ($marks_more_than_sixty_percent_array[$i] / $student_count) * 100,
                                );
                            @endphp
                            <td>{{ $attainment_array[$i] }}%</td>
                        @endfor
                    </tr>
                    {{-- <tr>
                        <td>CO Attainment Level</td>
                        @for ($i = 0; $i < count($attainment_array); $i++)
                            @php
                                $co_attainment_array[] = getCOLevel($attainment_array[$i]);
                                dd('hello');
                            @endphp
                            <td>{{ $co_attainment_array[$i] }}</td>
                        @endfor
                        @php
                            $co_attainment_array = [];
                            function getCOLevel($marks)
                            {
                                if ($marks < 38) {
                                    return 0;
                                } elseif ($marks >= 38 && $marks <= 51) {
                                    return 1;
                                } elseif ($marks >= 52 && $marks <= 72) {
                                    return 2;
                                } elseif ($marks >= 73) {
                                    return 3;
                                }
                            }
                        @endphp
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
