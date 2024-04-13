@extends('layouts.main')
@section('title', 'PO Attainment')
@section('content')
    <div class="container-fluid">
        <h5>{{ $cid }} - PO Attainment</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead class="text-center">
                    <th style="width: 5px;" class="text-start">CA2313</th>
                    <th>PO1</th>
                    <th>PO2</th>
                    <th>PO3</th>
                    <th>PO4</th>
                    <th>PO5</th>
                    <th>PO6</th>
                    <th>PO7</th>
                    <th>PO8</th>
                    <th>PO9</th>
                    <th>PO10</th>
                    <th>PO11</th>
                    <th>PO12</th>
                </thead>
                <tbody class="custom-width text-center">
                    @php
                        $avgCoArray = [];
                        $poAttainmentArray = [];
                        $total = 0;
                        $count = 0;
                        for ($i = 1; $i <= 12; $i++) {
                            foreach ($relation as $value) {
                                if (!is_null($value['PO' . $i])) {
                                    $total = $total + $value['PO' . $i];
                                    $count++;
                                }
                            }
                            if ($count == 0) {
                                $avgCoArray[] = $total;
                            } else {
                                $avgCoArray[] = $total / $count;
                            }
                            $total = 0;
                            $count = 0;
                        }
                    @endphp
                    @foreach ($relation as $r)
                        <tr>
                            <th class="text-start">{{ $r['CO'] }}</th>
                            <td class="text-center">{{ $r['PO1'] }}</td>
                            <td class="text-center">{{ $r['PO2'] }}</td>
                            <td class="text-center">{{ $r['PO3'] }}</td>
                            <td class="text-center">{{ $r['PO4'] }}</td>
                            <td class="text-center">{{ $r['PO5'] }}</td>
                            <td class="text-center">{{ $r['PO6'] }}</td>
                            <td class="text-center">{{ $r['PO7'] }}</td>
                            <td class="text-center">{{ $r['PO8'] }}</td>
                            <td class="text-center">{{ $r['PO9'] }}</td>
                            <td class="text-center">{{ $r['PO10'] }}</td>
                            <td class="text-center">{{ $r['PO11'] }}</td>
                            <td class="text-center">{{ $r['PO12'] }}</td>
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
                        <td colspan="13" class="text-center">4.908</td>
                    </tr>
                    @php
                        $co_attainment = 4.908;
                        echo '<pre>';
                        // print_r($avgCoArray);
                        foreach ($avgCoArray as $value) {
                            $poAttainmentArray[] = ($value / 3) * $co_attainment;
                        }
                        echo '</pre>';
                        // print_r($poAttainmentArray);
                    @endphp
                    <tr>
                        <th class="text-start">PO Attainment</th>
                        @foreach ($poAttainmentArray as $value)
                            <td>{{ $value == 0 ? " " : $value }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
