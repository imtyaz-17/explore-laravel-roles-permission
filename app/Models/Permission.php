<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
}
