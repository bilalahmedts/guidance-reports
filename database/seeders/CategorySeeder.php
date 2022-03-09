<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $json = File::get("database/data/categories.json");
        $data = json_decode($json);
    
        foreach ($data as $obj) {
            
            DB::table('categories')->insert(array(
                'name' => $obj->name,
                'team_id' => $obj->team_id
            ));
        }
    }
}
