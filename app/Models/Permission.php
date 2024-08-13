<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    // Other model code...

    // Define the relationship to Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // Define the relationship to RolePlayGroup through the Role
    public function rolePlayGroup()
    {
        return $this->belongsTo(Role::class, 'role_id','id');
    }
}
