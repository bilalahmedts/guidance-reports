<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\GuidanceReport;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuidanceReportImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $users = User::all();
            $user = $users->where('name',$row['agent_name'])->first();
            $categories = Category::all();
            $category = $categories->where('name',$row['campaign'])->first();
            
            GuidanceReport::create([
            "user_id" => $user->id,
            "team_id" => $user->team->id,
            "categories_id" => $category->id ?? NULL,
            "created_at" => $row['date'],
            "transfer_per_day" => $row["transfer_per_day"], 
            "call_per_day" => $row["call_per_day"],
            "rea_sign_up" => $row["rea_sign_up"],
            "tbd_assigned" => $row["tbd_assigned"],
            "no_of_matches" => $row["number_of_matches"],
            "leads" => $row["leads"],
            "conversations" => $row["conversations"],

            ]);
            

        }
        
    }
}
