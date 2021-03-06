<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NavigationItemController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WelcomeSettingsController;
use App\Http\Middleware\LockInactiveSite;
use App\Models\NavigationItem;
use Carbon\Carbon;
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
  // return view('welcome');
  return redirect()->route('lang.welcome', ['lang' => 'en']);
})->middleware(LockInactiveSite::class)->name('welcome');


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

    Route::prefix('generic')->group(function () {
      Route::get('/', [SettingsController::class, 'generic'])->name('dashboard.settings.generic');
      Route::post('/', [SettingsController::class, 'save_generic']);
      Route::get('/update', [SettingsController::class, 'update'])->name('dashboard.settings.generic.update');
    });

    Route::prefix('welcome')->group(function () {
      Route::get('/', [SettingsController::class, 'welcome'])->name('dashboard.settings.welcome');

      Route::prefix('navigation')->group(function () {
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

  Route::prefix('collections')->group(function () {
    Route::get('/', [CollectionController::class, 'collections'])->name('dashboard.collections');
    Route::get('/add', [CollectionController::class, 'addCollectionView'])->name('dashboard.collections.add');
    Route::post('/add', [CollectionController::class, 'addCollection']);

    Route::prefix('{collection}')->group(function () {
      Route::get('/edit', [CollectionController::class, 'editCollectionView'])->name('dashboard.collections.edit');
      Route::post('/edit', [CollectionController::class, 'editCollection']);
      Route::get('/remove', [CollectionController::class, 'removeCollection'])->name('dashboard.collections.remove');
      Route::get('/hide', [CollectionController::class, 'hideCollection'])->name('dashboard.collections.hide');
      Route::get('/show', [CollectionController::class, 'showCollection'])->name('dashboard.collections.show');
      
      Route::prefix('albums')->group(function () {
        Route::get('/', [AlbumController::class, 'albums'])->name('dashboard.albums');
        Route::get('/add', [AlbumController::class, 'addAlbumView'])->name('dashboard.albums.add');
        Route::post('/add', [AlbumController::class, 'addAlbum']);
        
        Route::prefix('{album}')->group(function () {
          // Album preview with photos inside
          Route::get('/', [AlbumController::class, 'albumsImages'])->name('dashboard.albums.images');
          Route::prefix('images')->group(function () {
            Route::get('/add', [ImageController::class, 'uploadView'])->name('dashboard.images.upload');
            Route::post('/add', [ImageController::class, 'upload']);
            Route::prefix('{image}')->group(function () {
              Route::get('/addToWelcomePage', [ImageController::class, 'addToWelcomePage'])->name('dashboard.image.addToWelcomePage');
              Route::get('/removeFromWelcomePage', [ImageController::class, 'removeFromWelcomePage'])->name('dashboard.image.removeFromWelcomePage');
              Route::get('/remove', [ImageController::class, 'remove'])->name('dashboard.images.remove');
            });
          });
          
          Route::get('/edit', [AlbumController::class, 'editAlbum'])->name('dashboard.albums.edit');
          Route::post('/edit', [AlbumController::class, 'edit']);
          Route::get('/remove', [AlbumController::class, 'removeAlbum'])->name('dashboard.albums.remove');
          // TODO: add/remove from main page
          // TODO: image add/remove
        });
      });
    });
  });
});

Route::get('/{lang}', function($lang) {
  app()->setLocale($lang);
  return view('welcome');
})->whereIn('lang', ['en', 'fr'])->middleware(LockInactiveSite::class)->name('lang.welcome');

Route::get('/{lang}/about', [AboutController::class, 'index'])->whereIn('lang', ['en', 'fr'])->middleware(LockInactiveSite::class)->name('about');
Route::post('/{lang}/about', [AboutController::class, 'contact'])->whereIn('lang', ['en', 'fr'])->middleware(LockInactiveSite::class);

Route::get('/{lang}/{collection}', [CollectionController::class, 'index'])->whereIn('lang', ['en', 'fr'])->middleware(LockInactiveSite::class)->name('collection');
Route::get('/{lang}/{collection}/{album}', [AlbumController::class, 'index'])->whereIn('lang', ['en', 'fr'])->middleware(LockInactiveSite::class)->name('album');