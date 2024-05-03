<?php

namespace App\Exports;

use App\Models\Courses;
use App\Models\CoPoRelation;
use App\Models\FinalCoAttainment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class DirectAttainmentExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $batch = 2021;
        $course = 'BCA';

        $cid = Courses::join('final_co_attainment', 'final_co_attainment.cid', '=', 'courses.cid')
            ->where('batch', $batch)
            ->where('courses.course', $course)
            ->pluck('courses.cid')
            ->toArray();

        $poArray = CoPoRelation::join('final_co_attainment', 'final_co_attainment.cid', '=', 'co_po_relation.cid')
            ->leftJoin('courses', 'courses.cid', '=', 'final_co_attainment.cid')
            ->where('final_co_attainment.batch', $batch)
            ->where('courses.course', $course)
            ->pluck('co_po_relation.co_po')
            ->toArray();

        $grandTotalArray = FinalCoAttainment::join('courses', 'courses.cid', '=', 'final_co_attainment.cid')
            ->where('final_co_attainment.batch', $batch)
            ->where('courses.course', $course)
            ->pluck('final_co_attainment.grand_total')
            ->map(function ($item) {
                return json_decode($item, true);
            });
        return view('test-table', compact('cid', 'poArray', 'grandTotalArray'));
    }
}
