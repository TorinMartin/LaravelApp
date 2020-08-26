<?php

use Illuminate\Database\Seeder;
use YourSPACE\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Administrator';
        $admin_role->save();

        $pmod_role = new Role();
        $pmod_role->slug = 'post-moderator';
        $pmod_role->name = 'Post Moderator';
        $pmod_role->save();

        $tman_role = new Role();
        $tman_role->slug = 'theme-manager';
        $tman_role->name = 'Theme Manager';
        $tman_role->save();
    }
}
