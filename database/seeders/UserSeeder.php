<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    { 
        DB::table('users')->truncate();
        $json = File::get("database/data/users.json");
        $data = json_decode($json);
        $faker = Faker::create();

        $user = User::create(array(
            'name' => 'Admin',
            'hrms_id' => null,
            'team_id' => null,
            'email' => 'admin@touchstone.com.pk',
            'password' => Hash::make('test123'),
            'status' => 'Active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ));
        $user->syncRoles('Super Admin');
        foreach ($data as $obj) { 
           $user = User::create(array(
                    'name' => $obj->name,
                    'hrms_id' => $obj->hrms_id,
                    'team_id' => $obj->team_id,
                    'email' => $faker->safeEmail,
                    'password' => Hash::make('test123'),
                    'status' => $obj->status,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                )); 
            $user->syncRoles($obj->role);
            }
    }
}
