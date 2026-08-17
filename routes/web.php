<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TrxController;
use App\Http\Controllers\PDSPCustomerDueDiligenceFormController;
use App\Http\Controllers\TableController;

Route::get('locale/{lang}', [LanguageController::class, 'setLocale']);
Route::get('/lang/{locale}.json', function ($locale) {
    return response()->file(resource_path("lang/{$locale}.json"));
});
Route::get('/', [HomeController::class, 'show']);
Route::get(
    '/pdsp_customer_due_diligence_form',
    [TableController::class, 'index']
);
Route::get('/customerduediligenceform/{form_id}', [PageController::class, 'customerduediligenceform']);
Route::post('/create', [PageController::class, 'create']);
Route::get('/createForm', [PageController::class, 'createForm']);
Route::get('/createdForm/{form_id}/{state}', [PageController::class, 'createdForm']);
Route::get('/submittedForm/{form_id}/{state}', [PageController::class, 'submittedForm']);
Route::post('/submit/{form_id}', [PageController::class, 'submit']);
Route::post('/update/{form_id}', [PageController::class, 'update']);
Route::post('/{form_id}/delete', [TableController::class, 'delete']);
Route::get('/{form_id}/edit', [TableController::class, 'edit']);
Route::get('/{form_id}/attachments_modal', [TableController::class, 'attachments_modal']);
Route::get('/attachments/{form_id}', [TableController::class, 'attachments']);
Route::post('/deleteImage/{id}', [TableController::class, 'deleteImage']);
Route::post('/generate-exe', [TableController::class, 'generateExe']);
Route::post('/uploadImages/{form_id}', [PageController::class, 'uploadImages']);
Route::get('/certReceipt-image', [TableController::class, 'showCertReceiptImage']);
Route::post('/uploadCertReceiptImages', [TableController::class, 'uploadCertReceiptImages']);

Route::get('/success', function () {
    return view('success');
});
Route::get('/branches', [TrxController::class, 'branches']);
Route::get('/search-trx', [TrxController::class, 'search']);
