<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission);
    }
}
