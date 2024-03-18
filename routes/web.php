<?php

use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PDFMergeSubscriberController;

// =============== PAGE ROUTES ===============
Route::get('/', function () { return view('home'); });
Route::get('/about-us', function () { return view('about_us'); });
Route::get('/privacy-policy', function () { return view('privacy_policy'); });
Route::get('/donate', function () { return view('donate'); });
Route::get('/contact-us', function () { return view('contact_us'); });
// =============== END PAGE ROUTES ===============


Route::post('/upload', [FileUploadController::class,'upload'])->name('file.upload');
Route::get('/get-files-from-session',[FileUploadController::class,'getFileFromSession'])->name('file.from-session');
Route::get('/remove-file',[FileUploadController::class,'removeFile'])->name('file.remove-file');
Route::get('/merge-pdf',[FileUploadController::class,'mergePDF'])->name('file.merge-pdf');
Route::post('/add-subscriber',[PDFMergeSubscriberController::class,'store'])->name('subscriber.add');

Route::post('/contact-us-upload', [ContactUsController::class,'upload'])->name('contact_us.upload');
Route::get('/contact-us-get-files-from-session',[ContactUsController::class,'getFileFromSession'])->name('contact_us.from-session');
Route::get('/contact-us-remove-file',[ContactUsController::class,'removeFile'])->name('contact_us.remove-file');
Route::post('/contact-us-add',[ContactUsController::class,'store'])->name('contact_us.add');
