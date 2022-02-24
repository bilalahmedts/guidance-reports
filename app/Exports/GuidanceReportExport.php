<?php

namespace App\Exports;

use App\Models\GuidanceReport;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class GuidanceReportExport implements FromView, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($stats)
    {
        $this->stats = $stats;
    }
    
    public function headings(): array
    {
        return[
            'Agent Name',
            'Team Name',
            'Campaign',
            'Transfer Per Day',
            'Call Per Day',
            'REA Sign Up',
            'TBD Assigned',
            'Number of Matches',
            'Leads',
            'Conversations',
            'Inbound'
        ];
    }

    public function view(): View
    {
        return view('export',[
            'stats'=>$this->stats
        ]);
    }
}
