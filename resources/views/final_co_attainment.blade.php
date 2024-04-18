@extends('layouts.table-style')
@section('title', 'Final CO Attainment')
@section('breadcrumb', 'Final CO Attainment')
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

                        $grandTotal = json_decode($finalCOAttainment['grand_total'], true);
                        $totalAvgInt = json_decode($finalCOAttainment['total_avg_internal'], true);
                    @endphp
                    <tr>
                        <td>CO1</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO1'] }}</td>
                        @endforeach
                        <td>{{ $totalAvgInt['CO1'] }}</td>
                        <td>{{ $grandTotal['CO1'] }}</td>
                    </tr>
                    <tr>
                        <td>CO2</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO2'] }}</td>
                        @endforeach
                        <td>{{ $totalAvgInt['CO2'] }}</td>
                        <td>{{ $grandTotal['CO2'] }}</td>
                    </tr>
                    <tr>
                        <td>CO3</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO3'] }}</td>
                        @endforeach
                        <td>{{ $totalAvgInt['CO3'] }}</td>
                        <td>{{ $grandTotal['CO3'] }}</td>
                    </tr>
                    <tr>
                        <td>CO4</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO4'] }}</td>
                        @endforeach
                        <td>{{ $totalAvgInt['CO4'] }}</td>
                        <td>{{ $grandTotal['CO4'] }}</td>
                    </tr>
                    <tr>
                        <td>CO5</td>
                        @foreach ($examArray as $exam)
                            <td>{{ $exam['CO5'] }}</td>
                        @endforeach
                        <td>{{ $totalAvgInt['CO5'] }}</td>
                        <td>{{ $grandTotal['CO5'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="8">Final CO Attainment of {{ $subjectCode }}</td>
                        <td class="text-center">{{ $finalCOAttainment['final_co_attainment'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
