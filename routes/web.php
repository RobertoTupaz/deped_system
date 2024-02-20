<?php

use App\Http\Controllers\applicant\ApplicantAuthController;
use App\Http\Controllers\applicant\ApplicantMainController;
use App\Http\Controllers\personel\PersonelMainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ApplicantMainController::class, 'index']);

Route::prefix('/applicant')->group( function() {
    Route::get('/', [ApplicantMainController::class, 'index']);

    Route::middleware('guestApplicant') -> group(function() {
        Route::get('/login', [ApplicantAuthController::class, 'loginPage']) ->name('login');
        Route::get('/register', [ApplicantAuthController::class, 'registerPage']);
    
        Route::post('/login', [ApplicantAuthController::class, 'login']);
        Route::post('/register', [ApplicantAuthController::class, 'store']);
    });
    
    Route::middleware('auth:user1') -> group(function() {
        Route::post('/logout', [ApplicantAuthController::class, 'logout']);

        Route::get('/dashboard', [ApplicantMainController::class, 'dashboard']);
        Route::get('/personalInfo', [ApplicantMainController::class, 'personalInfo']) ->name('personalInfo');
        Route::get('/applicationHistory', [ApplicantMainController::class, 'applicationHistory']);

        Route::get('/applicationForm', [ApplicantMainController::class, 'applicationForm']);
        Route::post('/saveInfo', [ApplicantMainController::class, 'saveInfo']);

        Route::post('/addEducation', [ApplicantMainController::class, 'addEducation']);
        Route::post('/addEligibility', [ApplicantMainController::class, 'addEligibility']);
        Route::post('/addExperience', [ApplicantMainController::class, 'addExperience']);
        Route::post('/addTraining', [ApplicantMainController::class, 'addTraining']);
        Route::post('/addPerformanceRating', [ApplicantMainController::class, 'addPerformanceRating']);
        Route::post('/addOutstandingAccomplishment', [ApplicantMainController::class, 'addOutstandingAccomplishment']);
        Route::post('/addAOEAA', [ApplicantMainController::class, 'addAOEAA']);
        Route::post('/addLD', [ApplicantMainController::class, 'addLD']);

        Route::post('/editEducation', [ApplicantMainController::class, 'editEducation']);
        Route::post('/editExperience', [ApplicantMainController::class, 'editExperience']);
        Route::post('/editTraining', [ApplicantMainController::class, 'editTraining']);
        Route::post('/editEligibility', [ApplicantMainController::class, 'editEligibility']);
        Route::post('/editPerformanceRating', [ApplicantMainController::class, 'editPerformanceRating']);
        Route::post('/editOutstandingAccomplishment', [ApplicantMainController::class, 'editOutstandingAccomplishment']);
        Route::post('/editAOEAA', [ApplicantMainController::class, 'editAOEAA']);
        Route::post('/editLD', [ApplicantMainController::class, 'editLD']);
    });
});

Route::prefix('/personel')->group( function() {

    // Route::get('/login', [ApplicantAuthController::class, 'loginPage']) ->name('login');
    // Route::get('/register', [ApplicantAuthController::class, 'registerPage']);

    // Route::post('/login', [ApplicantAuthController::class, 'login']);
    // Route::post('/register', [ApplicantAuthController::class, 'store']);
    
    Route::get('/', [PersonelMainController::class, 'index']);
    Route::post('/addJobs', [PersonelMainController::class, 'addJobs']);
    Route::get('/publicationOfVacancies', [ApplicantMainController::class, 'publicationOfVacancies']);
    Route::get('/individualEvaluationResult', [ApplicantMainController::class, 'individualEvaluationResult']);
    Route::get('/signatoriesPage', [ApplicantMainController::class, 'signatoriesPage']);
});

Route::prefix('/psb')->group( function() {
    Route::get('/', [ApplicantMainController::class, 'index']);
    
    Route::prefix('/auth') -> group(function() {
        Route::get('/individualEvaluationResultTeacher1', [ApplicantMainController::class, 'individualEvaluationResultTeacher1']);
    });
});