@extends('layouts.main')
@section('title', 'Semester')
@section('content')
    <div class="container table-responsive">
        <table class="table">
            <thead>
                <tr class="bg-danger">
                    <th rowspan="2">Regno</th>
                    <th colspan="4" class="bg-info">Q1</th>
                    <th colspan="4" class="bg-warning">S1</th>
                    <th colspan="4" class="bg-danger">Q2</th>
                    <th colspan="4" class="bg-light">S2</th>
                    <th colspan="6">Assignment</th>
                    <th rowspan="2" class="bg-success">Attendance</th>
                    <th rowspan="2" class="bg-light">Total</th>
                </tr>
                <tr class="bg-primary">
                    <th>CO1</th>
                    <th>CO2</th>
                    <th>CO3</th>
                    <th>Total</th>

                    <th>CO1</th>
                    <th>CO2</th>
                    <th>CO3</th>
                    <th>Total</th>

                    <th>CO3</th>
                    <th>CO4</th>
                    <th>CO5</th>
                    <th>Total</th>

                    <th>CO3</th>
                    <th>CO4</th>
                    <th>CO5</th>
                    <th>Total</th>

                    <th>CO1</th>
                    <th>CO2</th>
                    <th>CO3</th>
                    <th>CO4</th>
                    <th>CO5</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    @foreach ($data as $y)
                        @foreach ($y as $key => $value)
                            @if ($key == 'created_at' || $key == 'updated_at' || $key == 'id')
                                @continue;
                            @endif
                            @if ($key == 'q1' || $key == 's1' || $key == 'q2' || $key == 's2')
                                @foreach (json_encode($y[$key]) as $x)
                                    @if ($x == null)
                                        @continue;
                                    @endif
                                    <td class="bg-info"> {{ $x }} </td>
                                @endforeach
                            @else
                                <td class="bg-warning">{{ $value }}</td>
                            @endif
                        @endforeach
                    @endforeach
                </tr> --}}

                @foreach ($data as $y)
                    <tr>
                        <td>{{ $y['regno'] }}</td>
                        @foreach (['q1', 's1', 'q2', 's2'] as $key)
                            @foreach ($y[$key] as $x)
                                <td>{{ $x }}</td>
                            @endforeach
                        @endforeach
                        @foreach ($y['assignment'] as $assignment)
                            <td>{{ $assignment }}</td>
                        @endforeach
                        <td>{{ $y['attendance'] }}</td>
                        <td>{{ $y['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
