<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'gilberto henao',
            'email'=> 'gilhenvidrios@gmail.com',
            'password'=> bcrypt('123456789')
        ])->assingnRole('admin');


        User::factory(9)->create();
    }

}
