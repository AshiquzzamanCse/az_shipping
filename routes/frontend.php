<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

//Homepage
Route::get('/', [HomeController::class, 'index'])->name('homepage');

//Training
// Route::get('/training', [HomeController::class, 'training'])->name('training');

Route::controller(HomeController::class)->group(function () {

    //all Team
    Route::get('/team', 'allTeam')->name('all.team');
    
    //All Job
    Route::get('/job', 'allJob')->name('all.job');
    Route::get('/job-details/{id}', 'jobDetails')->name('view.job.details');
    Route::get('/job-apply/{id}', 'jobApply')->name('apply.job');
    Route::get('/drop-cv', 'dropCv')->name('drop.cv');
    Route::post('/job-apply/employee', 'jobApplyEmployee')->name('apply.job.post');
});

//contact
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact_us', [HomeController::class, 'contactStore'])->name('contact.store');

//legal Paper
Route::get('/legal-papers', [HomeController::class, 'legalPapers'])->name('legal.papers');

//vision
Route::get('/mission-vision', [HomeController::class, 'vision'])->name('vision');

//About
Route::get('/about', [HomeController::class, 'about'])->name('about');

//CEO Message
Route::get('/ceo-message', [HomeController::class, 'ceoMessage'])->name('ceo.message');

//Why Choose Us
Route::get('/why-choose-us', [HomeController::class, 'whyChooseUs'])->name('why.choose.us');

//Service Details
Route::get('/service-details/{slug}/{id}', [HomeController::class, 'serviceDetails'])->name('service.details');

//Principle Details
Route::get('/principle-details/{slug}/{id}', [HomeController::class, 'principleDetails'])->name('principle.details');

//Client
// Route::get('/client', [HomeController::class, 'client'])->name('client');
