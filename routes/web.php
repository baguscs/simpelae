<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VillagerController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::get('submission/check-validation/{id_submission}', [SubmissionController::class, 'check'])->name('submission.check');


    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['verified'])->name('dashboard');

        Route::prefix('profile')->group(function () {
            Route::get('index/{id_user}', [ProfileController::class, 'index'])->name('profile.index');
            Route::put('Update-email/{id_user}', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
            Route::put('Update-password/{id_user}', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
            Route::put('update-signature', [ProfileController::class, 'updateSignature'])->name('profile.updateSignature');
        });

        Route::prefix('villager')->group(function () {
            Route::get('index', [VillagerController::class, 'index'])->name('villager.index');
            Route::post('create/store', [VillagerController::class, 'store'])->name('villager.store');
            Route::put('update/{id_villager}', [VillagerController::class, 'update'])->name('villager.update');
        });

        Route::prefix('operator')->group(function () {
            Route::get('index', [OperatorController::class, 'index'])->name('operator.index');
            Route::post('create/store', [OperatorController::class, 'store'])->name('operator.store');
            Route::put('update/{id_operator}', [OperatorController::class, 'update'])->name('operator.update');
            Route::delete('delete/{id_operator}', [OperatorController::class, 'destroy'])->name('operator.destroy');
        });

        Route::resource('submission', SubmissionController::class);
        Route::get('submission/download/{id_submission}', [SubmissionController::class, 'download'])->name('submission.download');

        Route::resource('verification', VerificationController::class);
        Route::get('verification/comment/{id_submission}', [VerificationController::class, 'comment'])->name('verification.comment');
        Route::post('verification/comment/post/{id_submission}', [VerificationController::class, 'post'])->name('verification.post');

        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});
