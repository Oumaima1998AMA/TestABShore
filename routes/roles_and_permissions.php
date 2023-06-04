<?php

use App\Modules\UsersLogic\RolesAndPermissions\Controllers\AssignPermissionsToRole;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Permissions\AddPermission;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Permissions\DeletePermission;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Permissions\EditPermission;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Permissions\UpdatePermission;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\RevokeRolePermissions;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles\AddRole;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles\DeleteRole;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles\EditRole;
use App\Modules\UsersLogic\RolesAndPermissions\Controllers\Roles\UpdateRole;
use App\Modules\UsersUi\Controllers\ShowPermissionPage;
use App\Modules\UsersUi\Controllers\ShowRolesPage;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
    Route::get('', ShowRolesPage::class)->name('index');
    Route::post('store', AddRole::class)->name('store');
    Route::get('{role}/edit', EditRole::class)->name('edit');
    Route::put('{role}/update', UpdateRole::class)->name('update');
    Route::delete('{role}/delete', DeleteRole::class)->name('delete');

    Route::put('{role}/assign-permissions', AssignPermissionsToRole::class)->name('assign-permission');

    Route::put('{role}/revoke-permission', RevokeRolePermissions::class)->name('revoke-permission');

});

Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {

    Route::get('', ShowPermissionPage::class)->name('index');
//    Route::post('store', AddPermission::class)->name('store');
//    Route::get('{permission}/edit', EditPermission::class)->name('edit');

//    Route::put('{permission}/update', UpdatePermission::class)->name('update');
// Route::delete('{permission}/delete', DeletePermission::class)->name('delete');

});
