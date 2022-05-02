<?php

use App\Http\Controllers\NavigationItemController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WelcomeSettingsController;
use App\Http\Middleware\LockInactiveSite;
use App\Models\NavigationItem;
use Illuminate\Http\Request;
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

Route::get('/', function () {
  return view('welcome');
})->middleware(LockInactiveSite::class);

// Route::get('/admin', function () {
//   return view('admin.index');
// })->name('admin');

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->prefix('dashboard')->group(function () {
  Route::get('/', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::get('/documentation', function () {
    return view('dashboard.documentation.index');
  })->name('dashboard.documentation');

  Route::prefix('settings')->group(function () {

    Route::get('/', [SettingsController::class, 'index'])->name('dashboard.settings');

    Route::prefix('generic')->group(function() {
      Route::get('/', [SettingsController::class, 'generic'])->name('dashboard.settings.generic');
      Route::post('/', [SettingsController::class, 'save_generic']);
    });

    Route::prefix('welcome')->group(function () {
      Route::get('/', [SettingsController::class, 'welcome'])->name('dashboard.settings.welcome');

      Route::prefix('navigation')->group(function() {
        Route::get('/', [WelcomeSettingsController::class, 'index'])->name('dashboard.settings.welcome.navigation.index');
        Route::get('/new', [WelcomeSettingsController::class, 'createForm'])->name('dashboard.settings.welcome.navigation.new');
        Route::post('/new', [WelcomeSettingsController::class, 'create']);
  
        Route::get('/hide/{navigationItem}', [WelcomeSettingsController::class, 'hide'])->name('dashboard.settings.welcome.navigation.hide');
        Route::get('/show/{navigationItem}', [WelcomeSettingsController::class, 'show'])->name('dashboard.settings.welcome.navigation.show');
  
        Route::get('/edit/{navigationItem}', [WelcomeSettingsController::class, 'editForm'])->name('dashboard.settings.welcome.navigation.edit');
        Route::post('/edit/{navigationItem}', [WelcomeSettingsController::class, 'edit']);
  
        Route::get('/remove/{navigationItem}', [WelcomeSettingsController::class, 'remove'])->name('dashboard.settings.welcome.navigation.remove');
      });
    });
  });
});
