<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\GuidanceReport;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class GuidanceReportImport implements ToCollection, WithHeadingRow, SkipsEmptyRows
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $keys = array_keys($row->toArray());
                if (($keys[0] == 'date') && ($keys[1] == 'agent_name') && ($keys[2] == 'team') && ($keys[3] == 'campaign')
                    && ($keys[4] == 'transfer_per_day') && ($keys[5] == 'call_per_day') && ($keys[6] == 'rea_sign_up') && ($keys[7] == 'tbd_assigned')
                    && ($keys[8] == 'number_of_matches') && ($keys[9] == 'leads') && ($keys[10] == 'conversations')) {

                    $users = User::all();
                    $user = $users->where('name',$row['agent_name'])->first();
                    $categories = Category::all();
                    $category = $categories->where('name',$row['campaign'])->first();

                    GuidanceReport::create([
                    "created_at" => Carbon::createFromFormat('d-m-Y', $row['date'])->format('Y-m-d'),
                    "user_id" => $user->id ?? '-',
                    "team_id" => $user->team->id ?? '-',
                    "categories_id" => $category->id ?? '-',
                    "transfer_per_day" => $row["transfer_per_day"] ?? '-',
                    "call_per_day" => $row["call_per_day"] ?? '-',
                    "rea_sign_up" => $row["rea_sign_up"] ?? '-',
                    "tbd_assigned" => $row["tbd_assigned"] ?? '-',
                    "no_of_matches" => $row["number_of_matches"] ?? '-',
                    "leads" => $row["leads"] ?? '-',
                    "conversations" => $row["conversations"] ?? '-',
                ]);
            }
        }
    }

    /* public function transformDate($value, $format = 'Y-m-d')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
} */













}
