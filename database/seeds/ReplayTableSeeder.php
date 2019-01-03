<?php

use Illuminate\Database\Seeder;
use App\Replay;

class ReplayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $r1 =[
        	'user_id'=>1,
        	'discussion_id'=>1,
        	'content'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.'


        ];
        $r2 =[
        	'user_id'=>1,
        	'discussion_id'=>2,
        	'content'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.'


        ];
        $r3 =[
        	'user_id'=>2,
        	'discussion_id'=>3,
        	'content'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.'


        ];

        $r4 =[
        	'user_id'=>2,
        	'discussion_id'=>4,
        	'content'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.'


        ];

        Replay::create($r1);
        Replay::create($r2);
        Replay::create($r3);
        Replay::create($r4);
    }
}
