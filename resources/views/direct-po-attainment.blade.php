@extends('layouts.table-style')
@section('title', 'Direct Attainment')
@section('breadcrumb', 'Direct Attainment')
@section('content')
    <div class="container-fluid">
        <h5 class="">Direct Attainment, Batch - 2021</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead class="text-center">
                    <th style="width: 5px;" class="text-start">Course</th>
                    <th style="width: 5px;" class="text-start">CO</th>
                    <th style="width: 5px;" class="text-start">Attainment level</th>
                    @foreach (range(1, 12) as $index)
                        <th class="text-center">{{ 'PO' . $index }}</th>
                    @endforeach
                </thead>
                <tbody class="text-center">
                    @php
                        $directAttainment = [];
                        $totalPoArray = [];
                    @endphp

                    @for ($i = 0; $i < count($poArray); $i++)
                        <tr>
                            <th rowspan="6">{{ $cid[$i] }}</th>
                            @foreach (json_decode($poArray[$i], true) as $co => $r)
                                @php
                                    $r = json_decode($r, true);
                                @endphp
                        <tr>
                            <th class="text-start">{{ $co }}</th>
                            <td>{{ $grandTotalArray[$i][$co] }}</td>

                            @foreach (range(1, 12) as $index)
                                <td class="text-center">{{ $r['PO' . $index] }}</td>
                                @php
                                    if (!is_null($r['PO' . $index])) {
                                        // Calculate direct attainment for the current PO and CO combination
                                        $directAttainment['PO' . $index][] = $grandTotalArray[$i][$co] * $r['PO' . $index];
                                        $totalPoArray['PO' . $index][] = $r['PO' . $index];
                                    }
                                @endphp
                            @endforeach
                        </tr>
                    @endforeach
                    </tr>
                    @endfor
                    <tr>
                        <th colspan="3">Direct PO Attainment</th>
                        @foreach (range(1, 12) as $index)
                            @if (isset($directAttainment['PO' . $index]))
                                <td>{{ round(array_sum($directAttainment['PO' . $index]) / array_sum($totalPoArray['PO' . $index]), 2) }}</td>
                            @else
                                <td>{{ null }}</td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
