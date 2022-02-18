<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $json = File::get("database/data/users.json");
        $data = json_decode($json);
    
        foreach ($data as $obj) {
            
            DB::table('users')->insert(array(
                'name' => $obj->name,
                'hrms_id' => $obj->hrms_id,
                'team_id' => $obj->team_id
            ));
        }


    }
}
