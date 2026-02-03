<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\CeoMessageController;
use App\Http\Controllers\ChooseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeeJobController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\MisionController;
use App\Http\Controllers\OfficersController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PrincipleController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SentMessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VisionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {

    Route::get('office/login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');

    Route::post('office/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
        ->name('admin.password.store');
});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('check-password', [PasswordController::class, 'checkPassword'])->name('checkPassword');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['verified'])->name('dashboard');

    Route::resources(
        [
            // Shipping All Admin Controller

            'banner'        => BannerController::class,
            'officer'       => OfficersController::class,
            'rating'        => RatingController::class,
            'team'          => TeamController::class,

            'job'           => EmployeeJobController::class,
            'about'         => AboutController::class,
            'legal'         => LegalController::class,
            'vision'        => VisionController::class,
            'mision'        => MisionController::class,

            'policy'        => PolicyController::class,
            'service'       => ServiceController::class,
            'ceo_message'   => CeoMessageController::class,

            'choose'        => ChooseController::class,
            'client'        => ClientController::class,
            'principle'     => PrincipleController::class,
            'admin-contact' => AdminContactController::class,

            'sent-message'  => SentMessageController::class,

        ],

    );

    Route::get('/backup', [Controller::class, 'downloadBackup'])->name('download');

    // ============================================

    // ========================================================

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'updateOrcreateSetting'])->name('settings.updateOrCreate');

    //All Status
    Route::put('banner/status/{id}', [BannerController::class, 'updateStatusBanner'])->name('banner.status.update');
    Route::put('team/status/{id}', [TeamController::class, 'updateStatusTeam'])->name('team.status.update');
    Route::put('job/status/{id}', [EmployeeJobController::class, 'updateStatusJob'])->name('job.status.update');
    Route::put('legal/status/{id}', [LegalController::class, 'updateStatusLegal'])->name('legal.status.update');
    Route::put('vision/status/{id}', [VisionController::class, 'updateStatusVision'])->name('vision.status.update');
    Route::put('mision/status/{id}', [MisionController::class, 'updateStatusMision'])->name('mision.status.update');
    Route::put('policy/status/{id}', [PolicyController::class, 'updateStatusPolicy'])->name('policy.status.update');
    Route::put('service/status/{id}', [ServiceController::class, 'updateStatusService'])->name('service.status.update');
    Route::put('ceo/status/{id}', [CeoMessageController::class, 'updateStatusCEO'])->name('ceo.status.update');
    Route::put('choose/status/{id}', [ChooseController::class, 'updateStatusChoose'])->name('choose.status.update');
    Route::put('client/status/{id}', [ClientController::class, 'updateStatusClient'])->name('client.status.update');
    Route::put('principle/status/{id}', [PrincipleController::class, 'updateStatusPrinciple'])->name('principle.status.update');

    Route::put('sent-message/status/{id}', [SentMessageController::class, 'updateStatusSentMessage']);;

    //Apply Post
    Route::get('/apply/post', [AdminController::class, 'applyPost'])->name('apply.post');
});

Route::middleware(['auth:admin'])->group(function () {

    // Role In Permission Start
    Route::controller(RoleController::class)->group(function () {

        //Permission
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        //Role
        Route::get('/all/role', 'AllRole')->name('all.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');

        //Role In Permission
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('store.roles.permission');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminRolesEdit')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}', 'AdminRolesDelete')->name('admin.delete.roles');

        //Admin Role Permission
        Route::get('/admin-all', 'AdminPermission')->name('all.admin.permission');
        Route::post('/admin-store', 'StoreAdminPermission')->name('store.admin.permission');
        Route::get('/admin-edit/{id}', 'EditAdminPermission')->name('edit.admin.permission');
        Route::post('/admin-update/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/admin-delete/{id}', 'DeleteAdmin')->name('delete.admin');

        Route::get('/admin-inactive/{id}', 'InactiveAdmin')->name('admin.inactive');
        Route::get('/admin-active/{id}', 'ActiveAdmin')->name('admin.active');
    });
    // Role In Permission End

    Route::get('/download-attachment/{id}', [AdminController::class, 'downloadAttachment'])->name('download.attachment');
    Route::delete('/apply/post/delete/{id}', [AdminController::class, 'applyPostDelete'])->name('admin.apply.post.delete');

    Route::post('admin/admin-contact/bulk-delete', [AdminContactController::class, 'bulkDelete'])
        ->name('admin.admin-contact.bulk-delete');

    Route::post('/admin/team/update-order', [TeamController::class, 'updateOrder'])->name('admin.team.updateOrder');

    // Route to get notifications count
    Route::get('/admin/notifications', [AdminController::class, 'getAdminNotifications'])->name('admin.notifications');
    Route::post('/admin/mark-as-read', [AdminController::class, 'markNotificationsAsRead'])->name('admin.markNotificationsAsRead');

    //Office Export Pdf
    Route::get('/admin/officers/export', [OfficersController::class, 'export'])->name('admin.officer.export');

    Route::get('/generate-pdf/{id}', [OfficersController::class, 'generatePDF'])->name('office.user.pdf');
    Route::get('/rating/generate-pdf/{id}', [RatingController::class, 'generateRatingPDF'])->name('rating.user.pdf');

    //Validation For CDC No
    Route::post('/check-cdc-no', [OfficersController::class, 'checkCdcNo'])->name('check.cdc.no');
    Route::post('/validate-cdc-no', [RatingController::class, 'validateCdcNo']);
});
