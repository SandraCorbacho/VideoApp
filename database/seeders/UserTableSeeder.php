<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        $role_guest = Role::where('name', 'guest')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_loaders = Role::where('name','loaders')->first();
        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user->name = 'guest';
        $user->email = 'guest@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_guest);

        $user = new User();
        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        
        $user = new User();
        $user->name = 'loaders';
        $user->email = 'loaders@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_loaders);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
       
     }
}
