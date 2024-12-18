<?php

use App\Http\Controllers\Admin\{AdministrationController,
    AudioController,
    BillController,
    CanalController,
    CategoryController,
    ColorController,
    CommitteeCategoryController,
    CommitteeController,
    CommitteeMemberController,
    ContactMessageController,
    ContractProgressController,
    CurrentContractController,
    DashboardController,
    DepartmentController,
    DesignationController,
    DocumentCategoryController,
    DocumentController,
    EmployeeController,
    ExEmployeeController,
    FaqController,
    FileController,
    FinishedContractController,
    InvoiceController,
    LinkController,
    MenuController,
    OfficeDetailController,
    OfficeSettingController,
    OfficeSettingHeaderController,
    PhotoGalleryController,
    RegistrationController,
    SliderController,
    SmugglingController,
    SubDivision\ForestCategoryController,
    SubDivision\ForestDetailController,
    SubDivision\LawsuitController,
    SubDivision\SubDivisionController,
    SubDivision\SubDivisionDocumentCategoryController,
    SubDivision\SubDivisionDocumentController,
    SubDivision\SubDivisionEmployeeController,
    SubDivision\SubDivisionForestController,
    TotalProgressController,
    UserManagement\ProfileController,
    UserManagement\RoleController,
    UserManagement\UserController,
    VideoGalleryController,
    WorkPlanProgressController};
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::prefix('/setting')->group(function () {
    Route::resource('officeSetting', OfficeSettingController::class)->only('index', 'update');
    Route::resource('officeDetail', OfficeDetailController::class);
});

Route::prefix('profile')->as('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('show');
    Route::put('/updateProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::put('/updatePassword', [ProfileController::class, 'updatePassword'])->name('updatePassword');
});
Route::prefix('userManagement')->group(function () {
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
});

Route::resource('slider', SliderController::class);
Route::resource('canal', CanalController::class);

Route::prefix('employees')->group(function () {
    Route::resource('department', DepartmentController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('exEmployee', ExEmployeeController::class);
});

Route::get('documentCategory/{documentCategory}/showOnIndex', [DocumentCategoryController::class, 'showOnIndex'])->name('documentCategory.showOnIndex');
Route::resource('documentCategory', DocumentCategoryController::class);
Route::get('documentCategory/{documentCategory}/document/{document}/updateStatus', [DocumentController::class, 'updateStatus'])->name('documentCategory.document.updateStatus');
Route::get('documentCategory/{documentCategory}/document/{document}/markAsNew', [DocumentController::class, 'markAsNew'])->name('documentCategory.document.markAsNew');
Route::get('documentCategory/{documentCategory}/document/{document}/popUp', [DocumentController::class, 'popUp'])->name('documentCategory.document.popUp');
Route::resource('documentCategory/{documentCategory}/document', DocumentController::class)->names('documentCategory.document');
Route::get('documentCategory/{documentCategory}/category/{category}/showOnIndex', [CategoryController::class, 'showOnIndex'])->name('documentCategory.category.showOnIndex');
Route::resource('documentCategory/{documentCategory}/category', CategoryController::class)->names('documentCategory.category');



Route::put('officeDetail/{officeDetail}/showOnIndex', [OfficeDetailController::class, 'showOnIndex'])->name('officeDetail.showOnIndex');
Route::get('officeDetail/{officeDetail}/showOnIndex', [OfficeDetailController::class, 'showOnIndex'])->name('officeDetail.showOnIndex');
Route::get('menu/{menu}/updateStatus', [MenuController::class, 'updateStatus'])->name('menu.updateStatus');
Route::resource('menu', MenuController::class);

Route::prefix('gallery')->group(function () {
    Route::delete('photo/{photo}/delete', [PhotoGalleryController::class, 'deletePhoto'])->name('photo.deletePhoto');
    Route::resource('photoGallery', PhotoGalleryController::class);
    Route::resource('videoGallery', VideoGalleryController::class);
    Route::resource('audio', AudioController::class);
});

Route::prefix('waterConsumption')->group(function () {
   Route::resource('committeeCategory', CommitteeCategoryController::class);
   Route::resource('committee', CommitteeController::class);
   Route::resource('committeeMember', CommitteeMemberController::class);
});


Route::resource('faq', FaqController::class);
//link
Route::resource('link', LinkController::class);
Route::resource('bill', BillController::class);
//file Deletes
Route::resource('file', FileController::class)->only('destroy');

Route::resource('contactMessage', ContactMessageController::class)->only('index', 'destroy');

Route::resource('color', ColorController::class);
Route::resource('officeSettingHeader', OfficeSettingHeaderController::class);


Route::prefix('registrations')->group(function (){
    Route::delete('registration/registrationDoc/{registrationDoc}/delete', [RegistrationController::class, 'deletePhoto'])->name('registration.deletePhoto');
    Route::delete('invoice/invoiceDoc/{invoiceDoc}/delete', [InvoiceController::class, 'deletePhoto'])->name('invoice.deletePhoto');
    Route::resource('registration', RegistrationController::class);
    Route::resource('invoice', InvoiceController::class);

});

Route::prefix('administrations')->group(function (){
    Route::resource('{type}/administration', AdministrationController::class)->names('administration');
    Route::delete('{type}/administration/{administration}/delete', [RegistrationController::class, 'deletePhoto'])->name('administration.deletePhoto');

});


Route::resource('contract-progress', ContractProgressController::class);
Route::get('contract-progress/{contractProgress}/updateStatus', [ContractProgressController::class, 'updateStatus'])->name('contractProgress.status');
Route::resource('current-contract',CurrentContractController::class);
Route::get('current-contract/{currentContract}/updateStatus', [CurrentContractController::class, 'updateStatus'])->name('currentContact.currentstatus');
Route::resource('finished-contract',FinishedContractController::class);
Route::get('current-contract/{finishedContract}/currentStatus', [FinishedContractController::class, 'currentStatus'])->name('finished-contract.currentStatus');
Route::get('current-contract/{finishedContract}/contractorLiabilityStatus', [FinishedContractController::class, 'contractorLiabilityStatus'])->name('finished-contract.contractorLiabilityStatus');
Route::resource('total-progress',TotalProgressController::class);
Route::resource('work-plan-progress', WorkPlanProgressController::class);
