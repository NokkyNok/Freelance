<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $adminRole=Role::where('name','admin')->first();
        $devRole=Role::where('name','dev')->first();
        $otherRole=Role::where('name','other')->first();
        $clientRole=Role::where('name','client')->first();


        $admin=User::create([
            'name' =>'Admin ',
            'email' =>'admin@gmail.com',
            'password' =>Hash::make('adminpassword')
        ]);

        $dev=User::create([
           'name' =>'Dev',
           'email' =>'dev1@gmail.com',
           'password' =>Hash::make('devpassword')
        ]);
        $other=User::create([
            'name' =>'Other',
            'email' =>'other1@gmail.com',
            'password' =>Hash::make('otherpassword')
         ]);
         $client=User::create([
            'name' =>'Client',
            'email' =>'client1@gmail.com',
            'password' =>Hash::make('clientpassword')
         ]);

        $admin->roles()->attach($adminRole);
        $dev->roles()->attach($devRole);
        $other->roles()->attach($otherRole);
        $client->roles()->attach($clientRole);
        //
    }
}
