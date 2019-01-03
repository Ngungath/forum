<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title1 = "Laravel 5.6";
        $title2 = "Wordpress";
        $title3 = "Vue JS";
        $title4 = "Angular JS";
        $title5 = "Mongo DB";

        $chanel1 =['title'=> $title1,
                 'slug'=>str_slug($title1)
             ];
        $chanel2 =['title'=>  $title2,
                    'slug'=>str_slug($title2)];
        $chanel3 =['title'=>  $title3,
                    'slug'=>str_slug($title3)];
        $chanel4 =['title'=>  $title4,
                    'slug'=>str_slug($title4)];
        $chanel5 =['title'=>  $title5,
                    'slug'=>str_slug($title5)];

        Channel::create($chanel1);
        Channel::create($chanel2);
        Channel::create($chanel3);
        Channel::create($chanel4);
        Channel::create($chanel5);



    }
}
