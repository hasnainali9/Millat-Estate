<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
                'admin_logo'=>'/uploads/settings/admin-logo-202109041630736902.jpg',
                'admin_favicon'=>'/uploads/settings/admin-favicon-202202031643871638.png', 
                'site_logo_light'=>'/uploads/settings/site-logo-light.png', 
                'site_logo_dark'=>'/uploads/settings/site-logo-dark.png', 
                'site_favicon'=>'/uploads/settings/site-favicon-202202031643872491.png', 
                'site_banner_video'=>'/uploads/settings/site-banner-video-202202031643871025.jpg', 
                'site_title'=>'AL-Haramain Group of Companies 369', 
                'seo_title'=>NULL, 
                'seo_description'=>NULL, 
                'preloader'=>1, 
                'created_at'=>'2021-09-03 07:29:07', 
                'updated_at'=>'2022-02-03 12:30:54'
        ]);
    }
}
