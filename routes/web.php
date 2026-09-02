<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TrxController;
use App\Http\Controllers\TableController;

Route::get('locale/{lang}', [LanguageController::class, 'setLocale']);
Route::get('/lang/{locale}.json', function ($locale) {
    return response()->file(resource_path("lang/{$locale}.json"));
});
Route::get('/', [PageController::class, 'show']);
Route::get(
    '/home_customer_due_diligence_form',
    [TableController::class, 'home_customer_due_diligence_form']
);
Route::get(
    '/home_customer_risk_profiling_form',
    [TableController::class, 'home_customer_risk_profiling_form']
);
Route::post('/create', [PageController::class, 'create']);
Route::post('/createCustomerRiskProfilingForm', [PageController::class, 'createCustomerRiskProfilingForm']);
Route::get('/createForm', [PageController::class, 'createForm']);
Route::get('/createRiskProfilingForm', [PageController::class, 'createRiskProfilingForm']);

Route::get('/createdForm/{form_id}/{state}', [PageController::class, 'createdForm']);
Route::get('/createdCustomerRiskProfilingForm/{form_id}/{state}', [PageController::class, 'createdCustomerRiskProfilingForm']);
Route::get('/submittedCustomerDueDiligenceForm/{form_id}/{state}', [PageController::class, 'submittedCustomerDueDiligenceForm']);
Route::get('/submittedCustomerRiskProfilingForm/{form_id}/{state}', [PageController::class, 'submittedCustomerRiskProfilingForm']);

Route::post('/submitCustomerDueDiligenceForm/{form_id}', [PageController::class, 'submitCustomerDueDiligenceForm']);
Route::post('/submitCustomerRiskProfilingForm/{form_id}', [PageController::class, 'submitCustomerRiskProfilingForm']);

Route::post('/updateCustomerDueDiligenceForm/{form_id}', [PageController::class, 'updateCustomerDueDiligenceForm']);
Route::post('/updateCustomerRiskProfilingForm/{form_id}', [PageController::class, 'updateCustomerRiskProfilingForm']);

Route::post('/{form_id}/delete', [TableController::class, 'delete']);
Route::get('/{form_id}/editCustomerDueDiligenceForm', [TableController::class, 'editCustomerDueDiligenceForm']);
Route::get('/{form_id}/editCustomerRiskProfilingForm', [TableController::class, 'editCustomerRiskProfilingForm']);

Route::get('/attachments/{form_id}', [TableController::class, 'attachments']);
Route::post('/deleteImage/{id}', [TableController::class, 'deleteImage']);
Route::post('/generate-exe', [TableController::class, 'generateExe']);
Route::post('/uploadImages/{form_id}/{form_type}', [PageController::class, 'uploadImages']);
Route::post('/uploadCertReceiptImages', [TableController::class, 'uploadCertReceiptImages']);
Route::get('/branches', [TrxController::class, 'branches']);
Route::get('/search-trx', [TrxController::class, 'search']);
