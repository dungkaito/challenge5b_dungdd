<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'teacher1',
            'password' => Hash::make('123456a@A'),
            'name' => 'Phạm Văn Khánh',
            'email' => 'gv1@viettelcyber.com',
            'phone' => '0999999999',
            'role' => 'Giáo viên',
            'avatar_path' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'teacher2',
            'password' => Hash::make('123456a@A'),
            'name' => 'Bùi Văn Dương',
            'email' => 'gv2@viettelcyber.com',
            'phone' => '0888888888',
            'role' => 'Giáo viên',
            'avatar_path' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'student1',
            'password' => Hash::make('123456a@A'),
            'name' => 'Dương Đình Dũng',
            'email' => 'sv1@viettelcyber.com',
            'phone' => '0777777777',
            'role' => 'Sinh viên',
            'avatar_path' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'student2',
            'password' => Hash::make('123456a@A'),
            'name' => 'Dương Đình Hà',
            'email' => 'sv2@viettelcyber.com',
            'phone' => '0666666666',
            'role' => 'Sinh viên',
            'avatar_path' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'student3',
            'password' => Hash::make('123456a@A'),
            'name' => 'Dương Đình Anh',
            'email' => 'sv3@viettelcyber.com',
            'phone' => '0555555555',
            'role' => 'Sinh viên',
            'avatar_path' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'student4',
            'password' => Hash::make('123456a@A'),
            'name' => 'Dương Đình Tuấn',
            'email' => 'sv4@viettelcyber.com',
            'phone' => '0444444444',
            'role' => 'Sinh viên',
            'avatar_path' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        for ($i=1; $i<=5; $i++) {
            DB::table('users')->insert([
                'username' => 'test'.$i,
                'password' => Hash::make('123456a@A'),
                'name' => 'testname'.$i,
                'email' => 'test'.$i.'@viettelcyber.com',
                'phone' => '061266666'.$i,
                'role' => 'Sinh viên',
                'avatar_path' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
