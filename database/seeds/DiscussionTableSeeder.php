<?php

use Illuminate\Database\Seeder;
use App\Discussion;
class DiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $t1 ="Wordress Plugin Development";
         $t2 ="Laravel  Rest API Development";
         $t3 ="Blogger Plugin Development";
         $t4 ="Jquery Front end Development";

       $d1=[
         'title'=>$t1,
         'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
         'user_id'=>2,
         'slug'=>str_slug($t1),
         'channel_id'=>1
    	];

    	$d2=[
         'title'=>$t2,
         'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
         'user_id'=>1,
         'slug'=>str_slug($t2),
         'channel_id'=>3
    	];


    	$d3=[
         'title'=>$t3,
         'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
         'user_id'=>2,
         'slug'=>str_slug($t3),
         'channel_id'=>2
    	];

    	$d4=[
         'title'=>$t4,
         'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
         'user_id'=>1,
         'slug'=>str_slug($t4),
         'channel_id'=>4
    	];

    	Discussion::create($d1);
    	Discussion::create($d2);
    	Discussion::create($d3);
    	Discussion::create($d4);
    }
}
