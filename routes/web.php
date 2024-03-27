<?php

use App\Enums\TypeUser;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ParametrageController;
use App\Http\Controllers\PayementOrangeMoneyController;
use App\Http\Controllers\PointDeVenteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Socialite\GoogleSocialiteController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/images/{folder}/{filename}', function (Request $request, string $folder, string $filename) {

    $filePath = $folder .'/'. $filename;

    if (!Storage::disk('images')->exists($filePath)) {
        abort(404);
    }

    $file = Storage::disk('images')->get($filePath);
    $type = Storage::disk('images')->mimeType($filePath);

    $response = response($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [ProfileController::class, 'uploadAvatar'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::middleware('is:' . TypeUser::ADMINISTRATEUR->value)->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    });

});

require __DIR__ . '/auth.php';
