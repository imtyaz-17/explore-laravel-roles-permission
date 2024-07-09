<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $admin = User::whereName('Admin')->with('roles')->first();
    // $admin_role = Role::whereName('admin')->first();
    // $admin->roles()->attach($admin_role);
    // if ($admin->hasRole('admin')) {
    //     dd('yes');
    // }

    // dd($admin->toArray());

    // $user = User::whereName('User')->with('roles')->first();
    // $user_role = Role::whereName('user')->first();
    // $user->roles()->attach($user_role);
    // if ($user->hasRole('user')) {
    //     dd('yes');
    // }
    // dd($user->toArray());

    // $add_user_permission = Permission::where('name', 'add_user')->first();
    $view_user_permission = Permission::where('name', 'view_user')->first();
    $admin_role = Role::whereName('admin')->with('permissions')->first();
    // $admin_role->permissions()->attach($add_user_permission);
    $admin_role->permissions()->attach($view_user_permission);

    $users = User::select('id', 'name', 'email')
        ->with(['roles:id,name', 'roles.permissions:id,name'])
        ->get();


    dd($users->toArray());

    return view('welcome');
});
