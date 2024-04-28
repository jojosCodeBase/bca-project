@extends('layouts.table-style')
@section('title', 'PO Attainment')
@section('breadcrumb', 'PO Attainment')
@section('content')
    <div class="container-fluid">
        <h5>{{ $cid }}-{{ $subjectName }} - CO Attainment, Batch - {{ $batch }}</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead class="text-center">
                    <th style="width: 5px;" class="text-start">{{ $cid }}</th>
                    @foreach (range(1, 12) as $index)
                        <th class="text-center">{{ 'PO' . $index }}</th>
                    @endforeach
                </thead>
                <tbody class="text-center">
                    @php
                        $avgCoArray = [];
                        $poAttainmentArray = [];
                        $total = 0;
                        $count = 0;
                        for ($i = 1; $i <= 12; $i++) {
                            foreach ($relation as $value) {
                                $value = json_decode($value, true);
                                if (!is_null($value['PO' . $i])) {
                                    $total = $total + $value['PO' . $i];
                                    $count++;
                                }
                            }
                            if ($count == 0) {
                                $avgCoArray[] = $total;
                            } else {
                                if (floor($total / $count) != $total / $count) {
                                    $formattedMarks = round($total / $count, 1);
                                } else {
                                    $formattedMarks = round($total / $count, 0);
                                }
                                $avgCoArray[] = $formattedMarks;
                            }
                            $total = 0;
                            $count = 0;
                        }
                    @endphp
                    @foreach ($relation as $key => $r)
                        @php
                            $r = json_decode($r, true);
                        @endphp
                        <tr>
                            <th class="text-start">{{ $key }}</th>
                            @foreach (range(1, 12) as $index)
                                <td class="text-center">{{ $r['PO' . $index] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr>
                        <th class="text-start">Average CO</th>
                        @foreach ($avgCoArray as $value)
                            <td>{{ $value == 0 ? ' ' : $value }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="text-start">CO Attainment</th>
                        <td colspan="13" class="text-center">{{ $coAttainment['final_co_attainment'] }}</td>
                    </tr>
                    @php
                        $co_attainment = $coAttainment['final_co_attainment'];
                        foreach ($avgCoArray as $value) {
                            if (floor(($value / 3) * $co_attainment) != ($value / 3) * $co_attainment) {
                                $formattedMarks = round(($value / 3) * $co_attainment, 1);
                            } else {
                                $formattedMarks = round(($value / 3) * $co_attainment, 0);
                            }
                            $poAttainmentArray[] = $formattedMarks;
                        }
                    @endphp
                    <tr>
                        <th class="text-start">PO Attainment</th>
                        @foreach ($poAttainmentArray as $value)
                            <td>{{ $value == 0 ? ' ' : $value }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
