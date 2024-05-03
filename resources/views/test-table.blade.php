<table>
    <thead>
        <th>Course</th>
        <th>CO</th>
        <th>Attainment level</th>
        @foreach (range(1, 12) as $index)
            <th>{{ 'PO' . $index }}</th>
        @endforeach
    </thead>
    <tbody>
        @php
            $directAttainment = [];
            $totalPoArray = [];
        @endphp

        @for ($i = 0; $i < count($poArray); $i++)
            <tr>
                <th>{{ $cid[$i] }}</th>
                @foreach (json_decode($poArray[$i], true) as $co => $r)
                    @php
                        $r = json_decode($r, true);
                    @endphp
                    <tr>
                        <th>{{ $co }}</th>
                        <td>{{ $grandTotalArray[$i][$co] }}</td>

                        @foreach (range(1, 12) as $index)
                            @if (!is_null($r['PO' . $index]))
                                <td>{{ $r['PO' . $index] }}</td>
                            @else
                                <td>0</td>
                            @endif
                            @php
                                if (!is_null($r['PO' . $index])) {
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
            <th>Direct PO Attainment</th>
            @foreach (range(1, 12) as $index)
                @if (isset($directAttainment['PO' . $index]))
                    <td>{{ round(array_sum($directAttainment['PO' . $index]) / array_sum($totalPoArray['PO' . $index]), 2) }}
                    </td>
                @else
                    <td>0</td>
                @endif
            @endforeach
        </tr>
    </tbody>
</table>
