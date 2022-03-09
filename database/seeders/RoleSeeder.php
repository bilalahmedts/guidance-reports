<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('roles')->truncate(); */
        $json = File::get("database/data/roles.json");
        $data = json_decode($json);
    
        foreach ($data as $obj) {
            
            DB::table('roles')->insert(array(
                'name' => $obj->name,
                'guard_name' => 'web'
            ));
        }
    }
}
