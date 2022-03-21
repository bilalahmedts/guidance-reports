<?php

namespace App\Imports;

use App\Models\Models\GuidanceReport;
use Maatwebsite\Excel\Concerns\ToModel;

class GuidanceReportImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GuidanceReport([
            //
        ]);
    }
}
