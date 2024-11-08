<?php

use Webkul\Matters\Http\Controllers\MattersController;

Route::group([
    'prefix'        => 'admin/matters',
    'middleware'    => ['web', 'user']
], function () {

    Route::get('', [MattersController::class, 'index'])->name('admin.matters.index');
    Route::get('create', [MattersController::class, 'create'])->name('admin.matters.create');
    Route::post('store', [MattersController::class, 'store'])->name('admin.matters.store');
    Route::get('edit/{id}', [MattersController::class, 'edit'])->name('admin.matters.edit');
    Route::post('edit/{id}', [MattersController::class, 'update'])->name('admin.matters.update');
    Route::delete('destroy/{id}', [MattersController::class, 'destroy'])->name('admin.matters.destroy');  // Ispravljeno brisanje rute

    Route::get('view/{id}', [MattersController::class, 'view'])->name('admin.matters.view');
 
 
    Route::delete('/admin/matters/mass-delete', [MatterController::class, 'massDelete'])->name('admin.matters.mass_delete');

});
