<?php

use Illuminate\Database\Seeder;
use YourSPACE\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme = new Theme();
        $theme->name = 'Default';
        $theme->cdn_url = 'css/app.css';
        $theme->is_default = 1;

        $theme->save();

        $theme = new Theme();
        $theme->name = 'Darkly';
        $theme->cdn_url = 'https://bootswatch.com/3/darkly/bootstrap.min.css';
        $theme->is_default = 0;

        $theme->save();

        $theme = new Theme();
        $theme->name = 'Slate';
        $theme->cdn_url = 'https://bootswatch.com/3/slate/bootstrap.min.css';
        $theme->is_default = 0;

        $theme->save();

        $theme = new Theme();
        $theme->name = 'Space Lab';
        $theme->cdn_url = 'https://bootswatch.com/3/spacelab/bootstrap.min.css';
        $theme->is_default = 0;

        $theme->save();
    }
}

