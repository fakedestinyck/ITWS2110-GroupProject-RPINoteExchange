<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 500; $i++) {
            \App\User::create([
                'rin'   => rand(661000000,661999999),
                'name'    => 'Name '.$i,
                'email' => 'email'.$i.'@ex.ample',
                'password' => '123454333',
            ]);
        }
    }
}
