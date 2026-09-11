<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PdfController;
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
Route::get(
    '/home_enhanced_customer_due_diligence_form',
    [TableController::class, 'home_enhanced_customer_due_diligence_form']
);
Route::get(
    '/home_suspicious_transaction_report',
    [TableController::class, 'home_suspicious_transaction_report']
);
Route::get(
    '/home_suspicious_transaction_report_non_individual',
    [TableController::class, 'home_suspicious_transaction_report_non_individual']
);
Route::get(
    '/home_suspicious_transaction_report_legal_arrangement',
    [TableController::class, 'home_suspicious_transaction_report_legal_arrangement']
);

Route::post('/create', [PageController::class, 'create']);
Route::post('/createCustomerRiskProfilingForm', [PageController::class, 'createCustomerRiskProfilingForm']);
Route::get('/createForm', [PageController::class, 'createForm']);
Route::get('/createRiskProfilingForm', [PageController::class, 'createRiskProfilingForm']);
Route::get('/showEnhancedCustomerDueDiligenceForm', [PageController::class, 'showEnhancedCustomerDueDiligenceForm']);
Route::post('/createEnhancedCustomerDueDiligenceForm', [PageController::class, 'createEnhancedCustomerDueDiligenceForm']);
Route::get('/showSuspiciousTransactionReport', [PageController::class, 'showSuspiciousTransactionReport']);
Route::post('/createSuspiciousTransactionReport', [PageController::class, 'createSuspiciousTransactionReport']);
Route::get('/showSuspiciousTransactionReportNonIndividual', [PageController::class, 'showSuspiciousTransactionReportNonIndividual']);
Route::post('/createSuspiciousTransactionReportNonIndividual', [PageController::class, 'createSuspiciousTransactionReportNonIndividual']);
Route::get('/showSuspiciousTransactionReportLegalArrangement', [PageController::class, 'showSuspiciousTransactionReportLegalArrangement']);



Route::get('/createdForm/{form_id}/{state}', [PageController::class, 'createdForm']);
Route::get('/createdCustomerRiskProfilingForm/{form_id}/{state}', [PageController::class, 'createdCustomerRiskProfilingForm']);
Route::get('/createdEnhancedCustomerDueDiligenceForm/{form_id}/{state}', [PageController::class, 'createdEnhancedCustomerDueDiligenceForm']);
Route::get('/createdSuspiciousTransactionReport/{form_id}/{state}', [PageController::class, 'createdSuspiciousTransactionReport']);
Route::get('/createdSuspiciousTransactionReportNonIndividual/{form_id}/{state}', [PageController::class, 'createdSuspiciousTransactionReportNonIndividual']);



Route::get('/submittedCustomerDueDiligenceForm/{form_id}/{state}', [PageController::class, 'submittedCustomerDueDiligenceForm']);
Route::get('/submittedCustomerRiskProfilingForm/{form_id}/{state}', [PageController::class, 'submittedCustomerRiskProfilingForm']);
Route::get('/submittedEnhancedCustomerDueDiligenceForm/{form_id}/{state}', [PageController::class, 'submittedEnhancedCustomerDueDiligenceForm']);
Route::get('/submittedSuspiciousTransactionReport/{form_id}/{state}', [PageController::class, 'submittedSuspiciousTransactionReport']);
Route::get('/submittedSuspiciousTransactionReportNonIndividual/{form_id}/{state}', [PageController::class, 'submittedSuspiciousTransactionReportNonIndividual']);

Route::post('/submitCustomerDueDiligenceForm/{form_id}', [PageController::class, 'submitCustomerDueDiligenceForm']);
Route::post('/submitCustomerRiskProfilingForm/{form_id}', [PageController::class, 'submitCustomerRiskProfilingForm']);
Route::post('/submitEnhancedCustomerDueDiligenceForm/{form_id}', [PageController::class, 'submitEnhancedCustomerDueDiligenceForm']);
Route::post('/submitSuspiciousTransactionReport/{form_id}', [PageController::class, 'submitSuspiciousTransactionReport']);
Route::post('/submitSuspiciousTransactionReportNonIndividual/{form_id}', [PageController::class, 'submitSuspiciousTransactionReportNonIndividual']);



Route::post('/updateCustomerDueDiligenceForm/{form_id}', [PageController::class, 'updateCustomerDueDiligenceForm']);
Route::post('/updateCustomerRiskProfilingForm/{form_id}', [PageController::class, 'updateCustomerRiskProfilingForm']);
Route::post('/updateEnhancedCustomerDueDiligenceForm/{form_id}', [PageController::class, 'updateEnhancedCustomerDueDiligenceForm']);
Route::post('/updateSuspiciousTransactionReport/{form_id}', [PageController::class, 'updateSuspiciousTransactionReport']);
Route::post('/updateSuspiciousTransactionReportNonIndividual/{form_id}', [PageController::class, 'updateSuspiciousTransactionReportNonIndividual']);



Route::post('/{form_id}/delete', [TableController::class, 'delete']);
Route::get('/{form_id}/editCustomerDueDiligenceForm', [TableController::class, 'editCustomerDueDiligenceForm']);
Route::get('/{form_id}/editCustomerRiskProfilingForm', [TableController::class, 'editCustomerRiskProfilingForm']);
Route::get('/{form_id}/editEnhancedCustomerDueDiligenceForm', [TableController::class, 'editEnhancedCustomerDueDiligenceForm']);
Route::get('/{form_id}/editSuspiciousTransactionReport', [TableController::class, 'editSuspiciousTransactionReport']);
Route::get('/{form_id}/editSuspiciousTransactionReportNonIndividual', [TableController::class, 'editSuspiciousTransactionReportNonIndividual']);


Route::get('/attachments/{form_id}', [TableController::class, 'attachments']);
Route::post('/deleteImage/{id}', [TableController::class, 'deleteImage']);
Route::post('/generate-exe', [TableController::class, 'generateExe']);
Route::post('/uploadImages/{form_id}/{form_type}', [PageController::class, 'uploadImages']);
Route::post('/uploadCertReceiptImages', [TableController::class, 'uploadCertReceiptImages']);
Route::get('/branches', [TrxController::class, 'branches']);
Route::get('/search-trx', [TrxController::class, 'search']);
