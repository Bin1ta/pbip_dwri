<?php

use App\Exports\ContractProgressExport;
use App\Exports\CurrentContractsBadkapatraExport;
use App\Exports\CurrentContractsBadkapatraPdf;
use App\Exports\CurrentContractsPragannaExport;
use App\Exports\CurrentContractsPragannaPdf;
use App\Exports\FinishedContractsBadkapatraPdf;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

use App\Exports\FinishedContractsExport;
use App\Exports\FinishedContractsPragannaExport;
use App\Exports\FinishedContractsPragannaPdf;
use Maatwebsite\Excel\Facades\Excel;





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
Route::get('export-finished-contracts', function () {
    return Excel::download(new FinishedContractsExport, 'finished_contracts_badkapatra.xlsx');
})->name('finished.contracts.export');
Route::get('export-finished-contracts-praganna', function () {
    return Excel::download(new FinishedContractsPragannaExport, 'finished_contracts_praganna.xlsx');
})->name('finished.contracts.export_praganna');


Route::get('export-current-contracts', function () {
    return Excel::download(new CurrentContractsBadkapatraExport, 'current_contracts_badkapatra.xlsx');
})->name('current.contracts.export_badkapatra');
Route::get('export-Current-contracts-praganna', function () {
    return Excel::download(new CurrentContractsPragannaExport, 'current_contracts_praganna.xlsx');
})->name('current.contracts.export_praganna');
Route::get('export-contract-progress', function () {
    return Excel::download(new ContractProgressExport, 'contract_progress.xlsx');
})->name('contract.progress.export');



Route::get('/current-contracts-badkaptra/pdf', [CurrentContractsBadkapatraPdf::class,'currentContractsBadkapatraPdf'])->name('current.contractsBadkapatra.pdf');
Route::get('/current-contracts-praganna/pdf', [CurrentContractsPragannaPdf::class,'CurrentContractsPragannaPdf'])->name('current.contractsPraganna.pdf');
Route::get('/finished-contracts-badkaptra/pdf', [FinishedContractsBadkapatraPdf::class,'FinishedContractsBadkapatraPdf'])->name('finished.contractsBadkapatra.pdf');
Route::get('/finished-contracts-praganna/pdf', [FinishedContractsPragannaPdf::class,'FinishedContractsPragannaPdf'])->name('finished.contractsPraganna.pdf');

