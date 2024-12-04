<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (config('default.dual_language')) {
        $locale = app()->getLocale();
        return redirect(route('welcome', ['language'=>$locale]));
    } else {
        return redirect(route('welcome'));
    }
});

Route::middleware('ipMiddleware')->group(function () {

    if (config('default.dual_language')) {
        Route::middleware('setLanguage')->group(function () {
            (new listing)->routes();
        });
    } else {
        (new listing)->routes();
    }
});

class listing
{
    public function routes()
    {
        Route::get('/', [FrontendController::class, 'index'])->name('welcome');
        Route::get('languageChange/{languageChange}',[FrontendController::class,'languageChange'])->name('language');
        Route::get('officeDetail/{officeDetail:slug}', [FrontendController::class, 'officeDetails'])->name('officeDetail');
        Route::get('documentCategory/{documentCategory:slug}', [FrontendController::class, 'documentCategory'])->name('documentCategory');
        Route::get('document/{document:slug}', [FrontendController::class, 'documentDetail'])->name('documentDetail');

        Route::get('detail/{slug}', [FrontendController::class, 'staticMenus'])->name('static');

        Route::get('detail/photoGallery/{photoGallery:slug}', [FrontendController::class, 'photoGalleryDetails'])->name('photoGalleryDetails');


        Route::get('search', [FrontendController::class, 'search'])->name('frontend.search');

        Route::post('sendMessage', [FrontendController::class, 'sendMessage'])->name('sendMessage');
        Route::get('faq', [FrontendController::class, 'faq'])->name('faq');
        Route::get('/committee-category/{committeeCategory}', [FrontendController::class, 'committeeCategory'])->name('committeeCategory');

    }
}

