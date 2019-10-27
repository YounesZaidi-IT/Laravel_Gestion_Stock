<?php

use Illuminate\Database\Seeder;

class AddUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password'=>'$2y$10$n2Bdq9Bv3chVDZ4yO2oWq.dRj7V/24Fm6cbQaRjPOMqGUfLrpqudy',
                'function'=>'admin',
                'country'=>'Tanger',
                'created_at'=>date('Y-m-d'),
            ]
            ]);
    }
}
