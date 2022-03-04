<?php

namespace App\Exports;

use App\Models\GuidanceReport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuidanceReportExport implements FromView, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Date',
            'Agent Name',
            'Team',
            'Campaign',
            'Transfer Per Day',
            'Call Per Day',
            'REA Signup',
            'TBD Assigned',
            'Number of Matches',
            'Leads',
            'Conversations',
            'Inbound'
        ];
    }
    public function view(): View
    {
        return view('reports.guidance-report-table', [
            'stats' => GuidanceReport::all()
        ]);
    }
}
