<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(["name"      => "Dev","guard_name"=> "web"]);
        Role::create(["name"      => "Warehouse","guard_name"=> "web"]);
        Role::create(["name"      => "Supplier","guard_name"=> "web"]);
        Role::create(["name"      => "Purchasing","guard_name"=> "web"]);
        Role::create(["name"      => "Supervisor Purchasing","guard_name"=> "web"]);
    }
}
