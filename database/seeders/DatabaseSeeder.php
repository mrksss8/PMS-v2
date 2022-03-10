<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //roles and permission seeder
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);


        //user seeder
        DB::table('users')->insert([
            'name' => 'Admin-Aventus',
            'email' => 'admin@aventus.com',
            'password' => Hash::make('asdasd123'),
        ]);


        $user = User::findorfail(1);
        $user->assignRole(1);
        
        
        // \App\Models\User::factory(10)->create();
    }
}
