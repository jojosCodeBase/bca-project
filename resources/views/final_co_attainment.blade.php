@extends('layouts.main')
@section('title', 'Final CO Attainment')
@section('content')
    <div class="container-fluid">
        <h5>{{ $subjectCode }} - Final CO Attainment, Batch - {{ $batch }}</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead class="bg-light text-center">
                    <th>CO's</th>
                    <th>Quiz 1</th>
                    <th>Sessional 1</th>
                    <th>Quiz 2</th>
                    <th>Sessional 2</th>
                    <th>Assignment</th>
                    <th>End Sem</th>
                    <th>Total Avg Int</th>
                    <th style="width: 300px;">Grand Total(50% int + 50% End term)</th>
                </thead>
                <tbody class="text-center">
                @php
                    $q1 = json_decode($co_attainment['q1'], true);
                    $s1 = json_decode($co_attainment['s1'], true);
                    $q2 = json_decode($co_attainment['q2'], true);
                    $s2 = json_decode($co_attainment['s2'], true);
                    $assignment = json_decode($co_attainment['assignment'], true);
                    $end_sem = json_decode($co_attainment['end_sem'], true);
                    $examArray = [$q1, $s1, $q2, $s2, $assignment, $end_sem];
                    $totalAvgIntArray = [];
                    $grandTotal = [];

                    $totalAvgInt = 0;
                    $exams = 0;
                    $totalAvg = 0;

                @endphp
                    <tr>
                        <td>CO1</td>
                        @foreach ($examArray as $exam)
                            {{-- <td>{{ $exam['CO1'] == NULL ? " " : $exam['CO1'] }}</td> --}}
                            <td>{{ $exam['CO1'] }}</td>
                            @php
                                if (!is_null($exam['CO1']) && $exam != $end_sem) {
                                    $totalAvg = $totalAvg + $exam['CO1'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                            $totalAvgIntArray['CO1'] = $totalAvgInt;
                            $grandTotal['CO1'] = ($totalAvgInt + $end_sem['CO1'])/2;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $grandTotal['CO1'] }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td>CO2</td>
                        @foreach ($examArray as $exam)
                            {{-- <td>{{ $exam['CO2'] == NULL ? " " : $exam['CO2'] }}</td> --}}
                            <td>{{ $exam['CO2'] }}</td>
                            @php
                                if (!is_null($exam['CO2']) && $exam != $end_sem) {
                                    $totalAvg = $totalAvg + $exam['CO2'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                            $totalAvgIntArray['CO2'] = $totalAvgInt;
                            $grandTotal['CO2'] = ($totalAvgInt + $end_sem['CO2'])/2;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $grandTotal['CO2'] }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td>CO3</td>
                        @foreach ($examArray as $exam)
                            {{-- <td>{{ $exam['CO3'] == NULL ? " " : $exam['CO3'] }}</td> --}}
                            <td>{{ $exam['CO3'] }}</td>
                            @php
                                if (!is_null($exam['CO3']) && $exam != $end_sem) {
                                    $totalAvg = $totalAvg + $exam['CO3'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                            $totalAvgIntArray['CO3'] = $totalAvgInt;
                            $grandTotal['CO3'] = ($totalAvgInt + $end_sem['CO3'])/2;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $grandTotal['CO3'] }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td>CO4</td>
                        @foreach ($examArray as $exam)
                            {{-- <td>{{ $exam['CO4'] == NULL ? " " : $exam['CO4'] }}</td> --}}
                            <td>{{ $exam['CO4'] }}</td>
                            @php
                                if (!is_null($exam['CO4']) && $exam != $end_sem) {
                                    $totalAvg = $totalAvg + $exam['CO4'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                            $totalAvgIntArray['CO4'] = $totalAvgInt;
                            $grandTotal['CO4'] = ($totalAvgInt + $end_sem['CO4'])/2;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $grandTotal['CO4'] }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    <tr>
                        <td>CO5</td>
                        @foreach ($examArray as $exam)
                            {{-- <td>{{ $exam['CO5'] == NULL ? " " : $exam['CO5'] }}</td> --}}
                            <td>{{ $exam['CO5'] }}</td>
                            @php
                                if (!is_null($exam['CO5']) && $exam != $end_sem) {
                                    $totalAvg = $totalAvg + $exam['CO5'];
                                    $exams++;
                                }
                            @endphp
                        @endforeach
                        @php
                            $totalAvgInt = $totalAvg / $exams;
                            $totalAvgIntArray['CO5'] = $totalAvgInt;
                            $grandTotal['CO5'] = ($totalAvgInt + $end_sem['CO5'])/2;
                        @endphp
                        <td>{{ $totalAvgInt }}</td>
                        <td>{{ $grandTotal['CO5'] }}</td>
                        @php
                            $totalAvgInt = 0;
                            $exams = 0;
                            $totalAvg = 0;
                        @endphp
                    </tr>
                    @php
                    $sum=0;
                        foreach($grandTotal as $m){
                            $sum = $sum + $m;
                        }

                        $final = $sum/count($grandTotal);
                    @endphp
                    <tr>
                        <td colspan="8">Final CO Attainment of {{ $subjectCode }}</td>
                        <td class="text-center">{{ $final }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
