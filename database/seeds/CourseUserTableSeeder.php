<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\User;
use Illuminate\Support\Facades\DB;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $timestamp = date("Y-m-d H:i:s");

        for ($i = 0; $i < 10; $i++) {

            DB::table('course_user')->insert(
                [
                    'course_id' => Course::select('id')->orderByRaw("RAND()")->first()->id,
                    'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
                    "created_at" => $timestamp
                ]
            );
        }
    }
}