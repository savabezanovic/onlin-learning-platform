<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
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

            DB::table('role_user')->insert(
                [
                    'role_id' => Role::select('id')->orderByRaw("RAND()")->first()->id,
                    'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
                    "created_at" => $timestamp
                ]
            );
        }
    }
}
