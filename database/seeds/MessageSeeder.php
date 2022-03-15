<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i<10; $i++) {
            DB::table('messages')->insert([
                'sender_id' => rand(1,2),
                'receiver_id' => rand(3,4),
                'content' => 'tin nhan '.$i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        for ($i=10; $i<20; $i++) {
            DB::table('messages')->insert([
                'sender_id' => rand(3,4),
                'receiver_id' => rand(1,2),
                'content' => 'tin nhan '.$i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        for ($i=20; $i<30; $i++) {
            DB::table('messages')->insert([
                'sender_id' => rand(1,2),
                'receiver_id' => rand(3,4),
                'content' => 'tin nhan '.$i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        for ($i=30; $i<40; $i++) {
            DB::table('messages')->insert([
                'sender_id' => rand(3,4),
                'receiver_id' => rand(1,2),
                'content' => 'tin nhan '.$i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
