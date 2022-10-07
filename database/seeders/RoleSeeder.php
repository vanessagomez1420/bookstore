<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'admin']);
        $role2 = Role::create(['name'=> 'blogger']);

        Permission::create(['name'=>'home'])->syncRoles([$role1]);

        Permission::create(['name'=>'author.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'author.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'author.store'])->syncRoles([$role1]);
        Permission::create(['name'=>'author.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'author.update'])->syncRoles([$role1]);
        Permission::create(['name'=>'author.destroy'])->syncRoles([$role1]);
    }
}
