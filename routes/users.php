<?php


use App\Modules\UsersLogic\User\Controllers\User\AddUser;
use App\Modules\UsersLogic\User\Controllers\User\ArchiveUser;
use App\Modules\UsersLogic\User\Controllers\User\BlockUser;
use App\Modules\UsersLogic\User\Controllers\User\DeleteUser;
use App\Modules\UsersLogic\User\Controllers\User\GetUserInfo;
use App\Modules\UsersLogic\User\Controllers\User\UnArchiveUser;
use App\Modules\UsersLogic\User\Controllers\User\UnblockUser;
use App\Modules\UsersLogic\User\Controllers\User\UpdateUser;
use App\Modules\UsersLogic\User\Controllers\User\UpdateUserRoles;
use App\Modules\UsersUi\Controllers\ShowAddUserPage;
use App\Modules\UsersUi\Controllers\ShowArchivedUsersPage;
use App\Modules\UsersUi\Controllers\ShowDetailUserPage;
use App\Modules\UsersUi\Controllers\ShowEditUserPage;
use App\Modules\UsersUi\Controllers\ShowUsersPage;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function () {

    Route::get('/', ShowUsersPage::class)->name('users');
    Route::get('/archived', ShowArchivedUsersPage::class)->name('users.archived');
    Route::get('{user}/get', GetUserInfo::class)->name('users.get')->withTrashed();

    Route::get('create', ShowAddUserPage::class)->name('users.create');
    Route::get('edit/{user}', ShowEditUserPage::class)->withTrashed()->name('users.edit');
    Route::get('{user}/detail', ShowDetailUserPage::class)->withTrashed()->name('users.detail');

    Route::post('add', AddUser::class)->name('users.store');
    Route::put('{user}/roles/update', UpdateUserRoles::class)->withTrashed()->name('users.update-roles');
    Route::put('{user}/update', UpdateUser::class)->withTrashed()->name('users.update');

    Route::put('{user}/block', BlockUser::class)->name('users.block')->withTrashed();
    Route::put('{user}/unBlock', UnblockUser::class)->name('users.unblock');

    Route::put('{user}/archive', ArchiveUser::class)->name('users.archive');
    Route::put('{user}/unArchive', UnArchiveUser::class)->withTrashed()->name('users.unarchive');

    Route::delete('{user}/delete', DeleteUser::class)->withTrashed()->name('users.delete');
});

