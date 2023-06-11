<?php

use App\Http\Controllers\Api\PublicApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('home', [PublicApiController::class, 'home'])->name('home');
Route::get('introduction', [PublicApiController::class, 'introduction'])->name('introduction');
Route::get('employees', [PublicApiController::class, 'employees'])->name('employees');
Route::get('main-category', [PublicApiController::class, 'mainCategories'])->name('mainCategory');
Route::get('documentCategory/{documentCategory:slug}/documents', [PublicApiController::class, 'categoryDocuments'])->name('categoryDocuments');
Route::get('document/{document:slug}', [PublicApiController::class, 'documentDetail'])->name('documentDetail');
Route::get('photoGallery', [PublicApiController::class, 'photoGallery'])->name('photoGallery');
Route::get('photoGallery/{photoGallery:slug}', [PublicApiController::class, 'photoGalleryDetails'])->name('photoGalleryDetails');
Route::get('videoGallery', [PublicApiController::class, 'videoGallery'])->name('videoGallery');
Route::get('subDivision', [PublicApiController::class, 'subDivisions'])->name('subDivision');
Route::get('subDivision/{subDivision:slug}', [PublicApiController::class, 'subDivisionDetail'])->name('subDivisionDetail');
Route::get('subDivision/document/{subDivisionDocument}', [PublicApiController::class, 'subDivisionDocumentDetail'])->name('subDivisionDocumentDetail');
Route::get('importantLinks', [PublicApiController::class, 'importantLinks'])->name('importantLinks');
Route::get('contact', [PublicApiController::class, 'contact'])->name('contact');
Route::get('search/{keyword}', [PublicApiController::class, 'search'])->name('search');
