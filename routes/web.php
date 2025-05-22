<?php

use App\Livewire\Permission\PermissionCreate;
use App\Livewire\Permission\PermissionEdit;
use App\Livewire\Permission\PermissionIndex;
use App\Livewire\Permission\PermissionShow;
use App\Livewire\Product\ProductCreate;
use App\Livewire\Product\ProductEdit;
use App\Livewire\Product\ProductIndex;

use App\Livewire\Roles\RolesCreate;
use App\Livewire\Roles\RolesEdit;
use App\Livewire\Roles\RolesIndex;
use App\Livewire\Roles\RolesShow;

use App\Livewire\Users\UsersCreate;
use App\Livewire\Users\UsersEdit;
use App\Livewire\Users\UsersIndex;
use App\Livewire\Users\UsersShow;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('users', UsersIndex::class)->name('users.index')->middleware('permission:user.view|user.create|user.edit|user.delete');
    Route::get('usersCreate', UsersCreate::class)->name('users.create')->middleware('permission:user.create');
    Route::get('users/{id}/edit', UsersEdit::class)->name('users.edit')->middleware('permission:user.edit');
    Route::get('users/{id}/show', UsersShow::class)->name('users.show')->middleware('permission:user.view');


    Route::get('product', ProductIndex::class)->name('product.index')->middleware('permission:product.view|product.create|product.edit|product.delete');
    Route::get('productCreate', ProductCreate::class)->name('product.create')->middleware('permission:product.create');
    Route::get('product/{id}/edit', ProductEdit::class)->name('product.edit')->middleware('permission:product.edit');

    Route::get('roles',RolesIndex::class)->name('roles.index')->middleware('permission:role.view|role.create|role.edit|role.delete');
    Route::get('rolesCreate',RolesCreate::class)->name('roles.create')->middleware('permission:role.create');
    Route::get('roles/{id}/edit',RolesEdit::class)->name('roles.edit')->middleware('permission:role.edit');
    Route::get('roles/{id}/show',RolesShow::class)->name('roles.show')->middleware('permission:role.view');

    Route::get('permissions',PermissionIndex::class)->name('permissions.index')
    ->middleware('permission:permissions.view|permissions.create|permissions.edit|permissions.delete')
    ;
    Route::get('permissionsCreate',PermissionCreate::class)->name('permissions.create')
    ->middleware('permission:permissions.create')
    ;
    Route::get('permissions/{id}/edit',PermissionEdit::class)->name('permissions.edit')
    ->middleware('permission:permissions.edit')
    ;
    Route::get('permissions/{id}/show',PermissionShow::class)->name('permissions.show')
    ->middleware('permission:permissions.view')
    ;


    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
