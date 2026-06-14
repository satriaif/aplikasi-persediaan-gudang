<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\IncomingMaterialController;
use App\Http\Controllers\Admin\OutgoingMaterialController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;

Route::get(
    '/laporan/export-csv',
    [ReportController::class, 'exportCsv']
)->name('laporan.export.csv');
Route::get(
    '/laporan/export-excel',
    [ReportController::class, 'exportExcel']
)->name('laporan.export.excel');

Route::get(
    '/laporan/export-pdf',
    [ReportController::class, 'exportPdf']
)->name('laporan.export.pdf');

Route::get(
    '/laporan/print',
    [ReportController::class, 'print']
)->name('laporan.print');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

Route::get(
    '/admin/dashboard',
    [DashboardController::class,'admin']
)->name('admin.dashboard');

Route::resource(
        'categories',
        CategoryController::class
    );
   Route::get(
    '/persediaan-barang',
    [MaterialController::class, 'persediaan']
)->name('persediaan.index');

Route::get(
    '/laporan-transaksi',
    [ReportController::class, 'transaksi']
)->name('laporan.transaksi');

Route::resource('materials', MaterialController::class);

Route::resource(
    'incoming-materials',
    IncomingMaterialController::class
);

Route::resource(
    'outgoing-materials',
    OutgoingMaterialController::class
);


});

Route::middleware(['auth','role:Admin'])->group(function () {

    Route::resource('users', UserController::class);

});