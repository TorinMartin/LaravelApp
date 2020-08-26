<?php

use Illuminate\Database\Seeder;
use YourSPACE\User;
use YourSPACE\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('slug','admin')->first();
        $developer = new User();
        $developer->name = 'Admin';
        $developer->email = 'root@admin.com';
        $developer->password = bcrypt('admin');
        $developer->save();
        $developer->roles()->attach($admin_role);
    }
}
