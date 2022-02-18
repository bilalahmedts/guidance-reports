<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->truncate();
        $json = File::get("database/data/teams.json");
        $data = json_decode($json);
    
        foreach ($data as $obj) {
            
            DB::table('teams')->insert(array(
                'name' => $obj->name
            ));
        }
    }
}
