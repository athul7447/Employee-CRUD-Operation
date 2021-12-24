<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Designations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert(array(
                array(
                'designation' => "Chief Executive Officer",
                ),
                array(
                'designation' => "Chief Operating Officer",
                ),
                array(
                'designation' => "Chief Financial Officer",
                ),
                array(
                'designation' => "Chief Marketing Officer",
                ),
                array(
                'designation' => "Chief Technology Officer",
                ),
                array(
                'designation' => "President",
                )
                ,
                array(
                'designation' => "Vice President",
                )
                ,
                array(
                'designation' => "Executive Assistant",
                )

                ));
    }
}
