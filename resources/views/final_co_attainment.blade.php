@extends('layouts.main')
@section('title', 'Final CO Attainment')
@section('content')
    <div class="container-fluid">
        <h5>{{ $subjectCode }} - Final CO Attainment, Batch {{ $batch }}</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead class="bg-light text-center">
                    <th>CO's</th>
                    <th>Quiz 1</th>
                    <th>Sessional 1</th>
                    <th>Quiz 2</th>
                    <th>Sessional 2</th>
                    <th>Assignment</th>
                    <th>Total Avg Int</th>
                    <th style="width: 300px;">Grand Total(50% int + 50% End term)</th>
                </thead>

                {{-- <tr class="bg-light text-center">
                    </tr>
                    <tr> --}}

                {{-- </tr> --}}
                {{-- <tr>
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
                    </tr> --}}
                {{-- @dump($co_attainment) --}}
                @php
                    $q1 = json_decode($co_attainment['q1'], true);
                    $s1 = json_decode($co_attainment['s1'], true);
                    $q2 = json_decode($co_attainment['q2'], true);
                    $s2 = json_decode($co_attainment['s2'], true);
                    $assignment = json_decode($co_attainment['assignment'], true);
                    $examArray = [$q1, $s1, $q2, $s2, $assignment];

                    // echo count($examArray);

                    // foreach ($examArray as $value) {
                    //     // echo $value;
                    //     print_r($examArray[0]);
                    // }

                    $totalAvgInt = 0;
                    $exams = 0;
                    $totalAvg = 0;

                @endphp
                {{-- @dump() --}}
                <tbody>
                    <tr>
                        <td>CO1</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO1'] }}</td>
                            @php
                                if (!is_null($exam['CO1'])) {
                                    $totalAvg = $totalAvg + $exam['CO1'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $exams }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td>CO2</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO2'] }}</td>
                            @php
                                if (!is_null($exam['CO2'])) {
                                    $totalAvg = $totalAvg + $exam['CO2'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $exams }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td>CO3</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO3'] }}</td>
                            @php
                                if (!is_null($exam['CO3'])) {
                                    $totalAvg = $totalAvg + $exam['CO3'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $exams }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td>CO4</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO4'] }}</td>
                            @php
                                if (!is_null($exam['CO4'])) {
                                    $totalAvg = $totalAvg + $exam['CO4'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $exams }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td>CO5</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO5'] }}</td>
                            @php
                                if (!is_null($exam['CO5'])) {
                                    $totalAvg = $totalAvg + $exam['CO5'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $exams }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td colspan="7">Final CO Attainment of {{ $subjectCode }}</td>
                        <td class="text-center">DATA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
