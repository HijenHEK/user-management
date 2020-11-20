<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.ad',
            'password' => Hash::make('00000000')
        ]);

         $admin->roles()->attach(Role::where('name','Admin')->get());
        
         $users = User::factory()->count(10)->create() ;
         foreach ($users as $u) {
             $u->roles()->attach(Role::all()->random(2,3));
         }
    }
}
