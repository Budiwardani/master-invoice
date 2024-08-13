<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(["name"      => "dashboard"]);
        Permission::create(["name"      => "master-company"]);
        Permission::create(["name"      => "master-user"]);
        Permission::create(["name"      => "quotation.index"]);
        Permission::create(["name"      => "quotation.create"]);
        Permission::create(["name"      => "quotation.update"]);
        Permission::create(["name"      => "quotation.delete"]);
        Permission::create(["name"      => "po.index"]);
        Permission::create(["name"      => "po.create"]);
        Permission::create(["name"      => "po.update"]);
        Permission::create(["name"      => "po.delete"]);
        Permission::create(["name"      => "do.index"]);
        Permission::create(["name"      => "do.create"]);
        Permission::create(["name"      => "do.update"]);
        Permission::create(["name"      => "do.delete"]);
        Permission::create(["name"      => "invoice.index"]);
        Permission::create(["name"      => "invoice.create"]);
        Permission::create(["name"      => "invoice.update"]);
        Permission::create(["name"      => "invoice.delete"]);
        Permission::create(["name"      => "do.admin"]);
        Permission::create(["name"      => "item.index"]);
        Permission::create(["name"      => "item.create"]);
        Permission::create(["name"      => "item.update"]);
        Permission::create(["name"      => "item.delete"]);
        Permission::create(["name"      => "item.all"]);
        Permission::create(["name"      => "role"]);
    }
}
